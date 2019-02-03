<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use App\Contact;
use App\Category;
use Auth;
use Validator;

/* Expense Controller for Web */

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Default return today's expense
        $myUser = Auth::user();
        if (isset($request->start_date) && isset($request->end_date)) {
          $myExpense = Expense::whereBetween('expense_date', [ $request->start_date, $request->end_date ])
            ->where('user_id', $myUser->id)
            ->get();
          $start_date = $request->start_date;
          $end_date = $request->end_date;
        } elseif (isset($request->start_date)) {
          $myExpense = Expense::where('expense_date', $request->start_date)
            ->where('user_id', $myUser->id)
            ->get();
          $start_date = $request->start_date;
          $end_date = date('Y-m-d');
        } else {
          $myExpense = Expense::where('expense_date', date('Y-m-d'))
            ->where('user_id', $myUser->id)
            ->get();
          $start_date = date('Y-m-d');
          $end_date = date('Y-m-d');
        }
        return view('expense.index')
          ->with('expenseList', $myExpense)
          ->with('isExpense', true)
          ->with('start_date', $start_date)
          ->with('end_date', $end_date);
    }

    /**
     * Return the list of Category
     *
     * @return \Illuminate\Http\Response
     */
    public function category()
    {
        //
        $myCategory = Category::All();
        return view('expense.selectCategory')
          ->with('categoryList', $myCategory)
          ->with('isNewExpense', true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        return view('expense.create')
          ->with('categoryCode', $request->category)
          ->with('categoryName', Category::getName($request->category))
          ->with('isNewExpense', true);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
          'expense_date' => 'required|date',
          'payee_id' => 'numeric',
          'categoryCode' => 'required|string',
          'amount' => 'required|numeric'
        ]);

        if ( !isset($request->categoryCode) ) {
          return redirect()->route('selectCategory');
        }

        if ($validator->fails()) {
          return view('expense.create')
            ->withInput($request)
            ->withErrors($validator)
            ->with('categoryCode', $request->categoryCode)
            ->with('categoryName', Category::getName($request->categoryCode))
            ->with('isExpense', true);
        }

        $my_user_id = $request->user()->id;

        // Set field from input data
        $expense = new Expense;
        $expense->user_id = $my_user_id;
        $expense->expense_date = $request['expense_date'];
        $expense->payee_id = $request['payee_id'];
        $expense->amount = $request['amount'];
        $expense->expense_code = $request->categoryCode;
        $expense->description = $request->description;


        // Calculate date fields from input data
        /* Moved to mutators
        $datestring = strtotime($request['expense_date']);
        $expense->expense_day = date("N", $datestring);
        $expense->day_of_month = date("j", $datestring);
        $expense->expense_month = date("m", $datestring);
        $expense->expense_year = date("Y", $datestring);
        */

        if($expense->save())
        {
          return redirect()->route('selectCategory')
            ->with('result', 0 )
            ->with('isExpense', true);
        } else {
          return view('expense.create')
            ->withInput($request)
            ->withErrors($validator)
            ->with('categoryCode', $request->categoryCode)
            ->with('categoryName', Category::getName($request->categoryCode))
            ->with('isExpense', true);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        if (!is_int($id)) {
          return \Response::json(['message' => "Invalid Argument: ".$id],500);
        }

        $my_expense = Expense::find($id);
        if ($my_expense) {
          $my_expense->delete();
          return \Response::json(['message' => "success"],201);
        } else {
          return \Response::json(['message' => "not found"],500);
        }
    }
}

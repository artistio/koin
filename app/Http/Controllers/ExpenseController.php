<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use App\Contact;
use Validator;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Expense::All();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
          'payee_id' => 'required|numeric',
          'amount' => 'required|numeric'
        ]);

        if ($validator->fails()) {
          return response()->json(['message'=>$validator->errors()]);
        }

        $my_user_id = $request->user()->id;

        // Set field from input data
        $expense = new Expense;
        $expense->user_id = $my_user_id;
        $expense->expense_date = $request['expense_date'];
        $expense->payee_id = $request['payee_id'];
        $expense->amount = $request['amount'];

        // Calculate date fields from input data
        $datestring = strtotime($request['expense_date']);
        $expense->expense_day = date("N", $datestring);
        $expense->day_of_month = date("j", $datestring);
        $expense->expense_month = date("m", $datestring);
        $expense->expense_year = date("Y", $datestring);

        // Get Expense Code
        if ($request['expense_code'] == "") {
          $my_contact = Contact::where('id', $request['payee_id'])
            ->first();
          $my_expense_code = $my_contact['expense_code'];
        } else {
          $my_expense_code = $request['expense_code'];
        }

        $expense->expense_code = $my_expense_code;

        if($expense->save())
        {
          return \Response::json(['message' => "success"],201);
        } else {
          return \Response::json(['message' => "error saving"],500);
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

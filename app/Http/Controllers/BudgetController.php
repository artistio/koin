<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Budget;
use App\Contact;
use Auth;
use Validator;

class BudgetController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        $myBudget = Budget::where('user_id', $user->id)->get();
        return view('budget.index')
          ->with('budgetList', $myBudget)
          ->with('isBudget', true);
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
      $validator = Validator::make($request->all(), [
        'budget_year' => 'required|numeric|digits_between:3,5',
        'budget_month' => 'required|numeric|between:1,12',
        'expense_code' => 'required|numeric',
        'amount' => 'required|numeric'
      ]);

      if ($validator->fails()) {
        return response()->json(['message'=>$validator->errors()]);
      }

      $my_user_id = $request->user()->id;

      // Set field from input data
      $budget = new budget;
      $budget->user_id = $my_user_id;
      $budget->budget_year = $request['budget_year'];
      $budget->budget_month = $request['budget_month'];
      $budget->expense_code = $request['expense_code'];
      $budget->amount = $request['amount'];

      // Generate Budget Code
      $my_budget_code = $my_user_id."-".$request['budget_year'];
      if (strlen($request['budget_month']) < 2) {
        $my_budget_code .= "0".$request['budget_month'];
      } else {
        $my_budget_code .= $request['budget_month'];
      }
      $my_budget_code.= "-".$request['expense_code'];
      $budget->budget_code = $my_budget_code;

      if($budget->save())
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
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;
use App\Contact;
use App\Category;
use Auth;
use Validator;

class ReportController extends Controller
{

    // Function for report by Date
    public function byDate(Request $request)
    {
        // Default return today's expense
        $myUser = Auth::user();
        if (isset($request->start_date) && isset($request->end_date)) {
          $start_date = $request->start_date;
          $end_date = $request->end_date;
        } elseif (isset($request->start_date)) {
          $start_date = $request->start_date;
          $end_date = date('Y-m-d');
        } else {
          $start_date = date('Y-m-d');
          $end_date = date('Y-m-d');
        }
        $myExpense = Expense::selectRaw('expense_date, sum(amount) as total_amount')
          ->whereBetween('expense_date', [ $start_date, $end_date ])
          ->where('user_id', $myUser->id)
          ->orderby('expense_date')
          ->groupby('expense_date')
          ->get();

        return view('report.bydate')
          ->with('expenseList', $myExpense)
          ->with('start_date', $start_date)
          ->with('end_date', $end_date);
    }

    // Function for report by Category
    public function byCategory(Request $request)
    {
      // Default return today's expense
      $myUser = Auth::user();
      if (isset($request->start_date) && isset($request->end_date)) {
        $start_date = $request->start_date;
        $end_date = $request->end_date;
      } elseif (isset($request->start_date)) {
        $start_date = $request->start_date;
        $end_date = date('Y-m-d');
      } else {
        $start_date = date('Y-m-d');
        $end_date = date('Y-m-d');
      }
      $myExpense = Expense::selectRaw('expense_code, sum(amount) as total_amount')
        ->whereBetween('expense_date', [ $start_date, $end_date ])
        ->where('user_id', $myUser->id)
        ->orderby('expense_code')
        ->groupby('expense_code')
        ->get();

      return view('report.bycategory')
        ->with('expenseList', $myExpense)
        ->with('start_date', $start_date)
        ->with('end_date', $end_date);
    }
}

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
          $myExpense = Expense::selectRaw('expense_date, sum(amount) as total_amount')
            ->whereBetween('expense_date', [ $request->start_date, $request->end_date ])
            ->where('user_id', $myUser->id)
            ->orderby('expense_date')
            ->groupby('expense_date')
            ->get();
          $start_date = $request->start_date;
          $end_date = $request->end_date;
        } elseif (isset($request->start_date)) {
          $myExpense = Expense::selectRaw('expense_date, sum(amount) as total_amount')
            ->where('expense_date', $request->start_date)
            ->where('user_id', $myUser->id)
            ->orderby('expense_date')
            ->groupby('expense_date')
            ->get();
          $start_date = $request->start_date;
          $end_date = date('Y-m-d');
        } else {
          $myExpense = Expense::selectRaw('expense_date, sum(amount) as total_amount')
            ->where('expense_date', date('Y-m-d'))
            ->where('user_id', $myUser->id)
            ->orderby('expense_date')
            ->groupby('expense_date')
            ->get();
          $start_date = date('Y-m-d');
          $end_date = date('Y-m-d');
        }
        return view('report.bydate')
          ->with('expenseList', $myExpense)
          ->with('start_date', $start_date)
          ->with('end_date', $end_date);
    }

}

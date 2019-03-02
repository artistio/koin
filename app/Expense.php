<?php

namespace App;
use App\Category;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    //
    public function setExpenseDateAttribute($value) {
      $this->attributes['expense_date'] = $value;

      // Calculate date fields from input data
      $datestring = strtotime($value);
      $this->attributes['expense_day'] = date("N", $datestring);
      $this->attributes['day_of_month'] = date("j", $datestring);
      $this->attributes['expense_month'] = date("m", $datestring);
      $this->attributes['expense_year'] = date("Y", $datestring);
    }

/*  Replaced by Accessor getExpensseCodeNameAttribute
    public function getCategoryName() {
      return Category::getName($this->expense_code);
    }
*/
    /**
     * Get Expennse Code Name
     * Mutator for expense_code_name
     *
     * @param
     * @return String
     */
    public function getExpenseCodeNameAttribute()
    {
      return Category::getName($this->expense_code);
    }
}

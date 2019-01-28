<?php

namespace App;
use App\Category;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    //
    public function getCategoryName() {
      return Category::getName($this->expense_code);
    }
}

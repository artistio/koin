<?php

namespace App\Http\Controllers;
use App\BasicAccountType;

use Illuminate\Http\Request;

class BasicAccountTypeController extends Controller
{
    // Return all Basic Account Type
    public function index()
    {
      return BasicAccountType::All();
    }
}

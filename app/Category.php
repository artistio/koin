<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  // Get all child category
  public function childs() {
    return $this->hasMany('App\Category','parent_id','id') ;
  }

  // Get parent category
  public function parent() {
    return $this->belongTo('App\Category','parent_id','id') ;
  }
}

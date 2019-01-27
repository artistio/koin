<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  // Get all child category
  public function childs() {
    return $this->hasMany('App\Category','parent_id','id');
  }

  // Get parent category
  // Currently not working, so please use getName
  public function get() {
    return $this->belongsTo('App\Category', 'parent_id');
  }

  public static function getName(string $categoryCode) {
    $myName = (new static)::where('code', $categoryCode)->first();
    return $myName->name;
  }
}

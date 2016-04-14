<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectionAction extends Model
{
    public function logged_actions()
    {
        return $this->hasMany('App\SelectionActionLog');
    }
    
    public function categories()
    {
        return $this->belongsToMany('App\Category', 'categories_selection_actions');
    }
}

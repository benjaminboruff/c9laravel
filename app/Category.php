<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function selection_actions()
    {
        return $this->belongsToMany('App\SelectionAction', 'categories_selection_actions');
    }
}

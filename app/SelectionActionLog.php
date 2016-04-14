<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SelectionActionLog extends Model
{
    public function selection_action()
    {
        return $this->belongsTo('App\SelectionAction');
    }
}

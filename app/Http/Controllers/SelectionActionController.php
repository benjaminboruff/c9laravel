<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SelectionAction;


class SelectionActionController extends Controller
{
    
    public function getHome()
    {
        $actions = SelectionAction::all();
        return view('home', ['actions' => $actions]);
    }
    
    // return correct view for selected action
    public function selectAction($action, $name = 'you')
    {
        return view('actions.' . $action, ['name' => $name]);
    }
    
    // post form
    public function postAction(Request $request)
    {
        
        $this->validate($request, [
            
            'action' => 'required',
            'name' => 'required|alpha'
            
        ]);
            
         return view('actions.'. $request['action'], ['name' => $this->transformName( $request['name'] ) ]);
   
    }
    
    // do something weird to the name
    private function transformName($name)
    {
        $prefix = "Your Highness, ";
        return $prefix . ucfirst($name);
    }
}

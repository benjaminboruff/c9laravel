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
        return view('actions.general', ['action' => $action,'name' => $name]);
    }
    
    // post form
    public function postInsertAction(Request $request)
    {
        
        $this->validate($request, [
            
            'name' => 'required|alpha|unique:selection_actions',
            'niceness' => 'required|numeric'
            
        ]);
        
        $action = new SelectionAction;
        $action->name = ucfirst(strtolower($request['name']));
        $action->niceness = $request['niceness'];
        $action->save();
        
        $actions = SelectionAction::all();
        
        return redirect()->route('home');
        
       // return view('home', ['actions' => $actions]);
            
         //return view('actions.'. $request['action'], ['name' => $this->transformName( $request['name'] ) ]);
   
    }
    
    // do something weird to the name text
    private function transformName($name)
    {
        $prefix = "Your Highness, ";
        return $prefix . ucfirst($name);
    }
}

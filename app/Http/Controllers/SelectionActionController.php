<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SelectionAction;
use App\SelectionActionLog;


class SelectionActionController extends Controller
{
    
    public function getHome()
    {
        $actions = SelectionAction::all();
        $logged_actions = SelectionActionLog::all();
        
        return view('home', ['actions' => $actions, 'logs' => $logged_actions]);
    }
    
    // return correct view for selected action
    public function getSelectAction($action, $name = 'you')
    
    {
        $selection_action = SelectionAction::where('name', $action)->first();
        $selection_action_log = new SelectionActionLog();
        $selection_action->logged_actions()->save($selection_action_log);
        
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SelectionAction;
use App\SelectionActionLog;
use DB;


class SelectionActionController extends Controller
{
    
    public function getHome()
    {
        // Eloquent way
        $actions = SelectionAction::orderBy('niceness')->get();
        
        // query builder way
        //$actions = DB::table('selection_actions')->get();
        
        // $logged_actions = SelectionActionLog::whereHas('selection_action', function($query)
        //     {
        //         $query->where('name', 'wave');
        //     })->get();
        
        $logged_actions = SelectionActionLog::all();
            
        
        // $query = DB::table('selection_action_logs')
        //             ->join('selection_actions', 'selection_action_logs.selection_action_id', '=', 'selection_actions.id')
        //             ->where('selection_actions.name', 'wave')
        //             ->get();
        
        $query = DB::table('selection_action_logs')
                    ->avg('id');
                    

        
        return view('home', ['actions' => $actions, 'logs' => $logged_actions, 'db' => $query]);
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

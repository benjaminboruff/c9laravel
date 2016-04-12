<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class SelectionActionController extends Controller
{
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
    
    private function transformName($name)
    {
        $prefix = "Your Highness, ";
        return $prefix . ucfirst($name);
    }
}

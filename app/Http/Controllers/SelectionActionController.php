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
        if (isset($request['action']) && $request['name']){
            if ( strlen($request['name']) > 0 ){
                return view('actions.'. $request['action'], ['name' => $this->transformName( $request['name'] ) ]);
            }
            
            //return redirect()->back(); not needed?
        }
        
        return redirect()->back();
    }
    
    private function transformName($name)
    {
        $prefix = "Your Highness, ";
        return $prefix . ucfirst($name);
    }
}

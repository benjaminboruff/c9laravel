<?php

use Illuminate\Database\Seeder;
use App\SelectionAction;

class SelectionActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $action_seeder = new SelectionAction();
        $action_seeder->name = "Greet";
        $action_seeder->niceness = 3;
        $action_seeder->save();
        
        $action_seeder = new SelectionAction();
        $action_seeder->name = "Hug";
        $action_seeder->niceness = 6;
        $action_seeder->save();
        
        $action_seeder = new SelectionAction();
        $action_seeder->name = "Kiss";
        $action_seeder->niceness = 12;
        $action_seeder->save();
        
        $action_seeder = new SelectionAction();
        $action_seeder->name = "Wave";
        $action_seeder->niceness = 2;
        $action_seeder->save();
    }
}

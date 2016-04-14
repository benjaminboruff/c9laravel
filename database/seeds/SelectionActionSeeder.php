<?php

use Illuminate\Database\Seeder;
use App\SelectionAction;
use App\Category;

class SelectionActionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1 = new Category();
        $category1->name = 'Cat 1';
        $category1->save();
        
        $category2 = new Category();
        $category2->name = 'Cat 2';
        $category2->save();
        
        $action_seeder = new SelectionAction();
        $action_seeder->name = "Greet";
        $action_seeder->niceness = 3;
        $action_seeder->save();
        
        $category1->selection_actions()->attach($action_seeder);
        $category2->selection_actions()->attach($action_seeder);
        
        $action_seeder = new SelectionAction();
        $action_seeder->name = "Hug";
        $action_seeder->niceness = 6;
        $action_seeder->save();
        
        $category1->selection_actions()->attach($action_seeder);
        
        $action_seeder = new SelectionAction();
        $action_seeder->name = "Kiss";
        $action_seeder->niceness = 12;
        $action_seeder->save();
        
        $category2->selection_actions()->attach($action_seeder);
        
        $action_seeder = new SelectionAction();
        $action_seeder->name = "Wave";
        $action_seeder->niceness = 2;
        $action_seeder->save();
        
        $category1->selection_actions()->attach($action_seeder);
        $category2->selection_actions()->attach($action_seeder);
    }
}

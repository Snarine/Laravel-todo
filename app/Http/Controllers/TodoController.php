<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input;

use Auth;
use App\User;
use App\Models\Item;
use View;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
   
	public function index() {      
   	 //$items = Item::all();
		 $items = Auth::user()->items;  

		 //dd($items);  
 
    return View::make('todo.index', array(
        'items' => $items
    ));
	}  

	public function postIndex() 
    {
        $id =  Input::get('item_id');
        $item = Item::findOrFail($id);
     
        $userId = Auth::user()->id;
        if($item->user_id ==  $userId) {
            $item->mark();
        }
     
        return Redirect::route('todo');
    }


    

    public function getNew() {     
        return View::make('todo.new');
    }
     
    

    public function postNew() 
    {
        $rules = array('name' => 'required|min:5|max:200');
         
        $validator = Validator::make(Input::all(), $rules);
         
        if($validator->fails()){
            return Redirect::route('new-task')->withErrors($validator);
        }
         
        $item = new Item();
        $item->name = Input::get('name');
        $item->user_id = Auth::user()->id;
        $item->save();
         
        return Redirect::route('todo');
    }

    

    public function getDelete(Item $item) {    
    if($item->user_id == Auth::user()->id){
        $item->delete();
    }
     
    return Redirect::route('todo');
}
}

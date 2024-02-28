<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class AutocompleteController extends Controller
{
    function index(){
        return view('autocomplete');
    }
    function autocomplete(Request $request){
        $output = "";
        if($request->get('query') != null){
           $query = $request->get('query');
            $data = Country::where('country_name', 'LIKE', "%{$query}%")->get();
            $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
            foreach($data as $row){
            $output .= '
               <li><a href="#">'.$row->country_name.'</a></li>
               ';
            }
            $output .= '</ul>';
        }
        echo $output;
    }
}

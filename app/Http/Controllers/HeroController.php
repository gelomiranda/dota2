<?php

namespace App\Http\Controllers;
require_once base_path('vendor/autoload.php');
use Dota2Api;
class HeroController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        Dota2Api\Api::init('B2CF36F901C62DDFC6AE82D15F2FCA5A');
    }
    
    public function index(){
        header('Access-Control-Allow-Origin: *');  
        $heroesMapper = new Dota2Api\Mappers\HeroesMapper();
        $heroes = $heroesMapper->load();
        $rows = array();
        $inc = 0;
        $ctr = 0;
        for ($i=1; $i < count($heroes); $i++) { 
           if(array_key_exists($i, $heroes)){
            $jsonArrayObject = (array('id'   =>  $i, 
                                      'name'            =>  substr($heroes[$i]['name'],14 ) , 
                                      'localized_name'  =>  $heroes[$i]['localized_name'])); 
            $arr[$inc] = $jsonArrayObject;
            $inc++; 
            }
        }    
        $json_array = json_encode($arr);
        echo $json_array; 
    }
}

<?php

namespace App\Http\Controllers;
use Dota2Api;
class GetMatchHistory extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        Dota2Api\Api::init('5FC24B5D71C66442E7961F5915A0C4CB');
    }


    public function index(){
         header('Access-Control-Allow-Origin: *');
        $itemsMapperWeb = new Dota2Api\Mappers\ItemsMapperWeb();
        $itemsInfo = $itemsMapperWeb->load();
        $rows = array();
        $inc = 0;
        foreach($itemsInfo as $item) {
            $jsonArrayObject = (array('id'              =>  $item->get('id'), 
                                      'name'            =>  $item->get('name'), 
                                      'cost'            =>  $item->get('cost'),
                                      'localized_name'  =>  $item->get('localized_name'),
                                      'recipe'          =>  $item->get('recipe'),
                                      'side_shop'       =>  $item->get('side_shop'),
                                      'secret_shop'     =>  $item->get('secret_shop'))); 
            // echo $item->get('id');
            // echo $item->get('name');
            // echo $item->get('cost');
            // echo $item->get('secret_shop');
            // echo $item->get('side_shop');
            // echo $item->get('recipe');
            // echo $item->get('localized_name');
            //$jsonArrayObject = (array('lat' => $row["lat"], 'lon' => $row["lon"], 'addr' => $row["address"]));
            $arr[$inc] = $jsonArrayObject;
            $inc++;
        }
       $json_array = json_encode($arr);
            echo $json_array;

    }
    //
}

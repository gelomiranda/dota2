<?php

namespace App\Http\Controllers;
use Dota2Api;
class ItemController extends Controller
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
          $arr[$inc] = $jsonArrayObject;
            $inc++;
        }
        $json_array = json_encode($arr);
        echo $json_array;
    }

    public function item(){
      $items = new Dota2Api\Data\Items();
      $class_methods = get_class_methods($items);
       print_r($class_methods);
      $items->parse();
      echo $items-getDataById(149); // get info about Crystalis
      
     
      echo $items->getImgUrlById(149, false); // large image
      echo $items->getImgUrlById(149); // thumb
    }
}

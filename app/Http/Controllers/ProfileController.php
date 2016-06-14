<?php

namespace App\Http\Controllers;
use Dota2Api;
class ProfileController extends Controller
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
      $playersMapperWeb = new Dota2Api\Mappers\PlayersMapperWeb();
      $playersInfo = $playersMapperWeb->addId('76561198271460617')->load();
      $rows = array();
      $inc = 0;
      foreach($playersInfo as $playerInfo) {
        $jsonArrayObject = (array('real_name'       =>  $playerInfo->get('realname'), 
                                    'avata_full'    =>  $playerInfo->get('avatar'), 
                                    'persona_name'  =>  $playerInfo->get('personaname'),
                                    'steam_id'  =>  $playerInfo->get('steamid'))); 
        $arr[$inc] = $jsonArrayObject;
        $inc++;
      }
      $json_array = json_encode($arr);
      print_r($arr);
    }

}

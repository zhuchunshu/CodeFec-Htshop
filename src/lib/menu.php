<?php
namespace App\Plugins\Htshop\src\lib;

class menu{

    public static function reg(){
        $yuan = config('codefec.navbar');
        config(['codefec.navbar' => $yuan]);
    }

}
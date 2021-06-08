<?php
namespace App\Plugins\Htshop\src\lib;

class menu{

    public static function reg(){
        $yuan = config('codefec.navbar');
        $yuan['工具']=[
            'type' => 'dropdown',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tool" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M7 10h3v-3l-3.5 -3.5a6 6 0 0 1 8 8l6 6a2 2 0 0 1 -3 3l-6 -6a6 6 0 0 1 -8 -8l3.5 3.5"></path>
         </svg>',
            'quanxian' => 1,
            "li" => [
                
            ]
        ];
        if(get_options_setting("htshop")){
            $quanxian = 1;
        }else{
            $quanxian = 999;
        }
        $yuan['工具']['li']['HTSHOP']=[
            "route" => "Htshop.index",
            "quanxian" => $quanxian,
        ];
        config(['codefec.navbar' => $yuan]);
    }

}
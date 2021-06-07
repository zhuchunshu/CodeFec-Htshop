<?php
namespace App\Plugins\Htshop\src\lib;

class config{

    public static function settingPro(){
        $yuan = config('codefec.setting.admin.pro');
        $yuan['Htshop'] = [
            "description" => "欢太商城插件管理",
            "route" => "admin.settingPro.Htshop.index"
        ];
        config(['codefec.setting.admin.pro' => $yuan]);
    }

    public static function settingSwitch(){
        $yuan = config('codefec.setting.admin.kaiguan');
        $yuan['所有人可用Htshop'] = 'htshop';
        config(['codefec.setting.admin.kaiguan' => $yuan]);
    }

}
<?php

namespace App\Plugins\Htshop;

use App\Plugins\Htshop\src\lib\menu;
use Illuminate\Support\Facades\Route;
use App\Plugins\Htshop\src\lib\config;

class Boot
{

    public function handle()
    {
        include plugin_path("Htshop/vendor/autoload.php");
        include plugin_path("Htshop/src/lib/helpers.php");
        $this->route();
        $this->menu();
        $this->config();
    }

    // 路由
    public function route()
    {
        Route::middleware(['web', 'auth'])
            ->group(plugin_path("Htshop/src/lib/route.php"));
    }

    // 菜单
    public function menu()
    {
        menu::reg();
    }

    // 配置
    public function config()
    {
        config::settingPro();
        config::settingSwitch();
    }
}

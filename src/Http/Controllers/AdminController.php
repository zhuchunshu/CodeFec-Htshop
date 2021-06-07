<?php
namespace App\Plugins\Htshop\src\Http\Controllers;

use Illuminate\Support\Facades\Schema;
use App\Plugins\Htshop\src\database\CreateHtshopTable;

class AdminController{

    public function index(){
        if (!Schema::hasTable('htshop')) {
            CreateHtshopTable::up();
            return redirect()->route("admin.settingPro.Htshop.index")->with("success","数据库迁移成功!");
        }
        return view("Htshop::admin");
    }

}
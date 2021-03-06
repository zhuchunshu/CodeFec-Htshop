<?php
namespace App\Plugins\Htshop\src\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
use App\Plugins\Htshop\src\Models\Htshop;
use App\Plugins\Htshop\src\database\CreateHtshopTable;
use App\Plugins\Htshop\src\Http\Requests\CreateRequest;

class IndexController {


    public function show(){
        if(!get_options_setting("htshop")){
            CodeFec_Quanxian(999);
        }
        if (!Schema::hasTable('htshop')) {
            CreateHtshopTable::up();
            return redirect()->route("Htshop.index")->with("success","数据库迁移成功!");
        }
        return view("Htshop::index");
    }

    public function store(CreateRequest $request){
        if(!get_options_setting("htshop")){
            CodeFec_Quanxian(999);
        }
        $name = $request->input("name");
        $cookies = $request->input("cookies");
        $user_id = Auth::id();
        Htshop::insert([
            "name" => $name,
            "cookies" => $cookies,
            "user_id" => $user_id,
            "created_at" => date("Y-m-d H:i:s")
        ]);
        return redirect()->route("Htshop.index")->with("success","任务创建成功!");
    }

}
<?php
namespace App\Plugins\Htshop\src\database;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHtshopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public static function up()
    {
        Schema::create('htshop', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->integer("user_id");
            $table->longText("cookies");
            $table->string("status")->default("未知");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('htshop');
    }
}

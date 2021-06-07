<?php

namespace App\Plugins\Htshop\src\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Htshop extends Model
{
    use HasFactory;
    /**
     * 定义表名
     *
     * @var string
     */
    protected $table = "htshop";
    public $timestamps = true;
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}

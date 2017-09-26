<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsItem extends Model
{
    protected $table = "goods";

    protected $primarykey = "goods_id";

    protected $guarded = ['updated_at','created_at'];
}

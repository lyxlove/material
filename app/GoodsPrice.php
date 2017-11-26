<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsPrice extends Model
{
    protected $table = 'goods_price';

    protected $primarykey = "price_id";

    protected $guarded = ['updated_at','created_at'];
}

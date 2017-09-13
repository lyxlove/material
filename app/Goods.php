<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = "goodstype";

    protected $primaryKey = "GoodsTypeId";

    //protected $fillable = ['GPId', 'GoodsType'];

    protected $guarded = ['updated_at','created_at'];
}

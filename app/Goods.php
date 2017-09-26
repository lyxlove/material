<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    protected $table = "goods_type";

    protected $primaryKey = "type_id";

      //protected $fillable = ['GPId', 'GoodsType'];

    protected $guarded = ['updated_at','created_at'];
}

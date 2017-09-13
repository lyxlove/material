<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GoodsItem extends Model
{
    protected $table = "goodsitem";
    
    protected $primarykey = "GoodsItemId";

    protected $guarded = ['updated_at','created_at'];
}

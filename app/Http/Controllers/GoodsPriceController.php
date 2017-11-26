<?php

namespace App\Http\Controllers;

use App\Goods;
use App\GoodsItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\GoodsPrice;

class GoodsPriceController extends Controller
{
    public function index()
    {
        $list = Goods::get();
        $data['id'] = 0;
        $data['text'] = '全部';
        $data['width'] = 0;
        $data['childwidth'] = 0;
        $data['children'] = $this->createNext($list, 0);
        $items = array();
        array_unshift($items, $data);//?????
        $str = json_encode($items);
        return view('GoodsPrice/index')->with("list", $str);
    }


    /**
     * 创建子节点
     * @param  [list] $list [所有节点的列表]
     * @param  [int] $id   [数组的父节点id]
     * @return [list]       [带子节点的list]
     */
    private function createNext($list, $id)
    {
        $items = array();
        foreach ($list as $k=>$s) {
            if ($s['parent_id'] == $id) {
                $item['id'] = $s['type_id'];
                $item['text'] = $s['type'];
                $data['width'] = 0;
                $data['childwidth'] = 0;
                $child = $this->createNext($list, $s['type_id']);
                if (count($child)>0) {
                    $item['children'] = $child;
                } else {
                    $item['children'] = '';
                }
                array_unshift($items, $item);
            }
        }
        return $items;
    }



    public function edit($goods_id)
    {
        //  $data = GoodsPrice::where('goods_id', $goods_id)->first();
      $data['id']= 1;
        return view('GoodsPrice/edit')->with("data", $data);
    }
}

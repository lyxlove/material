<?php

namespace App\Http\Controllers;

use App\Goods;
use App\GoodsItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GoodsController extends Controller
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
        return view('Goods/index')->with("list", $str);
    }

    public function getList()
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
        return $str;
    }



    public function addType($pid)
    {
        return view('Goods/addType')->with("GPId", $pid);
    }

    public function saveType()
    {
        $data = Goods::create($_POST);
        return redirect('goods/index');
    }


    public function addItem($pid)
    {
        return view('Goods/addItem')->with("GoodsTypeId", $pid);
    }

    public function saveItem()
    {
        $data = GoodsItem::create($_POST);
        return redirect('goods/index');
    }


    private function createNext($list, $id)
    {
        $items = array();
        foreach ($list as $k=>$s) {
            if ($s['GPId'] == $id) {
                $item['id'] = $s['GoodsTypeId'];
                $item['text'] = $s['GoodsType'];
                $data['width'] = 0;
                $data['childwidth'] = 0;
                $child = $this->createNext($list, $s['GoodsTypeId']);
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
}

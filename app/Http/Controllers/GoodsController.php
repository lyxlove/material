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

    //获取分类列表
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

    /**
     * 添加分类
     * @param [int] $pid [分类父节点id]
     */
    public function addType($pid)
    {
        return view('Goods/addType')->with("GPId", $pid);
    }


    //保存物品分类
    public function saveType()
    {
        $data = Goods::create($_POST);
        return redirect('goods/index');
    }

    /*
    物品操作
    */
    //添加物品
    public function addItem($pid)
    {
        return view('Goods/addItem')->with("GoodsTypeId", $pid);
    }

    //保存物品
    public function saveItem()
    {
        $data = GoodsItem::create($_POST);
        return redirect('goods/index');
    }

    /**
     * 获取对应父节点下的物品列表
     * @param integer $typeId [父节点id]
     */
    public function GetGoodsList($typeId = 0)
    {
        $list = GoodsItem::where('GoodsTypeId', $typeId)->get();
        return json_encode($list);
    }




    /**
     * [showTree description]
     * @return [type] [description]
     */
    public function showTree()
    {
        return;
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

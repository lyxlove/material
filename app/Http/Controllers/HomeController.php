<?php

namespace App\Http\Controllers;

use App\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//\View::addExtension('html', 'php');

class HomeController extends Controller
{
    /**
     *
     */
    public function index()
    {
        return view('home/index');
    }

    /**
     *金价换算
     */
    public function gold()
    {
        // $gold = $_POST['gold'];
        $gold = 100;
        $price1 = $gold / 100;
        $price15 = $price1 * 15;
        $price30 = $price1 * 30 ;
        $price50 = $price1 * 50;

        $minuteprice = $price15 / 2000;
        $hourprice = $minuteprice * 60;
        $data = array();
        $data['gold'] = $gold;
        $data['price1'] = $price1;
        $data['price15'] = $price15;
        $data['price30'] = $price30;
        $data['price50'] = $price50;
        $data['minuteprice'] = $minuteprice;
        $data['hourprice'] = $hourprice;
        return view('home/goldtranslation')->with('data', $data);
    }
}

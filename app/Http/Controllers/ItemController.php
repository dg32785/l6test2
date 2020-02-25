<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use View;

class ItemController extends Controller
{
    public function index(){


        $itemdetails = DB::table('items')
            ->join('item_categories', 'items.item_category', '=', 'item_categories.item_categoryid')
            ->select()
            ->get();

       /* $itemdetails = DB::table('items')
            ->join('itemdetail', 'item.itemid', '=', 'itemdetails.itemdetailsid')
            ->join('products', 'itemdetail.product', '=', 'products.productid')
            //->join('unit', 'unit.unitid', '=', 'products.product_unit')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();*/

        //echo "<pre>";print_r($itemdetails);exit;
        return view('items',compact('itemdetails'));

    }

    public function additem_view(){
        $item_categories = DB::table('item_categories')->get();
        return view('additem',compact('item_categories'));
    }

    public function productadd(){
        $rowCount = $_POST['rowCount'];
        $products = DB::table('products')->select('productid','productname')->get();
        //echo "<pre>";print_r($item_categories);exit;
        return View::make("ajaxcontent.productdetails")
            ->with(compact('rowCount', 'products'))
            ->render();
    }
}

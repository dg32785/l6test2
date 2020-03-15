<?php

namespace App\Http\Controllers;

use App\Product;
use App\UserAccess\UserAccessFacade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index(){
        //\UserAccess::getAccess();exit;
        //return redirect()->route('addproduct_view');
        $productdetails = Product::join('categories', 'categories.id', '=', 'products.category')
            ->select('products.productname','products.productid','categories.*')
            ->get();
        //echo "<pre>";print_r($product);exit;
        return view('products',compact('productdetails'));
    }
    public function addproduct_view(){
        $categories = DB::table('categories')->get();
        //echo "<pre>";print_r($categories);exit;
        return view('addproduct',compact('categories'));
    }
    public function addproduct(Request $req){
        $validation = $req->validate([
            'category' => 'required',
            'product' => 'required'
        ]);
        $productmodel = new Product();
        $productmodel->category = $req->input('category');
        $productmodel->productname = $req->input('product');
        $result = $productmodel->save();

        if($result){
            return redirect('products')->with('success','Product has been added successfully');
        }
    }

    public function editproduct_view($id){
        $productdetails = Product::where(['productid'=>$id])
            ->join('categories', 'categories.id', '=', 'products.category')
            ->select()
            ->first();
        $type = "edit";
        return view('addproduct')->with(compact('productdetails', 'type'));
    }
    public function editproduct(Request $req){
        //echo "<pre>";print_r($req->input());exit;
        $update = Product::where(['productid'=>$req->input('productid')])
            ->update(['productname'=>$req->input('product'),'category'=>$req->input('category'),'updated_at'=>date("Y-m-d H:i:s")]);
        if($update){

            return redirect('products')->with('success','Product has been edited successfully');
        }

    }
    public function deleteproduct(Request $req){

        $product = Product::where(['productid'=>$req->input('id')])->delete();
        //echo "<pre>";print_r($product);exit;
        if($product){
            echo "deleted";
        }
    }
}

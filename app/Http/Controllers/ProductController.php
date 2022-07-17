<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class ProductController extends Controller
{
    public function create()
    {
        return view('product_new');
    }

    public function item(Request $request)
    {
        $product = new Product;

        $product->product_name = $request->input('product_name');
        // $product->company_name = $request->input('company_name');
        $product->price = $request->input('price');
        $product->stock = $request->input('stock');
        $product->comment = $request->input('comment');
        $product->img_path = $request->input('img_path');
        
        $product->save();
        \Session::flash('err_msg','商品登録に成功しました。');
        return redirect('product_new');
    }
}

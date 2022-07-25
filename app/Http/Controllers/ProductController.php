<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Company;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    // 商品一覧画面表示
    public function index()
    {
        $products = Product::all();
        return view('home',['products' => $products]);
    }

    // 商品詳細画面表示
    public function show($id)
    {
        $product = Product::find($id);
        return view('productshow',['product' => $product]);
    }

    // 商品編集画面表示
    public function edit($id)
    {
        $product = Product::find($id);
        return view('product_edit',['product' => $product]);
    }

    // 商品編集処理
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        \DB::beginTransaction();
        try {
            $product->fill([
                'id' => $request->id,
                'product_name' => $request->product_name,
                'price' => $request->price,
                'stock' => $request->stock,
                'comment' => $request->comment,
                'img_path' => $request->img_path,
                'company_id' => $request->company_id
        ]);
               $product->save();
               DB::commit();
       } catch (Throwable $e) {
                abort(500);
                DB::rollBack();
       }
        return redirect('edit/{id}');
    }

    // 商品登録画面表示
    public function create()
    {
        return view('product_new');
    }

    // 商品登録処理
    public function store(ProductRequest $request)
    {
       \DB::beginTransaction();
       try {
            Product::create([
                'product_name' => $request->product_name,
                'price' => $request->price,
                'stock' => $request->stock,
                'comment' => $request->comment,
                'img_path' => $request->img_path,
                'company_id' => $request->company_id
        ]);
            DB::commit();
       } catch (Throwable $e) {
            abort(500);
            DB::rollBack();
       }
       return redirect('create');
    }

    // 商品削除
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect('index');
    }
}



// try {
//     DB::beginTransaction();

//     User::create([
//         'name'     => 'taro',
//         'email'    => 'hoge1@example.com',
//         'password' => 'password'
//     ]);

//     User::create([
//         'name'     => 'hanako',
//         'email'    => 'hoge2@example.com',
//         'password' => 'password'
//     ]);

//     DB::commit();
// } catch (Throwable $e) {
//     DB::rollBack();
// }



//  // $productにProductモデルを渡している
//  $product = new Product;
//  // Productモデル内のカラムに = リクエストされた値を格納
//  $product->product_name = $request->input('product_name');
//  $product->price = $request->input('price');
//  $product->stock = $request->input('stock');
//  $product->comment = $request->input('comment');
//  $product->img_path = $request->input('img_path');
//  // $companyにCompanyモデルを渡している
//  $company = new Company;
//  // Companyモデル内のカラムに = リクエストされた値を格納
//  $company->company_name = $request->input('company_name');


//  return redirect('index');
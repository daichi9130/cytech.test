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
    public function index(Request $request)
    {
        // $searchにリクエストで持ってきた値を格納
        $search = $request->input('search');
        $query = Product::query();

        // もし$searchが空ではなかったら
        if(!empty($search)) {
            // whereメソッドのLIKE句でproduct_nameの中に%%内の文字列があるか検索をかける
            $query->where('product_name', 'LIKE', "%{$search}%");
        }

        $products = $query->get();

        // compact関数で変数をcontrollerからviewに渡すことができる
        return view('home', compact('products','search'));
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



// $products = Product::all();
// // $searchにフォームのname(search)で送られてきた値を格納する
// $search = $request->input('search');
// // 検索フォーム
// $query = DB::table('products');
// // 不等価演算子「!==」で左右が等しくなければtrue
// if($search !== null) {
//     // 全角スペースを半角に「s」で全角から半角に
//     $search_split = mb_convert_kana($search,'s');
//     // 空白で区切る
//     $search_split2 = preg_split('/[\s]+/',$search_split,-1,PREG_SPLIT_NO_EMPTY);
//     // 単語をループで回す
//     foreach($search_split2 as $value)
//     {
//         $query->where('product_name', 'LIKE', "%{$value}%");
//     }
// };

// $query->select('id','product_name','price','stock','comment','img_path','company_id');
// $query->orderBy('created_at', 'asc');
// $contacts = $query->paginate(20);
// return view('home',['products' => $products], compact('contacts','search'));
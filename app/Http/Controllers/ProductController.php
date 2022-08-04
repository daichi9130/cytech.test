<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Company;
use App\Http\Requests\ProductRequest;
use Illuminate\Http\JsonResponse;

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
        // 検索フォームに入力された値を取得
        $search = $request->input('search');
        // カテゴリが選択されたときの値を指定
        $category = $request->input('category');

        $query = Product::query();

        // もし$searchが空ではなかったら emptyメソッドは変数の中身が空か確認する
        if(!empty($search)) {
            // whereメソッドのLIKE句でproduct_nameの中に%%内の文字列があるか検索をかける
            $query->where('product_name', 'LIKE', "%{$search}%")
                  ->orWhere('price', 'LIKE', "%{$search}%" );
        }
        // もし＄categoryに値が入っていたら issetメソッドで変数の中に値が入っているか確認する
        if (isset($category)) {
            $query->where('company_id', $category);
        }

        $products = $query->orderBy('company_id', 'asc')->paginate(15);
        $company = new Company;
        $companies = $company->getList();

        // compact関数で変数をcontrollerからviewに渡すことができる
        return view('products/index', compact('products','search','companies'));
    }

    // :JsonResponseは戻り値の定義
    public function apiList(ProductRequest $request):JsonResponse
    {
        // 検索フォームに入力された値を取得
        $search = $request->input('search');
        // カテゴリが選択されたときの値を取得
        $category = $request->input('category');

        $query = Product::query();

        // もし$searchがからではなかったら
        if(!empty($search)){
            // whereメソッドのLIKE句でproduct_nameの中に%%内の文字列があるか検索する
            $query->where('product_name','LIKE',"%{$search}%");
        }
        if(isset($category)){
            $query->where('company_id',$category);
        }

        $products = $query->orderBy('id', 'asc')->get();
        return response()->json($products);
    }

    // 商品詳細画面表示
    public function show($id)
    {
        $product = Product::find($id);
        return view('products/show',['product' => $product]);
    }

    // 商品編集画面表示
    public function edit($id)
    {
        $product = Product::find($id);
        return view('products/edit',['product' => $product]);
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
        return redirect()->route('edit', ['id' => $product->id]);
    }

    // 商品登録画面表示
    public function create()
    {
        return view('products/create');
    }

    // 商品登録処理
    public function store(ProductRequest $request)
    {
        $inputs = $request->all();
       \DB::beginTransaction();
       try {
           Product::create($inputs);
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


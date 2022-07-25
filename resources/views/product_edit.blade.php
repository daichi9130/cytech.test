@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <p>商品編集</p>
            <form method="POST" action="{{ route('update', $product->id??'$product->id') }}">
                @csrf

                <div>
                    <label>
                        ID {{ optional($product)->id }}
                        <input type="hidden" name="id" value="{{ optional($product)->id }}">
                    </label>
                </div>

                <div>
                    <label>
                        商品名
                        <input type="text" name="product_name" value="{{ optional($product)->product_name }}">
                    </label>
                </div>

                <div>
                    <label>
                        メーカー
                        <select name="company_id">
                            <option value="{{ optional($product)->company_name }}">{{ optional($product)->company_name }}</option>
                            <option value="1">有限会社 笹田</option>
                            <option value="2">有限会社 山岸</option>
                            <option value="3">株式会社 吉田</option>
                            <option value="4">有限会社 高橋</option>
                            <option value="5">株式会社 山田</option>
                        </select>
                    </label>
                </div>

                <div>
                    <label>
                        価格
                        <input type="text" name="price" value="{{ optional($product)->price }}">
                    </label>
                </div>

                <div>
                    <label>
                        在庫数
                        <input type="text" name="stock" value="{{ optional($product)->stock }}">
                    </label>
                </div>

                <div>
                    <label>
                        コメント
                        <!-- textarea要素にはvalue属性は存在しない -->
                        <textarea name="comment" cols="30" rows="3">{{ optional($product)->comment }}</textarea>
                    </label>
                </div>

                <div>
                    <label>
                        商品画像
                        <input type="file" name="img_path" value="{{ optional($product)->img_path }}">
                    </label>
                </div>

                <button type="submit">更新する</button>
            </form>
            <a href="{{ route('show',['id' => $product->id]) }}">戻る</a>
        </div>
    </div>
</div>
@endsection

<!-- 削除->company -->
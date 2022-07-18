@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <p>商品新規登録</p>
            <form method="POST" action="{{route('store')}}">
                @csrf

                <div>
                    <label>
                        商品名
                        <input type="text" name="product_name" value="">
                    </label>
                </div>

                <div>
                    <label>
                        メーカー
                        <select name="company_id">
                            <option value>メーカー選択</option>
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
                        <input type="text" name="price" value="">
                    </label>
                </div>

                <div>
                    <label>
                        在庫数
                        <input type="text" name="stock" value="">
                    </label>
                </div>

                <div>
                    <label>
                        コメント
                        <textarea name="comment" cols="30" rows="3" value=""></textarea>
                    </label>
                </div>

                <div>
                    <label>
                        商品画像
                        <input type="file" name="img_path" value="">
                    </label>
                </div>

                <button type="submit">送信する</button>
            </form>
            <a href="index">戻る</a>
        </div>
    </div>
</div>
@endsection
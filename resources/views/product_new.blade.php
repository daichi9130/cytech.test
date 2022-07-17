@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <p>商品新規登録</p>
            <form method="POST" action="{{route('item')}}">
                @csrf

                <div>
                    <label>
                        商品名
                        <input type="text" name="product_name">
                    </label>
                </div>

                <div>
                    <!-- <label>
                        メーカー
                        <select name="company_name">
                            <option value>メーカー選択</option>
                            <option value="メーカー1">メーカー1</option>
                            <option value="メーカー2">メーカー2</option>
                            <option value="メーカー3">メーカー3</option>
                        </select>
                    </label> -->
                </div>

                <div>
                    <label>
                        価格
                        <input type="text" name="price">
                    </label>
                </div>

                <div>
                    <label>
                        在庫数
                        <input type="text" name="stock">
                    </label>
                </div>

                <div>
                    <label>
                        コメント
                        <textarea name="comment" cols="30" rows="3"></textarea>
                    </label>
                </div>

                <!-- <div>
                    <label>
                        商品画像
                        <input type="file" name="img_path">
                    </label>
                </div> -->

                <button type="submit">送信する</button>
            </form>
            <a href="index">戻る</a>
        </div>
    </div>
</div>
@endsection
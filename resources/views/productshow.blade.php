@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <table>
                <tr>
                    <th>ID</th>
                    <th>商品画像</th>
                    <th>商品名</th>
                    <th>メーカー</th>
                    <th>価格</th>
                    <th>在庫数</th>
                    <th>コメント</th>
                    <th></th>
                </tr>
                <tr>
                    <td>{{ $product->id }} </td>
                    <td>{{ $product->img_path }}</td>
                    <td></td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->company->company_name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->comment }}</td>
                    <td><a href="edit/"></a></td>
                </tr>
            </table>
            <a href="{{url('index')}}">戻る</a>
        </div>
    </div>
</div>

@endsection
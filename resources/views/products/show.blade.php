@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="mx-auto">
                <tr>
                    <th style="width: 5%">id</th>
                    <th style="width: 15%">商品画像</th>
                    <th style="width: 10%">商品名</th>
                    <th style="width: 10%">価格</th>
                    <th style="width: 10%">在庫数</th>
                    <th style="width: 20%">メーカー</th>
                    <th style="width: 30%">コメント</th>
                </tr>
                <tr>
                    @isset($product->company)
                      {{$product->company}}
                    @else
                      bbbb
                    @endisset
                    <td>{{ $product->id }}</td>
                    <td><img src="{{ asset('image/'.$product->img_path) }}" alt="写真" width="50" height="50"></td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->company->company_name }}</td>
                    <td>{{ $product->comment }}</td>
                </tr>
            </table>
            <a href="{{ route('edit', ['id' =>$product->id]) }}">編集</a>
            <a href="{{url('index')}}">戻る</a>
        </div>
    </div>
</div>

@endsection

<!-- "edit/{{ $product->id }}" -->
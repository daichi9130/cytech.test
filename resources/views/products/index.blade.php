@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-5">
        <div class="col-md-12">
            <form method="GET" action="{{ route('index') }}" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="検索" aria-label="Search">
                <select name="category" data-toggle="select">
                    <option value="">メーカー名</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->company_name}}">{{ $company->company_name}}</option>
                    @endforeach
                </select>
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">検索する</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="mx-auto">
                <tr>
                    <th style="width: 5%">id</th>
                    <th style="width: 20%">商品画像</th>
                    <th style="width: 15%">商品名</th>
                    <th style="width: 10%">価格</th>
                    <th style="width: 10%">在庫数</th>
                    <th style="width: 20%">メーカー名</th>
                    <th style="width: 10%"></th>
                    <th style="width: 10%"></th>
                </tr>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->product_id }}</td>
                    <td><img src="{{ asset('image/'.$product->product_img_path) }}" alt="写真" width="50" height="50"></td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->product_price }}</td>
                    <td>{{ $product->product_stock }}</td>
                    <td>{{ $product->company->company_name }}</td>
                    <td><a href="show/{{ $product->product_id }}" class="btn btn-primary">詳細</a></td>
                    <td>
                        <form method="POST" action="{{ route('destroy', $product->product_id) }}">
                        @csrf
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
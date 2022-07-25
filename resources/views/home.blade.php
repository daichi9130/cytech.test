@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-5">
        <div class="col-md-12">
            <form method="GET" action="{{ route('index') }}" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" name="search" type="search" placeholder="検索" aria-label="Search">
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
                    <td>{{ $product->id }}</td>
                    <td><img src="{{ asset('image/'.$product->img_path) }}" alt="写真" width="50" height="50"></td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->company->company_name }}</td>
                    <td><a href="show/{{ $product->id }}" class="btn btn-primary">詳細</a></td>
                    <td>
                        <form method="POST" action="{{ route('destroy', $product->id) }}">
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


<!-- <div class="card">
                <div class="card-header">商品一覧</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div> -->
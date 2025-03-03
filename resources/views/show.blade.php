@extends('app')

@section('title', '商品情報詳細画面')

@section('h1', '商品情報詳細画面')

@section('content')
<div class="show-container">
    <div class="id-container">
    <p>ID</p>
        {{$product->id}}.
    
    </div>
    <div class="id-container">
    <p >商品画像</p>
    <div>
        @if ($product->img_path == null)
            <p>画像がないよ！</p>
        @else
            <img src="{{ asset($product->img_path) }}" alt="Image" >

        @endif
     </div>
    </div>
    <div class="id-container">
    <p >商品名</p>
        <div>
        {{$product->product_name}}
        </div>
    </div>

    <div class="id-container">
    <p>メーカー</p>
    <div>
        {{$product->company->company_name}}
    </div>
    </div>

    <div class="id-container">
    <p >価格</p>
        <div>
        ￥{{$product->price}}
        </div>
    </div>

    <div class="id-container">
    <p >在庫数</p>
        <div>
        {{$product->stock}}
        </div>
    </div>

    <div class="id-container">
    <p>コメント</p>
        <div>
        {{$product->comment}}
        </div>
    </div>

    <div class="cr-button">
    <a class="create-submit" href="{{route('edit', $product->id)}}">編集</a>
    <a class="btn-back" href="{{route("index")}}">戻る</a>
    </div>

</div>

@endsection
@extends('app')

@section('title', '商品情報編集画面')

@section('h1', '商品情報編集画面')

@section('content')
<div>
    <form class="create-form" action="{{route('update', $product)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="id-container">
            <p>ID</p>
            {{$product->id}}.
        
        </div>

        <div class="error-group">
        <label class="create-label">商品名<span>*</span>
            <input class="create-input" type="text" name="product_name" value="{{$product->product_name}}">
           
        </label>
        <span class="error-msg">
                    {{ $errors->first('product_name') }}
                </span>
        </div>

        <div class="error-group">
        <label class="create-label">メーカー名<span>*</span>

            <select class="create-input" name="company_id">
                
                @foreach ($companies as $item)
                    <option value="{{$item->id}}"@if($item->id == old('company_id', $product->company_id))selected @endif>{{$item->company_name}}</option>
                @endforeach
            </select>
           
        </label>
        <span class="error-msg">
                    {{ $errors->first('company_id') }}
                </span>
        </div>

        <div class="error-group">
        <label class="create-label">価格<span>*</span>
            <input class="create-input" type="number" name="price" value="{{$product->price}}">
            
        </label>
        <span class="error-msg">
                    {{ $errors->first('price') }}
                </span>
        </div>

        <div class="error-group">
        <label class="create-label">在庫数<span>*</span>
            <input class="create-input" type="number" name="stock" value="{{$product->stock}}">
           
        </label>
        <span class="error-msg">
                    {{ $errors->first('stock') }}
                </span>
        </div>

        <div>
        <label class="create-label">コメント
            <textarea class="create-input" name="comment" cols="20" rows="3" maxlength="200">{{$product->comment}}</textarea>
           
        </label>
        </div>

        <div class="file">
        <span>画像</span>
        <label class="file-label">ファイルの選択
            <input class="create-file" type="file" name="img_path" value="{{$product->img_path}}">
        </label>
        </div>

        <div class="cr-button">
        <input class="create-submit" type="submit" value="更新">

        <a class="btn-back" href="{{route('show', $product->id)}}">戻る</a>
        </div>
    </form>

</div>

@endsection
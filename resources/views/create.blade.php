@extends('app')

@section('title', '商品新規登録画面')

@section('h1', '商品新規登録画面')

@section('content')
    <div>
        <form class="create-form" action="{{route('store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="error-group">
                <label class="create-label">商品名<span>*</span>
                    <input class="create-input" type="text" name="product_name">
                </label>

                <span class="error-msg">
                    {{ $errors->first('product_name') }}
                </span>

            </div>
            <div class="error-group">
                <label class="create-label">メーカー名<span>*</span>

                    <select class="create-input" name="company_id">
                        <option></option>
                        @foreach ($companies as $item)
                            <option value="{{$item->id}}">{{$item->company_name}}</option>
                        @endforeach
                    </select>


                </label>
                <span class="error-msg">
                    {{ $errors->first('company_id') }}
                </span>
            </div>
            <div class="error-group">
                <label class="create-label">価格<span>*</span>
                    <input class="create-input" type="number" name="price">

                </label>
                <span class="error-msg">
                    {{ $errors->first('price') }}
                </span>
            </div>
            <div class="error-group">
                <label class="create-label">在庫数<span>*</span>
                    <input class="create-input" type="number" name="stock">

                </label>
                <span class="error-msg">
                    {{ $errors->first('stock') }}
                </span>
            </div>
            <div>
                <label class="create-label">コメント
                    <textarea class="input-text" name="comment" cols="20" rows="3" maxlength="200"></textarea>

                </label>
            </div>
            <div class="file">
                <span>画像</span>
                <label class="file-label">ファイルの選択
                    <input class="create-file" type="file" name="img_path">

                </label>
            </div>
            <div class="cr-button">
                <input class="create-submit" type="submit" value="新規登録">

                <a class="btn-back" href="{{route('index')}}">戻る</a>
            </div>
        </form>

    </div>

@endsection
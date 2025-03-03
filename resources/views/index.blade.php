@extends('app')

@section('title', '商品一覧画面')

@section('h1', '商品一覧画面')

@section('content')
<!-- 検索機能実装 -->
<div class="main_container">
    <div class="search_container">
        <form action="{{ route('index') }}" method="GET">
            @csrf

            <input class="search-input" type="text" name="search_name" placeholder="検索キーワード" value="{{ request('search_name')}}">


            <select class="search-select" name="search_company">
                <!-- メーカー名と表示させるが、選択肢には含まない -->
                <option value="" selected disabled>メーカー名</option>
                @foreach ($companies as $item )
                <option value="{{ $item->id }}">{{$item->company_name}}</option>
                @endforeach
            </select>
            <input class="search-btn" type="submit" value="検索">
        </form>
    </div>

    <div class="table_container">
        <table>
            <tr>
                <th>ID</thv>
                <th>商品画像</th>
                <th>商品名</th>
                <th>価格</th>
                <th class="th-stock">在庫数</th>
                <th>メーカー名</th>
                <th>
                    <a class="btn-new" href="{{url('products.create')}}">新規登録</a>
                </th>
            </tr>
            @foreach ($products as $item )
            <tr>
                <td class="id-th">{{$item->id}}.</td>
                <td class="img-th">
                    @if ($item->img_path == null)
                                <p>画像がないよ！</p>
                            @else
                                <img src="{{ asset($item->img_path) }}" alt="Image">

                            @endif
                        </td>
                </td>
                <td>{{$item->product_name}}</td>
                <td>￥{{$item->price}}</td>
                <td>{{$item->stock}}</td>
                <td>{{$item->company->company_name}}</td>
                <td class="button-container">
                    
                    <a href="{{route('show',$item->id)}}?page_id={{ $page_id }}">詳細</a>
                    
                    <form action="{{ route('destroy', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick='return comfirm("削除しますか？")'>削除</button>
                     </form>                
                </td>
            </tr>
            @endforeach
        
        </table>
    </div>
    <div class="pagi-container">
    {{ $products->appends(request()->query())->links() }}
    </div>

</div>

@endsection
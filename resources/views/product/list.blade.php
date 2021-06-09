@extends('home')
@section('content')
    <div class="row">

        <div class="nav-search col-sm-4" id="nav-search" style="text-align: right">
            <form class="form-search" action="{{route('product.search')}}" method="post">
                @csrf

									<input type="number" name="price1"> <input type="number" name="price2">
           <button>Search</button>

            </form>
        </div>
    </div>

    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh mục san pham
            </div>
            <div>
                <table class="table" ui-jq="footable" ui-options='{
        "paging": {
          "enabled": true
        },
        "filtering": {
          "enabled": true
        },
        "sorting": {
          "enabled": true
        }}'>
                    <thead>
                    <tr>
                        <th data-breakpoints="xs">ID</th>
                        <th>Tên san pham</th>
                        <th>gia</th>
                        <th>Thể loại</th>
                        <th>ảnh</th>

                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($product as $key => $product)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$product->name}}</td>
                            <td>{{$product->price}}</td>
                            <td>{{  $product->category->name ?? '' }}</td>
                            <td>
                                <a href="#"><img style="width: 100px "
                                                 src="{{asset('storage/'.$product['avatar'])}}"
                                                 class="avatar" alt="Avatar"></a>
                            </td>



                            <td><a href="{{route('product.edit', ['id' => $product->id])}}"
                                   class="btn btn-default">EDIT</a></td>
                            <td><a href="{{ route('product.destroy', $product->id) }}" class="btn btn-danger"
                                   onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection()

@extends('home')
@section('content')
    <div class="table-agile-info">
        <div class="panel panel-default">
            <div class="panel-heading">
                Danh mục sách
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
                        <th>Tên thư viện</th>
                        <th>Mô tả</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($category as $key => $category)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$category->name}}</td>
                            <td>{{$category->desc}}</td>


                            <td></td>

                            <td><a href="{{route('category.edit', ['id' => $category->id])}}"
                                   class="btn btn-default">EDIT</a></td>
                            <td><a href="{{ route('category.destroy', $category->id) }}" class="btn btn-danger"
                                   onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection()

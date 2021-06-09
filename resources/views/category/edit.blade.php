@extends('home')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Sửa Sản Phẩm</h1>
            </div>
            <div class="form-group">
                <form method="POST" action="{{route('category.update',$category->id)}}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="{{$category->name}}">
                    </div>

                    <div class="form-group">
                        <label>Mô tả</label>
                        <input type="text" name="desc" class="form-control" placeholder="price"
                               value="{{$category->desc}}">
                    </div>


                    <button type="submit" class="btn btn-primary">Sửa</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
                </form>
            </div>
@endsection

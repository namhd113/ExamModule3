@extends('home')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Thêm danh mục</h1>
            </div>
            <div class="form-group">
                <form method="POST" action="{{route('product.update',$product->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label></label>
                        <input type="text" name="name" class="form-control" value="{{$product->name}}">
                    </div>
                    @if($errors->has('name'))
                        <div class="alert alert-danger">
                            {{$errors->first('name')}}
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Gia</label>
                        <input type="text" name="price" class="form-control" placeholder="price" value="{{$product->price}}">
                    </div>
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <input type="file" name="avatar" class="form-control-file">

                    </div>
                    <div class="form-group">
                        <label>The loai</label>
                        <select name="category_id" id="">
                            @foreach($category as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">



                        <button type="submit" class="btn btn-primary">Thêm mới</button>
                        <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
                    </div>
                </form>

@endsection

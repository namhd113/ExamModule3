@extends('home')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Thêm danh mục</h1>
            </div>
            <div class="form-group">
                <form method="POST" action="{{route('category.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    @if($errors->has('name'))
                        <div class="alert alert-danger">
                            {{$errors->first('name')}}
                        </div>
                    @endif
                    <div class="form-group">
                        <label>Mô tả</label>
                        <input type="text" name="desc" class="form-control" placeholder="price">
                    </div>


                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                    <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Cancel</button>
                </form>
            </div>
@endsection

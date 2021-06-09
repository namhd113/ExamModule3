@extends('home')


@section('content')

    <div class="container">
        <h2>Kết quả tìm kiếm</h2>
        <span>
            <form action={{ route('product.search') }}>
           <label for="">Tìm kiếm giá</label>
           Từ <input type="number" name="price1"> Đến <input type="number" name="price2">
           <button>Search</button>
        </form>
    </span>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá</th>

                <th scope="col">Ảnh</th>
                <th scope="col" colspan="2">Cập nhật</th>
            </tr>
            </thead>
            <tbody>
            @if (count($products) > 0)
                @foreach ($products as $key => $product)
                    <tr>
                        <th scope="row">{{ ++$key }}</th>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->category->category_name }}</td>
                        <td><img src={{ asset('storage/' . $product->avatar) }} alt="image"></td>
                        <td><a href={{ route('product.edit', $product->id) }}><button class="btn btn-primary">Sửa</button></a></td>
                        <td><a href={{ route('product.destroy', $product->id) }}><button class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa sản phẩm này');">Xóa</button></a></td>
                    </tr>
                @endforeach
            @else
                <td colspan="6">Không tìm thấy sản phẩm nào</td>
            @endif

            </tbody>
        </table>
    </div>

@endsection

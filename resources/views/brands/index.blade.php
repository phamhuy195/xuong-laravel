@extends('master')
@section('title')
    Danh sách Brand
@endsection

@section('content')
    <a href="{{ route('brands.create')  }}" class="btn btn-info">Thêm mới</a>

    @if(session('success'))
        <h3 class="alert alert-info">{{ session('success')  }}</h3>
    @endif
    <table class="table">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Image</td>
            <td>Create_at</td>
            <td>Update_at</td>
            <td>Action</td>
        </tr>
    @foreach($brands as $item)
            <tr>
                <td>{{ $item ->id  }}</td>
                <td>{{ $item ->name  }}</td>
                <td>
                    <img src="{{ $item ->image  }}">
                </td>
                <td>{{ $item ->created_at  }}</td>
                <td>{{ $item ->updated_at  }}</td>
                <td>
                    <a href="{{ route('brands.show',$item) }}" class="btn btn-primary">Show</a>
                    <a href="{{ route('brands.edit',$item )}}" class="btn btn-success">Edit</a>

                    <form action="{{ route('brands.destroy',$item) }}" method="post" >
                        @csrf
                        @method('DELETE')
                        <button
                             onclick="return confirm('Bạn có chắc muốn xóa không ?')"
                            type="submit" class="btn btn-warning">Xóa</button>
                    </form>
                </td>
            </tr>
    @endforeach

    </table>
    {{ $brands ->links()  }}
@endsection

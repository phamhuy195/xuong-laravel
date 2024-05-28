@extends('master')
@section('title')
    Chi tiết Brand {{ $brand->name  }}
@endsection

@section('content')
    <table class="table" >
        <tr>
            <td>Trường</td>
            <td>Giá trị</td>
        </tr>
        @foreach($brand->toArray()  as $key => $value )
            <tr>
                <td>{{ $key  }}</td>
                <td>{{ $value}}</td>

            </tr>
        @endforeach

    </table>
    {{--    Phân trang --}}
    <a href="{{ route('brands.index')  }}" class="btn btn-danger" >Quay lại trang chủ</a>
@endsection

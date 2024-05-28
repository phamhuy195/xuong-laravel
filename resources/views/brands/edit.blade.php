@extends('master')

@section('title')
    Cập nhật Brand : {{ $brand->name  }}

@endsection

@if(session('success'))
    <h3 class="alert alert-info">{{ session('success')  }}</h3>
@endif

@section('content')
    <form action="{{ route('brands.update',$brand) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')
        <div class="mt-2 mb-2">
            <label class="form-label" for="name">Name</label>
            <input type="text" id="name" value="{{ $brand->name }}" name="name" class="form-control">
        </div>
        <div class="mt-2 mb-2">
            <label class="form-label" for="image">Image</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Save</button>

        <a href="{{ route('brands.index') }}" class="btn btn-danger">Quay lại trang chủ</a>
    </form>
@endsection

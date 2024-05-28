<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit : {{ $category->name  }}</title>
</head>
<body>
<h1>Edit danh mục</h1>
@if(session('msg'))
    <h2>{{ session('msg')  }}</h2>
@endif

<form action="{{ route('categories.update',$category) }}" method="post">
    {{--        //Chống ddoos--}}
    @csrf
    @method('PUT')

    <label for="name">Name</label>
    <input type="text" name="name" value="{{ $category->name  }}" id="name">

    <button type="submit">Save</button>
</form>
</body>
</html>

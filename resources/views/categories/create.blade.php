<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create</title>
</head>
<body>
    <h1>Thêm mới danh mục</h1>

    <form action="{{ route('categories.store') }}" method="post">
{{--        //Chống ddoos--}}
        @csrf

        <label for="name">Name</label>
        <input type="text" name="name" id="name">

        <button type="submit">Save</button>
    </form>
</body>
</html>

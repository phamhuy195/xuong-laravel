@extends('admin.layouts.master')

@section('title')
    Danh sách danh mục sản phẩm
@endsection

@section('content')

    <a class="btn btn-primary mb-3" href="{{ route('admin.catalogues.create')  }}">Thêm mới</a>


    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Cover</th>
            <th>Is Active</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Action</th>
        </tr>

        @foreach($data as $item )

            <tr>
                <td>{{ $item->id  }}</td>
                <td>{{ $item->name  }}</td>
                <td>
                    <img src="{{ \Storage::url( $item->cover ) }}" alt="" width="100px" >
                    {{-- Để hiển thị ảnh chạy lệnh : php artisan storage:link--}}
                </td>
                <td>{!!   $item->is_active // !! hiển thị dạng HTML
                               ? '<span class="badge bg-primary">YES</span>'
                               : '<span class="badge bg-danger">NO</span>'  !!}</td>

                <td>{{ $item->created_at  }}</td>
                <td>{{ $item->updated_at  }}</td>
                <td>
                    <a class="btn btn-info mb-3" href="{{ route('admin.catalogues.show',$item->id)  }}">Xem</a>
                    <a class="btn btn-warning mb-3" href="{{ route('admin.catalogues.edit',$item->id)  }}">Sửa</a>
                    <a class="btn btn-danger mb-3"
                       {{-- sang routes/admin chuyển sang phương thức get --}}
                           onclick="return confirm('Bạn có chắc muốn xóa không ?? ')"
                       href="{{ route('admin.catalogues.destroy',$item->id)  }}">Xóa</a>

                </td>
            </tr>
        @endforeach

    </table>

    {{ $data ->links()  }}
@endsection

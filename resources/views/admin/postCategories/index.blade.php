@extends('layouts.admin.app')

@section('content')
    <div class="module-head">
        <h1>
            <span>Danh mục sản phẩm</span>
            <button class="btn btn-primary btn-large pull-right" data-toggle="modal" data-target="#createPopup">
                Tạo mới
            </button>
            @include('admin.postCategories.widgets.create')
        </h1>
        <p>{{@$message}}</p>
    </div>
    <div class="module-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Hình ảnh</th>
                <th>Danh mục gốc</th>
                <th>Tên danh mục</th>
                <th>Ngày tạo</th>
                <th class="text-right"> Chỉnh sửa&nbsp;</th>
            </tr>
            </thead>

            <tbody>
            @foreach($categories as $category)
                @include('admin.postCategories.widgets.edit')
                <tr>
                    <td>{{$category->id}}</td>
                    <td><img width="50" height="50" src="{{asset($category->image_url)}}"></td>
                    <td>{{$category->parent_name}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->created_at}}</td>
                    <td class="text-right">
                        <button class="btn btn-warning" data-toggle="modal" data-target="#editPopup_{{$category->id}}">
                            Sửa
                        </button>
                        <form action="{{ route('admin.post-category-management.delete', ['id' => $category->id ]) }}"
                              method="POST" style="display: inline;"
                              onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                            {{ csrf_field() }}
                            <button class="btn btn-danger" type="submit">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {!! '<center>'.$categories->appends(Request::except('page'))->render().'</center>' !!}
    </div>
@endsection
@extends('layouts.admin.app')

@section('content')
    <div class="module-head">
        <h1>
            <span>Danh mục sản phẩm</span>
            <button class="btn btn-primary btn-large pull-right" data-toggle="modal" data-target="#createPopup">Tạo mới</button>
        </h1>
    </div>
    <div class="module-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Danh mục gốc</th>
                <th>Tên danh mục</th>
                <th>Ngày tạo</th>
                <th>Trạng thái</th>
                <th class="text-right">&nbsp;</th>
            </tr>
            </thead>

            <tbody>

            @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->parent_id}}</td>
                    <td>{{$category->name}}</td>
                    <td>{{$category->created_at}}</td>
                    <td>{{$category->status}}</td>

                    <td class="text-right">
                        <a class="btn btn-warning "
                           href="{{ route('admin.category-management', ['id' => $category->id]) }}">Sửa</a>
                        <form action="{{ route('admin.category-management.delete', ['id' => $category->id ]) }}"
                              method="POST" style="display: inline;"
                              onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                            <input type="hidden" name="_method" value="DELETE"><input type="hidden"
                                                                                      name="_token"
                                                                                      value="{{ csrf_token() }}">
                            <button class="btn btn-danger" type="submit">Xóa</button>
                        </form>
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>
        {!! '<center>'.$categories->appends(Request::except('page'))->render().'</center>' !!}
    </div>
    @include('admin.categories.widgets.create')
@endsection
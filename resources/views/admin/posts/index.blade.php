@extends('layouts.admin.app')

@section('content')
    <div class="module-head">
        <h1>
            <span>Danh mục tin tức</span>
            <button class="btn btn-primary btn-large pull-right" data-toggle="modal" data-target="#createPopup">
                Tạo mới
            </button>
            @include('admin.posts.widgets.create')
        </h1>
        <p>{{@$message}}</p>
    </div>
    <div class="module-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Hình ảnh</th>
                <th>Danh mục</th>
                <th>Tên bài viết</th>
                <th>Miêu tả</th>
                <th class="text-right"> Chỉnh sửa&nbsp;</th>
            </tr>
            </thead>

            <tbody>
            @foreach($posts as $post)
                @include('admin.posts.widgets.edit')
                <tr>
                    <td>{{$post->id}}</td>
                    <td><img width="50" height="50" src="{{asset($post->image_url)}}"></td>
                    <td>{{App\Models\PostCategory::find($post->post_categories_id)->first()->name}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{str_limit($post->description,20)}}</td>
                    <td>{{$post->created_at}}</td>
                    <td class="text-right">
                        <button class="btn btn-warning" data-toggle="modal" data-target="#editPopup_{{$post->id}}">
                            Sửa
                        </button>
                        <form action="{{ route('admin.posts-management.delete', ['id' => $post->id ]) }}"
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

        {!! '<center>'.$posts->appends(Request::except('page'))->render().'</center>' !!}
    </div>
@endsection
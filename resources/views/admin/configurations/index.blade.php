@extends('layouts.admin.app')

@section('content')
    <div class="module-head">
        <h1>
            <span>Dánh sách cấu hình</span>
            <button class="btn btn-primary btn-large pull-right" data-toggle="modal" data-target="#createPopup">
                Tạo mới
            </button>
            @include('admin.configurations.widgets.create')
        </h1>
        <p>{{@$message}}</p>
    </div>
    <div class="module-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Cấu hình</th>
                <th>Giá trị</th>
                <th>Ngày tạo</th>
                <th class="text-right"> Chỉnh sửa&nbsp;</th>
            </tr>
            </thead>

            <tbody>
            @foreach($configurations as $configuration)
                @include('admin.configurations.widgets.edit')
                <tr>
                    <td>{{$configuration->id}}</td>
                    <td>{{$configuration->name}}</td>
                    <td>{{$configuration->value}}</td>
                    <td>{{$configuration->created_at}}</td>
                    <td class="text-right">
                        <button class="btn btn-warning" data-toggle="modal" data-target="#editPopup_{{$configuration->id}}">
                            Sửa
                        </button>
                        <form action="{{ route('admin.configuration-management.delete', ['id' => $configuration->id ]) }}"
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

        {!! '<center>'.$configurations->appends(Request::except('page'))->render().'</center>' !!}
    </div>
@endsection
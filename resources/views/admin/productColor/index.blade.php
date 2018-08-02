@extends('layouts.admin.app')

@section('content')
    <div class="module-head">
        <h1>
            <span>Màu sắc sản phẩm</span>
            <button class="btn btn-primary btn-large pull-right" data-toggle="modal" data-target="#createPopup">
                Tạo mới
            </button>
            @include('admin.productColor.create')
        </h1>
        <p>{{@$message}}</p>
    </div>
    <div class="module-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Mã màu</th>
                <th>Màu sắc</th>
                <th>Ngày tạo</th>
                <th class="text-right"> Chỉnh sửa&nbsp;</th>
            </tr>
            </thead>

            <tbody>
            @foreach($productColors as $productColor)
                @include('admin.productColor.edit')
                <tr>
                    <td>{{$productColor->id}}</td>
                    <td>{{$productColor->code}}</td>
                    <td>{{$productColor->name}}</td>
                    <td>{{$productColor->created_at}}</td>
                    <td class="text-right">
                        <button class="btn btn-warning" data-toggle="modal" data-target="#editPopup_{{$productColor->id}}">
                            Sửa
                        </button>
                        <form action="{{ route('admin.product.color.delete', ['id' => $productColor->id ]) }}"
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

        {!! '<center>'.$productColors->appends(Request::except('page'))->render().'</center>' !!}
    </div>
@endsection
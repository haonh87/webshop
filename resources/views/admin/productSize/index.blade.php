@extends('layouts.admin.app')

@section('content')
    <div class="module-head">
        <h1>
            <span>Kích cỡ sản phẩm</span>
            <button class="btn btn-primary btn-large pull-right" data-toggle="modal" data-target="#createPopup">
                Tạo mới
            </button>
            @include('admin.productSize.create')
        </h1>
        <p>{{@$message}}</p>
    </div>
    <div class="module-body">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Kích cõ</th>
                <th>Ngày tạo</th>
                <th class="text-right"> Chỉnh sửa&nbsp;</th>
            </tr>
            </thead>

            <tbody>
            @foreach($productSizes as $productSize)
                @include('admin.productSize.edit')
                <tr>
                    <td>{{$productSize->id}}</td>
                    <td>{{$productSize->name}}</td>
                    <td>{{$productSize->created_at}}</td>
                    <td class="text-right">
                        <button class="btn btn-warning" data-toggle="modal" data-target="#editPopup_{{$productSize->id}}">
                            Sửa
                        </button>
                        <form action="{{ route('admin.product.size.delete', ['id' => $productSize->id ]) }}"
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

        {!! '<center>'.$productSizes->appends(Request::except('page'))->render().'</center>' !!}
    </div>
@endsection
@extends('layouts.admin.app')

@section('content')
    <div class="page-header">
        <h1>Categories / Create </h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ action('Admin\CategoryController@store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                     <label for="name_en">NAME-EN</label>
                     <input type="text" name="name_en" class="form-control" value="{{  Session::getOldInput('name_en') }}"/>
                </div>
                <div class="form-group">
                     <label for="name_ru">NAME-RU</label>
                     <input type="text" name="name_ru" class="form-control" value="{{  Session::getOldInput('name_ru') }}"/>
                </div>

            <a class="btn btn-default" href="{{ action('Admin\CategoryController@index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Create</a>
            </form>
        </div>
    </div>


@endsection
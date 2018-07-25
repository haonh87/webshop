@extends('layouts.admin.app')

@section('content')
<?php 
    $allCAte = App\Category::where('id', '!=', $category->id)->get(['id', 'name_en', 'name_ru']);
?>
    <div class="page-header">
        <h1>Categories / Edit </h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ action('Admin\CategoryController@update', $category->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <table class="table">
                    <tbody>
                      <tr class="success">
                        <td>ID</td>
                        <td>{{$category->id}}</td>
                    </tr>
                    <tr class="warning">
                        <td>Parrent</td>
                        <td>
                            <div class="form-group">
                              <select class="form-control" id="parent_id" name="parent_id">
                                @foreach($allCAte as $cate)
                                    <option value="{{ $cate->id }}">
                                        {{ $cate->name_ru }}
                                    </option>
                                @endforeach
                              </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Name-EN</td>
                        <td>
                            <input type="text" name = "name_en" value="{{ $category->name_en }}" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Name-RU</td>
                        <td>
                            <input type="text" name = "name_ru" value="{{ $category->name_ru }}" required>
                        </td>
                    </tr>
                        <td>Description-EN</td>
                        <td>
                            <input type="text" name = "description_en" value="{{ $category->description_en }}" required>
                        </td>
                      </tr>
                      </tr>
                        <td>Description-RU</td>
                        <td>
                            <input type="text" name = "description_ru" value="{{ $category->description_ru }}" required>
                        </td>
                      </tr>
                    </tbody>
                  </table>
            <a class="btn btn-default" href="{{ action('Admin\CategoryController@index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Save</a>
            </form>
        </div>
    </div>


@endsection
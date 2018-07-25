@extends('layouts.admin.app')

@section('content')
    <div class="page-header">
        <h1>Categories / Show </h1>
    </div>

<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Parent</th>
        <th>Name-EN</th>
        <th>Name-RU</th>
        <th>Description-EN</th>
        <th>Description-RU</th>
        <th>View_Count</th>
        <th>Sell_Count</th>
      </tr>
    </thead>
    <tbody>
      <tr class="success">
        <td>{{$category->id}}</td>
        <td>
            @if($category->parent_id != 0)
                {{App\Category::findOrFail($category->parent_id)->name}}
            @else
                <span>None</span>
            @endif
        </td>
        <td>{{$category->name_en}}</td>
        <td>{{$category->name_ru}}</td>
        <td>{{$category->description_en}}</td>
        <td>{{$category->description_ru}}</td>
        <td>{{$category->count_view}}</td>
        <td>{{$category->count_sell}}</td>
      </tr>
    </tbody>
  </table>
            <a class="btn btn-default" href="{{ action('Admin\CategoryController@index') }}">Back</a>
            <a class="btn btn-warning" href="{{ action('Admin\CategoryController@edit', $category->id) }}">Edit</a>
            <form action="{{ action('Admin\CategoryController@destroy', $category->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"><button class="btn btn-danger" type="submit">Delete</button></form>
        </div>
    </div>


@endsection
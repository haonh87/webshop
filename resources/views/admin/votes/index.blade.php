@extends('layouts.admin.app')

@section('content')
    <div class="page-header">
        <h1>Votes</h1>
    </div>
  @if(Session::has('message'))
        <div class="alert alert-success fade in">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{ Session::get('message') }}</strong>
      </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>USER</th>
                        <th>PRODUCT</th>
                        <th>COMMENT</th>
                        <th>STAR</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($votes as $vote)
                <tr>
                    <td>{{$vote->id}}</td>
                    <td>
                        <a href="#">
                            {{ App\User::findOrFail($vote->user_id)->name }}
                        </a>
                    </td>
                    <td>
                        <a href = "{{ route('admin.products.show', ['p_id'=>$vote->product_id]) }}">
                            {{ App\Product::findOrFail($vote->product_id)->name_ru }}
                    
                    </td>
                    <td>{{ $vote->comment }}</td>
                    <td>{{ $vote->star }}</td>

                    <td class="text-right">
                        <form action="{{ action('Admin\VoteController@destroy', $vote->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>

                @endforeach

                </tbody>
            </table>
        </div>
        {!! '<center>'.$votes->appends(Request::except('page'))->render().'</center>' !!}
    </div>
@endsection
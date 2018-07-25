@extends('layouts.admin.app')

@section('content')
    <div class="page-header">
        <h1>Customer / Create </h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ action('Admin\CustomerController@store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <table class="table">
                    <tbody>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name = "name" value="" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Address</td>
                        <td>
                            <input type="text" name = "address" value="" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <input type="text" name = "email" value="" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Phone</td>
                        <td>
                            <input type="text" name = "phone" value="" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Mobile</td>
                        <td>
                            <input type="text" name = "mobile" value="" required>
                        </td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                              <select class="form-control" name="gender" style="width: 24% !important">
                                <option value ="0">Male</option>
                                <option value ="1">Female</option>
                              </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                          <select class="form-control" name="status" style="width: 24% !important">
                            <option value ="0">Single</option>
                            <option value ="1">Maried</option>
                          </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Birth day</td>
                        <td>
                          <input type="text" placeholder="dd/mm/yyyy" required name="DOB">
                        </td>
                    </tr>
                    </tbody>
                  </table>

            <a class="btn btn-default" href="{{ action('Admin\CustomerController@index') }}">Back</a>
                <button class="btn btn-primary" type="submit" >Create</a></button>
            </form>
        </div>
    </div>


@endsection
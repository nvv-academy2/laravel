@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Weight</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                    <tr>
                                    <td>{{$category['id']}}</td>
                                    <td>{{$category['name']}}</td>
                                    <td>{{$category['weight']}}</td>
                                    <td>
                                        <form action="/categories/{{$category['id']}}" method="POST">
                                            <input type="text" name="name" class="form-control" value="{{$category['name']}}">
                                            <input type="number" name="weight" class="form-control" value="{{$category['weight']}}">
                                            <input type="submit" class="btn btn-warning" value="Update">
                                            <input type="hidden" name="_method" value="PUT">
                                        </form>
                                    </td>
                                        <td>
                                            <form action="/categories/{{$category['id']}}" method="POST">
                                                <input type="submit" class="btn btn-danger" value="Remove">
                                                <input type="hidden" name="_method" value="DELETE">
                                            </form>
                                        </td>
                                    </tr>

                            @endforeach
                            </tbody>
                        </table>

                        <form action="/categories" method="POST">
                            <input type="text" name="name" class="form-control"> <br>
                            <input type="number" name="weight" class="form-control"> <br>
                            <input type="submit" class="btn btn-success" value="Create"> <br>
                        </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

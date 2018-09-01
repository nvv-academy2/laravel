@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {{$user->name_initials}}
                <div class="card-body">
                        <table class="table">
                            <thead>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Created</th>
                                <th>Updated</th>
                            </thead>
                            <tbody>
                            @foreach($data as $row)
                                    <tr>
                                        <td>{{$row['id']}}</td>
                                        <td>{{$row['name']}}</td>
                                        <td>{{$row['date']}}</td>
                                        <td>{{$row['created_at']}}</td>
                                        <td>{{$row['updated_at']}}</td>
                                    </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <form action="/test" method="POST">
                            <input type="text" name="name" class="form-control" placeholder="Name"> <br>
                            <input type="text" name="date" class="form-control" placeholder="Date"> <br>
                            <input type="submit" class="btn btn-success" value="Create"> <br>
                        </form>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection

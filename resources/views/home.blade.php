@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Welcome</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    @if($users->count() > 0)
        <div class="container mr-5">

            <table class="table table-bordered table-hover table-striped text-center">
                <thead>
                <tr class="">
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>

                @foreach($users as $user)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    @else

        <div align="center" style="margin-top: 50px">
            <img src="{{asset('vendors/dist/img/notfound.jpg')}}" height="250px" width="300px">
        </div>
    @endif





@endsection



@extends('layouts.auth')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <li>
        <a class="dropdown-item" href="{{ route('logout') }}"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt" style='color:red'></i>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>

    <div id="examplecontent"></div>

@endsection

<script>
    window.onload = Show_Countdown;
    var counter = 5;

    function Show_Countdown() {

        var countDown_overlay = 'position:absolute;' +
            'top:80%;' +
            'left:50%;' +
            'overflow:auto;' +
            'text-align:center;' +
            'margin-left:-100px;' +
            'margin-top:-300px';

        $('body').append('<div id="overLay" style="' + countDown_overlay + '"><span id="first" style="font-size: 30px;">Please Wait..</span><span id="time" style="font-size: 30px;">5</span><span id="last">..Second</span></div>');

        var timer = setInterval(function () {
            document.getElementById("time").innerHTML = counter;
            counter = (counter - 1);

            if (counter < 0)
            {
                clearInterval(timer);
                $('#first').hide();
                $('#last').hide();
                $('#time').hide();

                //for circle image     class="img-circle elevation-2"

                $('#overLay').append(`<img src="vendors/dist/img/welcome.gif"  alt="User Image">`);
            }

        }, 1000);
    }
</script>







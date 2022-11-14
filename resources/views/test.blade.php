@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Javascript</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Javascript</a></li>
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

{{--    <div id="examplecontent"></div>--}}

    <div id="current-time"></div>
    <button id="show" value="Test" disabled>Test</button>



    <input type="button" value="PLAY SOUND" onclick="play()">
    <audio id="audio" src="https://interactive-examples.mdn.mozilla.net/media/cc0-audio/t-rex-roar.mp3"></audio>

    <script>
        function play() {
            var audio = document.getElementById("audio");
            audio.play();
        }
    </script>

@endsection

{{--<script>--}}
{{--    window.onload = Show_Countdown;--}}
{{--    var counter = 5;--}}

{{--    function Show_Countdown() {--}}

{{--        var countDown_overlay = 'position:absolute;' +--}}
{{--            'top:80%;' +--}}
{{--            'left:50%;' +--}}
{{--            'overflow:auto;' +--}}
{{--            'text-align:center;' +--}}
{{--            'margin-left:-100px;' +--}}
{{--            'margin-top:-300px';--}}

{{--        $('body').append('<div id="overLay" style="' + countDown_overlay + '"><span id="first" style="font-size: 30px;">Please Wait..</span><span id="time" style="font-size: 30px;">5</span><span id="last">..Second</span></div>');--}}

{{--        var timer = setInterval(function () {--}}
{{--            document.getElementById("time").innerHTML = counter;--}}
{{--            counter = (counter - 1);--}}

{{--            if (counter < 0)--}}
{{--            {--}}
{{--                clearInterval(timer);--}}
{{--                $('#first').hide();--}}
{{--                $('#last').hide();--}}
{{--                $('#time').hide();--}}

{{--                //for circle image     class="img-circle elevation-2"--}}

{{--                $('#overLay').append(`<img src="vendors/dist/img/welcome.gif"  alt="User Image">`);--}}
{{--            }--}}

{{--        }, 1000);--}}
{{--    }--}}
{{--    </script>--}}
<script>

    function setCurrentTime() {
        var myDate = new Date();

        let daysList = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        let monthsList = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Aug', 'Oct', 'Nov', 'Dec'];


        let date = myDate.getDate();
        let month = monthsList[myDate.getMonth()];
        let year = myDate.getFullYear();
        let day = daysList[myDate.getDay()];

        let today = `${date} ${month} ${year}, ${day}`;

        let amOrPm;
        let twelveHours = function() {
            if (myDate.getHours() > 12) {
                amOrPm = 'PM';
                let twentyFourHourTime = myDate.getHours();
                let conversion = twentyFourHourTime - 12;
                return `${conversion}`

            } else {
                amOrPm = 'AM';
                return `${myDate.getHours()}`
            }
        };
        let hours = twelveHours();
        let minutes = myDate.getMinutes();
        let seconds = myDate.getSeconds();

        let currentTime = `${hours}:${minutes}:${seconds} ${amOrPm}`;

        document.getElementById('current-time').innerText =  currentTime
       // alert(currentTime);
        if(currentTime == '4:23:0 PM')
        {
            document.getElementById("show").disabled = false;
        }

        if(currentTime > '4:24:0 PM')
        {
            document.getElementById("current-time").innerHTML='<button  type=button>Test</button>';

        }

    }

    setInterval(function() {
        setCurrentTime();
    }, 1000);

</script>



{{--<script>--}}

{{--    function callfunction () {--}}
{{--        alert('welcome');--}}

{{--    }--}}

{{--    window.onload = function () {--}}
{{--        // Initial function call--}}
{{--        callfunction();--}}
{{--        setTimeout(function () {--}}
{{--            // Invoke function every 10 minutes--}}
{{--            callfunction();--}}
{{--        },6000);--}}
{{--    }--}}
{{--</script>--}}




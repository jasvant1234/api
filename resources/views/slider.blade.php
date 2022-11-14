@extends('layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Slider</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Slider</a></li>
                        <li class="breadcrumb-item active">Home</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <style>
    video {
    max-width: 100%;
    }
    </style>

    <video src="https://media.giphy.com/media/klIaoXlnH9TMY/giphy.mp4"  muted autoplay loop playsinline></video>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        </ol>
        <div class="carousel-inner">
            @foreach($sliders as $key => $slider)
                <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                    <img src="{{ url('/vendors/dist/slider_image/'.$slider->image) }}" style="height: 500px;" class="d-block w-100"  alt="...">
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#myCarousel" role="button"  data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true">     </span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>




@endsection
<script>
    // fallback: show controls if autoplay fails
    // (needed for Samsung Internet for Android, as of v6.4)
    window.addEventListener('load', async () => {
        let video = document.querySelector('video[muted][autoplay]');
        try {
            await video.play();
        } catch (err) {
            video.controls = true;
        }
    });
</script>

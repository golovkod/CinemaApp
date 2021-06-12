@extends('base')

@section('main')
    <div class="row">
        <div class="col-md-6">
            <figure class="movie-poster"><img src="/{{ $info->a_photo }}" alt="#"></figure>
        </div>
        <div class="col-md-6">
            <h2 class="movie-title"></h2>
            <ul class="movie-meta">
                <li><strong>ПІБ: </strong>{{$info->a_name  }}</li>
                <li><strong>Біографія: </strong>{{$info->a_bio }} </li>

            </ul>
        </div>
    </div> <!-- .row -->

@endsection

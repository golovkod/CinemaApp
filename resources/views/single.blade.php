@extends('base')

@section('main')

    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">

    <div class="row text-center">
        <div class="col-md-6">
            <figure class="movie-poster"><img src="/{{ $info->images->i_image }}" alt="#"></figure>
        </div>

        <div class="col-md-6">

            <ul style="margin-top: 20px;" class="movie-meta movie-title ">

                <form action="{{ route('rating',$info->f_id)}}" method="POST">

                    {{ csrf_field() }}

                    <div class="rating">

                        <a> Кількість оцінок: <strong>{{$info->usersRated()}} </strong></a>

                        <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5"
                               data-step="1" value="{{ $info->AverageRating }}" data-size="xs" data-show-clear="false">

                        <input type="hidden" name="id" required="" value="{{ $info->id }}">


                        <button class="btn btn-success">Відправити оцінку</button>
                    </div>
                </form>

                <li><strong>Назва:</strong> {{$info->f_name}} </li>
                <li><strong>Країна:</strong> {{$info->f_country}}</li>
                <li><strong>Режисер:</strong> {{$info->f_res}}</li>
                <li><strong>Бюджет:</strong> {{$info->f_summa}}$</li>
                <li><strong>Рік:</strong> {{$info->f_year}}</li>
                <li><strong>Дата виходу:</strong> {{$info->f_date}}</li>

                <li><strong>Актори: @foreach ($info->actors as $item) <a
                                href="{{route('actors-one',$item->a_id)}}"> {{ $item->a_name  }}  </a>  @endforeach
                    </strong></li>

                <li><strong>Жанр: </strong> @foreach ($info->generes as $item) {{$item->g_name}}   @endforeach </li>
                <div class="col-sm-12">

                    @if(session()->get('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                </div>
            </ul>
        </div>
    </div> <!-- .row -->


    <script type="text/javascript">

        $('#input-1').rating({
            step: 1,
            starCaptions: {1: '1', 2: '2', 3: '3', 4: '4', 5: '5'},
            starCaptionClasses: {
                1: 'text-danger',
                2: 'text-warning',
                3: 'text-info',
                4: 'text-primary',
                5: 'text-success'
            }
        });
    </script>

    <x-comments :model="$info"/>

@endsection

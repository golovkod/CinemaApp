@extends('layout')

@section('main_content')

    <div class="filters">
        <form action="{{ route('filters') }}" method="GET">
            <select name="generesId" id="input">
                <option value="0">Жанр</option>
                @foreach (\App\Models\Generes::select ('g_id','g_name')->orderby('g_name','asc')->get() as $generes)
                    <option value="{{ $generes->g_id }}" {{ $generes->g_id == $selectedId['generesId'] ? 'selected' : '' }}>
                        {{ $generes['g_name'] }}
                    </option>
                @endforeach
            </select>
            <select name="countryId" id="input">
                <option value="0">Країна</option>
                @foreach (\App\Models\Film::select('f_country')->orderby('f_country','asc')->distinct()->get() as $fcountry)
                    <option value="{{ $fcountry->f_country }}" {{ $fcountry->f_country == $selectedId['countryId'] ? 'selected' : '' }}>
                        {{ $fcountry['f_country'] }}
                    </option>
                @endforeach
            </select>
            <select name="yearId" id="input">
                <option value="0">Рік</option>
                @foreach (\App\Models\Film::select('f_year')->orderby('f_year','desc')->distinct()->get() as $fyear)
                    <option value="{{ $fyear->f_year }}" {{ $fyear->f_year == $selectedId['yearId'] ? 'selected' : '' }}>
                        {{ $fyear['f_year'] }}
                    </option>
                @endforeach
            </select>
            <input type="submit" class="btn-sm" value="Фільтрувати">
            <a href="/" class="btn btn-danger">Очистити</a>
        </form>
        <div style="margin-top: 20px;" class="form-group">
            @sortablelink('f_id','За порядком')
            @sortablelink('f_name','За назвою')
            @sortablelink('f_date','За датою')
        </div>
    </div>
    <div class="movie-list">
        @forelse($info as $el)
            <div class="movie">
                <figure class="movie-poster"><img src="/{{$el->images->i_image}}"></figure>
                <div class="movie-title   "><a href="{{route('single-one',$el->f_id)}}">Детальніше</a></div>
            </div>
        @empty
            <h1> Нічoго не знайдено :( </h1>
        @endforelse
    </div> <!-- .movie-list -->
    <div style="margin-left: 500px;" >
        {{$info->appends(\Request::except('page'))->render('vendor.pagination.bootstrap-4') }}
    </div>
    </main>
@endsection




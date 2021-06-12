@extends('base')

@section('main')

    <a style="margin: 10px;" href="{{ route('info.create')}}" class="btn btn-primary">Створити кінофільм</a>
    <a style="margin: 10px;" href="{{ route('chart')}}" class="btn btn-primary">Інформація</a>
    <div class="movie-list">

        @foreach($info as $el)
            <div class="movie">
                <figure class="movie-poster"><a href="{{route('single-one',$el->f_id)}}"><img
                                src="/{{$el->images->i_image}}" alt="#"></a></figure>

                <a href="{{ route('info.edit',$el->f_id)}}" style="margin-left:55px" class="btn btn-outline-success ">Редагування</a>
                <form action="{{ route('info.destroy', $el->f_id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button style="margin-top: 10px; margin-left:55px" class="btn btn-outline-danger"
                            onclick="return confirm('Ви точно хочете видалити?')" type="submit">Видалення
                    </button>
                </form>
                <div class="movie-title">

                </div>
            </div>
        @endforeach
    </div> <!-- .movie-list -->
    <div style="margin-left: 450px;">
        {{ $info->links('vendor.pagination.bootstrap-4') }}
    </div>

    <div class="col-sm-12">

        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>

@endsection



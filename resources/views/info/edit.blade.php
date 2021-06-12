<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">

    <title>Movie Review | Review</title>

    <!-- Loading third party fonts -->
    <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
    <link href="{{ asset('/fonts/font-awesome.min.css') }} " rel="stylesheet" type="text/css">

    <!-- Loading main css file -->
    <link rel="stylesheet" href="{{ asset('crud.css') }}">

<!--[if lt IE 9]>
    <script src="{{ asset('js/ie-support/html5.js') }}"></script>
    <script src="{{ asset('js/ie-support/respond.js') }}"></script>
    <![endif]-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <style type="text/css">
        .dropdown-toggle {
            height: 40px;
            width: 400px !important;
        }
    </style>
</head>


<body>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br/>
@endif


<div class="contact-form">

    <form method="post" action="{{ route('info.update', $info->f_id) }}" enctype="multipart/form-data">

        @method('PATCH')
        @csrf
        <div class="form-group">
            <label><strong>Назва</strong></label>
            <input type="text" name="f_name" class="form-control" value="{{ $info->f_name }}">
        </div>
        <div class="form-group">
            <label><strong>Країна</strong></label>
            <input type="text" name="f_country" class="form-control" value={{ $info->f_country }}>
        </div>
        <div class="form-group">
            <label><strong>Режисер</strong></label>
            <input type="text" name="f_res" class="form-control" value="{{ $info->f_res}}">

        </div>
        <div class="form-group">
            <label><strong>Бюджет</strong></label>
            <input type="number" name="f_summa" class="form-control" value={{ $info->f_summa }}>
        </div>
        <div class="form-group">
            <label><strong>Рік</strong></label>
            <input type="text" name="f_year" class="form-control" value={{ $info->f_year }}>
        </div>
        <div class="form-group">
            <label><strong>Дата</strong></label>
            <input type="text" name="f_date" class="form-control" value={{ $info->f_date }}>
        </div>
        <div class="form-group">
            <input type="file" name="image">
        </div>

        <div class="form-group">
            <label><strong>Оберіть акторів:</strong></label><br/>
            <select class="selectpicker" multiple data-live-search="true" name="a_name[]">
                @foreach ($a_name as $tdrop)

                    @if (old('a_name'))
                        <option value="{{ $tdrop->a_id }}" {{ in_array($tdrop->a_id, old('a_name')) ? 'selected' : '' }}>{{ $tdrop->a_name }}</option>
                    @else
                        <option value="{{ $tdrop->a_id }}" {{ $info->actors->contains($tdrop->a_id) ? 'selected' : '' }}>{{ $tdrop->a_name }}</option>
                    @endif
                @endforeach
            </select>
        </div>


        <div class="form-group">
            <label><strong>Оберіть жанри:</strong></label><br/>
            <select class="selectpicker" multiple data-live-search="true" name="g_name[]">
                @foreach ($g_name as $tdrop)

                    @if (old('g_name'))
                        <option value="{{ $tdrop->g_id }}" {{ in_array($tdrop->g_id, old('g_name')) ? 'selected' : '' }}>{{ $tdrop->g_name }}</option>
                    @else
                        <option value="{{ $tdrop->g_id }}" {{ $info->generes->contains($tdrop->g_id) ? 'selected' : '' }}>{{ $tdrop->g_name }}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <div class="text-center" style="margin-top: 10px;">
            <button type="submit" class="btn">Оновлення</button>
        </div>
    </form>

</div>
</body>
</html>












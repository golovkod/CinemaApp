@extends('base')

@section('main')
    <div class="container">

        <div class="card-header">{{ __('Інформація:') }} <strong
                    style="color:green"> {{ __('Ви успішно війшли! ')   }} </strong></div>

        <div class="card-body">
            <div class="main-body">

                <div class="row justify-content-center">

                    <div class="col-md-8">

                        <div class="card mb-3">
                            <div class="d-flex flex-column align-items-center text-center">
                                <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                     class="rounded-circle" width="150">
                                <div class="mt-3">
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Нікнейм:</h6>
                                    </div>

                                    <div class="col-sm-9 text-secondary">
                                        <strong>   {{ auth()->user()->name }}</strong>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">E-mail: </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <strong>{{ auth()->user()->email }} </strong>
                                    </div>
                                </div>

                            </div>
                            @can('isAdmin')
                                <div class="btn btn-success btn-lg">
                                    <a href="info">ВИ МАЄТЕ ПРАВА АДМІНІСТРАТОРА</a>

                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
@endsection

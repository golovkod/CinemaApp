@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level === 'error')
# @lang('Whoops!')
@else
# @lang('Привіт!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
    @lang('Ви отримали цей електронний лист, оскільки ми отримали запит на скидання пароля для вашого облікового запису.')

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
    switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'primary';
    }
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
    @lang('Скинути пароль!')
@endcomponent
@endisset

{{-- Outro Lines --}}

@lang('Якщо ви не вимагали скидання пароля, подальших дій не потрібно.')


{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('З повагою'),<br>
{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')

@endslot
@endisset
@endcomponent

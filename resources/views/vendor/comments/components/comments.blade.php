@auth
    @include('comments::form')
@else
    @include('comments::login-message')
@endauth
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
@php
    $count = $model->commentsWithChildrenAndCommenter()->count();
    $comments = $model->commentsWithChildrenAndCommenter()->parentless()->get();
@endphp
@if($count < 1)
    <p class="lead">Поки що немає коментарів.</p>
@endif
<ul class="list-unstyled">
    @foreach($comments as $comment)
        @include('comments::components.comment.comment')
    @endforeach
</ul>




@can('comments.edit', $comment)
    <!-- Bootstrap scripts -->
    <!-- Loading third party fonts -->

    <!-- Loading main css file -->

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>

    <div class="modal fade" id="comment-modal-{{ $comment->id }}" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="{{ route('comments.update', $comment->id) }}">
                    @method('PUT')
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Редагувати коментар</h5>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="message">Оновіть своє повідомлення тут:</label>
                            <textarea required class="form-control" name="message"
                                      rows="3">{{ $comment->comment }}</textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase"
                                data-dismiss="modal">Скасувати
                        </button>
                        <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">Оновити</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endcan

<div class="modal fade" id="reply-modal-{{ $comment->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" action="{{ route('comments.reply', $comment->id) }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Відповісти на коментар</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="message">Введіть тут своє повідомлення:</label>
                        <textarea required class="form-control" name="message" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-secondary text-uppercase" data-dismiss="modal">
                        Скасувати
                    </button>
                    <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">Відповісти</button>
                </div>
            </form>
        </div>
    </div>
</div>


    <div class="card-body">
        <form method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input type="hidden" name="commentable_encrypted_key" value="{{ $model->getEncryptedKey() }}"/>

            <div class="form-group">
                <label for="message">Введіть тут своє повідомлення:</label>
                <textarea class="form-control @if($errors->has('message')) is-invalid @endif" name="message"
                          rows="3"></textarea>
                <div class="invalid-feedback">
                    Ваше повідомлення обов’язкове.
                </div>
            </div>
            <button type="submit" class="btn btn-sm btn-outline-success text-uppercase">Відправити</button>
        </form>
    </div>
<br/>

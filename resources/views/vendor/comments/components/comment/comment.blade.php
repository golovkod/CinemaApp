@if(isset($reply) && $reply === true)

    <div id="comment-{{ $comment->id }}" class="media">
        @else
            <li id="comment-{{ $comment->id }}" class="media">
                @endif
                <img class="mr-3" src="https://bootdey.com/img/Content/avatar/avatar7.png " width="70">

                <div class="media-body">
                    <h5 class="mt-0 mb-1">
                      <strong> {{ $comment->commenter->name }} </strong>
                        <small class="text-muted">- {{ $comment->created_at->diffForHumans() }}</small>
                    </h5>
                    <div style="white-space: pre-line;">
                        {!! $comment->comment!!}
                    </div>

                    <p>
                        <button data-toggle="modal" data-target="#reply-modal-{{ $comment->id }}"
                                class="btn btn-sm btn-link text-uppercase">Відповісти
                        </button>
                        @can('comments.edit', $comment)
                            <button data-toggle="modal" data-target="#comment-modal-{{ $comment->id }}"
                                    class="btn btn-sm btn-link text-uppercase">Редагувати
                            </button>
                        @endcan
                        @can('comments.delete', $comment)
                            <a href="#"
                               onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $comment->id }}').submit();"
                               class="btn btn-sm btn-link text-danger text-uppercase">Видалити</a>
                    <form id="comment-delete-form-{{ $comment->id }}"
                          action="{{route('comments.delete', $comment->id)  }}" method="POST" style="display: none;">
                        @method('DELETE')
                        @csrf
                    </form>
                    @endcan
                    @can('comments.deleteAdmin', $comment)
                        <a href="#"
                           onclick="event.preventDefault();document.getElementById('comment-delete-form-{{ $comment->id }}').submit();"
                           class="btn btn-sm btn-link text-danger text-uppercase">Видалити</a>
                        <form id="comment-delete-form-{{ $comment->id }}"
                              action="{{route('comments.deleteAdmin', $comment->id)  }}" method="POST" style="display: none;">
                            @method('DELETE')
                            @csrf
                        </form>
                        @endcan
                    </p>
                    <p>
                    @can('comments.vote', $comment)

                        <form action="{{route('comments.vote', $comment->id)  }}" method="POST"
                              style="display: inline-block">
                            @csrf
                            <input type="hidden" name="vote" value="0"/>
                            <button type="submit">
                                -1
                            </button>
                        </form>
                    @endcan
                    Рейтинг: {{$comment->rating()}}
                    @can('comments.vote', $comment)

                        <form action="{{route('comments.vote', $comment->id)  }}" method="POST"
                              style="display: inline-block">
                            @csrf
                            <input type="hidden" name="vote" value="1"/>
                            <button type="submit">
                                +1
                            </button>
                        </form>
                        @endcan
                        </p>


                        @include('comments::components.comment.forms')
                        <br/>

                        @foreach($comment->allChildrenWithCommenter as $child)
                            @include('comments::components.comment.comment', [
                                    'comment' => $child,
                                    'reply' => true
                                ])
                        @endforeach
                </div>

    {!! isset($reply) && $reply === true ? '</div>' : '</li>' !!}

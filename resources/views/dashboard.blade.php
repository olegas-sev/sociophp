@extends('layouts.master')


@section('content')
    @include('includes.message-block')

    <section class="row new-post mb-3">
        <div class="col-md-6 offset-3">
            <header>
                <h3>What do you have to say?</h3>
            </header>
            <form action="{{ route('post.create') }}" method="post">
                <div class="form-group mb-2">
                    <textarea class="form-control" name="body" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Create Post</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>
    <section class="row posts">
        <div class="col-md-6 offset-3">
            <header>
                <h3>What other people say...</h3>
            </header>
            @foreach($posts as $post)
                <article class="post {{ Auth::user() == $post->user ? 'post-yours' : '' }}" data-postid="{{ $post->id }}">
                    <p>{{ $post->body }}</p>
                    <div class="info">
                        Post by <b>{{ Auth::user() == $post->user ? 'You' : $post->user->first_name}}</b> on {{ date("d-m-y H:i", strtotime($post->created_at)) }}
                    </div>
                    <div class="interaction">
                        @if (Auth::user() == $post->user)
                        <a href="#" class="edit" data-bs-toggle="modal" data-bs-target="#editModal">Edit</a> |
                        <a href="{{ route('post.delete', ['post_id' => $post->id]) }}">Delete</a>
                        @endif
                    </div>
                </article>
            @endforeach
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit a post</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div>
                            <label for="post-body" class="form-label">Edit your post</label>
                            <textarea name="post-body" class="form-control" id="post-body" rows="3"></textarea>
                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        const token = '{{ Session::token() }}'
        let url = '{{ route('edit') }}';
    </script>
@endsection



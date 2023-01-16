@push('f_styles')
    <style>
        .post-meta .post-data {
            border-left: 4px solid #0078ff;
            margin-top: 1rem;
        }
    </style>
@endpush
<section class="blog-mf sect-pt4 route d-flex align-items-center">
    <div class="container">
        <div class="row">
            <!--Post-->
            <div class="col-md-8">
                <div class="post-box">
                    <div class="post-thumb">
                        <img src="{{$post->image_for_web}}" class="img-fluid" alt="">
                    </div>
                    <div class="post-meta mt-4 mb-4">
                        <h1 class="article-title">{{$post->title}}</h1>
                        <div class="d-flex justify-content-start post-data">
                            <div class="ms-3 me-4">
                                <span class="bi bi-person"></span>
                                <span>{{$post->author->name}}</span>
                            </div>
                            <div class="me-4">
                                <span class="bi bi-calendar-check"></span>
                                <span>{{$post->date_for_web}}</span>
                            </div>

                            @if($post->comments->count() > 0)
                                <div class="me-4">
                                    <span class="bi bi-chat-left-text"></span>
                                    <span>{{$post->comments->count()}}</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="article-content">
                        {!! $post->content !!}
                    </div>
                </div>

            @if($post->comments->count() > 0)
                <!--Comments-->
                    <div class="box-comments">
                        <div class="title-box-2">
                            <h4 class="title-comments title-left">({{$post->comments->count()}}) {{\Illuminate\Support\Str::plural('Comment', $post->comments)}}</h4>
                        </div>
                        <ul class="list-comments">
                            @foreach($post->comments as $comment)
                                <li>
                                    <div class="comment-avatar">
                                        <img src="{{asset('uploads/users_avatars/default-avatar.png')}}" alt="">
                                    </div>
                                    <div class="comment-details">
                                        <h4 class="comment-author">{{$comment->user->name}}</h4>
                                        <span>{{$comment->date_for_web}}</span>
                                        <p>
                                            {{$comment->comment}}
                                        </p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
            @endif

            @if(auth()->user())
                <!--Comments Form-->
                    <div class="form-comments">
                        <div class="title-box-2">
                            <h3 class="title-left">
                                Leave a comment
                            </h3>
                        </div>
                        @if(\Illuminate\Support\Facades\Session::has('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <span><i class="bi bi-check-circle"></i> {{\Illuminate\Support\Facades\Session::get('success')}}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <form wire:submit.prevent="save">
                            <input type="hidden" name="user_id" wire:model="user_id">
                            <input type="hidden" name="post_id" wire:model="post_id">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="form-group">
                                        <textarea id="textMessage" class="form-control input-mf @error('comment') is-invalid @enderror" placeholder="Comment *" name="comment" cols="45" rows="10" wire:model="comment"></textarea>
                                        @error('comment')
                                        <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="button button-a button-big button-rouded">Send Comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="alert alert-warning" style="margin-bottom: 3rem">
                        <h5><i class="bi bi-exclamation-diamond"></i> Please <a href="{{route('login')}}" class="bold text-primary">Login</a> to add your comment...</h5>
                    </div>
                @endif
            </div>

            <!--Sidebar Widgets-->
            <div class="col-md-4">
                <!--Recent Posts-->
                <div class="widget-sidebar">
                    <h5 class="sidebar-title">Recent Posts</h5>
                    <div class="sidebar-content">
                        <ul class="list-sidebar">
                            @foreach($latestPosts as $l_post)
                                <li>
                                    <a href="{{route('posts.single', $l_post->id)}}">{{\Illuminate\Support\Str::words($l_post->title, 5)}}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!--Popular Posts-->
                <div class="widget-sidebar">
                    <h5 class="sidebar-title">Popular Posts </h5><small><em>Highly Commented</em></small>
                    <div class="sidebar-content">
                        @if(\App\Models\Comment::count() > 0)
                        <ul class="list-sidebar">
                            @foreach($popularPosts as $p_post)
                                <li>
                                    <a href="{{route('posts.single', $p_post->id)}}">{{\Illuminate\Support\Str::words($p_post->title, 5)}}</a>
                                </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>

                <!--Latest Archived Posts-->
                <div class="widget-sidebar">
                    <h5 class="sidebar-title">Latest Archived Posts</h5>
                    <div class="sidebar-content">
                        <ul class="list-sidebar">
                            @foreach($latestArchivedPosts as $la_post)
                                <li>
                                    <span>{{\Illuminate\Support\Str::words($la_post->title, 5)}}</span>
                                    <span class="d-block"><small>By: <em>{{$la_post->author->name}}</em></small></span>
                                    <span class="d-block"><small>Archived at: <em>{{$la_post->deleted_at->format('Y-m-d')}}</em></small></span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

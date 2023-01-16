@push("f_styles")
    <style>
        @media (min-width: 768px){
            .post-box, .form-comments, .box-comments, .widget-sidebar {
                 padding: 0;
            }
        }

        .post-box, .form-comments, .box-comments, .widget-sidebar {
            padding: 0;
        }
    </style>
@endpush
<section class="blog-mf sect-pt4 route d-flex align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="title-box text-center">
                    <h2 class="text-uppercase fw-bold">
                        All Posts
                    </h2>
                    <div class="line-mf"></div>
                </div>

                <div class="widget-sidebar sidebar-search">
                    <div class="sidebar-content">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for post title or author or date or part of content..." wire:model="search" wire:focus="searchReset">
                            <span class="input-group-btn">
                                <button class="btn btn-secondary btn-search" type="button">
                                    <span class="bi bi-search"></span>
                              </button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @if($posts->count() > 0)
                @foreach($posts as $post)
                    <div class="col-sm-6 col-lg-4 mb-4 d-flex align-items-stretch">
                        <div class="card">
                            <a href="{{route('posts.single', $post->id)}}"><img class="card-img-top img-fluid" src="{{$post->image_for_web}}" alt="Card image cap"></a>
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><a href="#">{{$post->title}}</a></h5>
                                <div class="card-text mb-4"> {!! \Illuminate\Support\Str::words($post->content,50) !!}</div>
                                <a href="{{route('posts.single', $post->id)}}" class="btn btn-sm btn-primary mt-auto align-self-start">Read More</a>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <div class="post-author">
                                    <i class="bi bi-person-circle"></i>
                                    <span class="author">{{$post->author->name}}</span>
                                </div>
                                <div class="post-date">
                                    <span class="bi bi-clock"></span> {{$post->date_for_web}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="alert alert-warning" style="margin-bottom: 3rem">
                    <h5><i class="bi bi-exclamation-diamond"></i> No Posts Has Been Recorded Yet</h5>
                </div>
            @endif

        </div>
        <div class="d-flex justify-content-center mt-5 mb-5">
            <div class="">
                {{$posts->links()}}
            </div>
        </div>
    </div>
</section>

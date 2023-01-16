@push('styles')
    <style>
        .c-item{
            transition: all 0.2s ease-in-out;
            box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        }
        .c-item:hover{
            transform: scale(1.03);
            box-shadow: rgba(50, 50, 93, 0.25) 0px 13px 27px -5px, rgba(0, 0, 0, 0.3) 0px 8px 16px -8px;
        }
        .card-icon{
            font-size: 60px;
        }
    </style>
@endpush
<div class="row justify-content-center align-items-center">
    <div class="col-9">
        @if(auth()->user()->isAdmin())
            <div class="row">
                <div class="col-lg-6">
                    <a href="{{route('dashboard.users')}}" class="card c-item">
                        <div class="card-body text-center">
                            <i class="fa fa-user-circle card-icon"></i>
                            <h3 class="mt-2 text-uppercase"><span class="text-danger">({{$users->count()}})</span> {{\Illuminate\Support\Str::plural('User', $users->count())}}</h3>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="/" class="card c-item">
                        <div class="card-body text-center">
                            <i class="bx bx bx-world card-icon"></i>
                            <h3 class="mt-2 text-uppercase">Blog</h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <a href="{{route('dashboard.posts')}}" class="card c-item">
                        <div class="card-body text-center">
                            <i class="bx bx-detail card-icon"></i>
                            <h3 class="mt-2 text-uppercase"><span class="text-danger">({{$posts->count()}})</span> {{\Illuminate\Support\Str::plural('Post', $posts->count())}}</h3>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="{{route('dashboard.posts.archived')}}" class="card c-item">
                        <div class="card-body text-center">
                            <i class="bx bx-archive-in card-icon"></i>
                            <h3 class="mt-2 text-uppercase"><span class="text-danger">({{$archivedPosts->count()}})</span> {{\Illuminate\Support\Str::plural('Post', $archivedPosts->count())}} Archived</h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <a href="{{route('dashboard.comments')}}" class="card c-item">
                        <div class="card-body text-center">
                            <i class="bx bx-comment-dots card-icon"></i>
                            <h3 class="mt-2 text-uppercase"><span class="text-danger">({{$comments->count()}})</span> {{\Illuminate\Support\Str::plural('Comment', $comments->count())}}</h3>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="{{route('dashboard.posts.archived')}}" class="card c-item">
                        <div class="card-body text-center">
                            <i class="bx bx-archive-in card-icon"></i>
                            <h3 class="mt-2 text-uppercase"><span class="text-danger">({{$archivedComments->count()}})</span> {{\Illuminate\Support\Str::plural('Comment', $archivedComments->count())}} Archived</h3>
                        </div>
                    </a>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-lg-6">
                    <a href="{{route('dashboard.posts.archived')}}" class="card c-item">
                        <div class="card-body text-center">
                            <i class="bx bx-detail card-icon"></i>
                            <h3 class="mt-2 text-uppercase"><span class="text-danger">({{$posts->count()}})</span> {{\Illuminate\Support\Str::plural('Post', $posts->count())}}</h3>
                        </div>
                    </a>
                </div>
                <div class="col-lg-6">
                    <a href="/" class="card c-item">
                        <div class="card-body text-center">
                            <i class="bx bx bx-world card-icon"></i>
                            <h3 class="mt-2 text-uppercase">Blog</h3>
                        </div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <a href="{{route('dashboard.comments')}}" class="card c-item">
                        <div class="card-body text-center">
                            <i class="bx bx-comment-dots card-icon"></i>
                            <h3 class="mt-2 text-uppercase"><span class="text-danger">({{$comments->count()}})</span> {{\Illuminate\Support\Str::plural('Comment', $comments->count())}}</h3>
                        </div>
                    </a>
                </div>
            </div>
        @endif
    </div>
</div>



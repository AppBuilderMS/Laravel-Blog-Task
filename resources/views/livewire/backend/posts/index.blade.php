<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            @if(auth()->user()->isAdmin())
                <h5 class="card-header border-bottom text-uppercase bg-primary bg-soft text-primary">All Posts</h5>
            @else
                <h5 class="card-header border-bottom text-uppercase bg-primary bg-soft text-primary">All Posts By: {{auth()->user()->name}}</h5>
            @endif

            <div class="card-body">
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <i class="mdi mdi-check-all me-2"></i>
                        {{Session::get('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        @if(auth()->user()->isAdmin())
                            <h6 class="mb-0">All Posts List</h6>
                        @else
                            <h6 class="mb-0">All Posts List By: {{auth()->user()->name}}</h6>
                        @endif

                        <div>
                            <a href="{{route('dashboard.posts.create')}}" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add Post</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!--Filters-->
                        <div class="d-flex justify-content-between">
                            <label for="" class="d-flex justify-content-start align-items-center">
                                <span class="me-2">show</span>
                                <select name="" id="" class="form-select form-select-sm" wire:model="perPage" wire:change="searchReset">
                                    <option value="{{5}}">5</option>
                                    <option value="{{10}}">10</option>
                                    <option value="{{25}}">25</option>
                                    <option value="{{50}}">50</option>
                                    <option value="{{100}}">100</option>
                                </select>
                                <span class="ms-2">entries</span>
                            </label>
                            <label class="d-flex justify-content-start align-items-center">
                                <span class="me-2">Search:</span>
                                <input type="search" class="form-control form-control-sm" wire:model="search" wire:focus="searchReset">
                            </label>
                        </div>

                        <div class="table-responsive">
                            <table class="table mb-0">
                                <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="">Author</span>
                                            <span class="cursor-pointer" wire:click.prevent="sortBy('user_id')">
                                                <i class="fa fa-arrow-up {{$sortColumnName === 'user_id' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                                                <i class="fa fa-arrow-down {{$sortColumnName === 'user_id' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                            </span>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="">Title</span>
                                            <span class="cursor-pointer" wire:click.prevent="sortBy('title')">
                                                <i class="fa fa-arrow-up {{$sortColumnName === 'title' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                                                <i class="fa fa-arrow-down {{$sortColumnName === 'title' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                            </span>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="">Content</span>
                                            <span class="cursor-pointer" wire:click.prevent="sortBy('content')">
                                                <i class="fa fa-arrow-up {{$sortColumnName === 'content' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                                                <i class="fa fa-arrow-down {{$sortColumnName === 'content' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                            </span>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="">Created At</span>
                                            <span class="cursor-pointer" wire:click.prevent="sortBy('created_at')">
                                                <i class="fa fa-arrow-up {{$sortColumnName === 'created_at' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                                                <i class="fa fa-arrow-down {{$sortColumnName === 'created_at' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                            </span>
                                        </div>
                                    </th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(auth()->user()->isAdmin() && $allPosts->count() > 0)
                                    @foreach($allPosts as $index => $post)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>
                                                <div style="width: 70px">
                                                    <img class="img-thumbnail w-100" src="{{$post->image_for_web}}" alt="Post Image">
                                                </div>
                                            </td>
                                            <td>{{$post->author->name}}</td>
                                            <td><a target="_blank"  href="{{route('posts.single', $post->id)}}">{{\Illuminate\Support\Str::words($post->title, 5)}}</a></td>
                                            <td>{!!\Illuminate\Support\Str::words($post->content, 10)!!}</td>
                                            <td>{{$post->date_for_web}}</td>
                                            <td>
                                                <a href="{{route('dashboard.posts.edit', $post->id)}}" class="btn btn-info waves-effect">Edit</a>
                                                <a href="#" class="btn btn-danger waves-effect" wire:click.prevent="deletePost({{$post->id}})">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @elseif(!auth()->user()->isAdmin() && $writerRolePosts->count() > 0)
                                    @foreach($writerRolePosts as $index => $post)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>
                                                <div style="width: 70px">
                                                    <img class="img-thumbnail w-100" src="{{$post->image_for_web}}" alt="Post Image">
                                                </div>
                                            </td>
                                            <td>{{$post->author->name}}</td>
                                            <td>{{\Illuminate\Support\Str::words($post->title, 5)}}</td>
                                            <td>{!!\Illuminate\Support\Str::words($post->content, 10)!!}</td>
                                            <td>{{$post->date_for_web}}</td>
                                            <td>
                                                <a href="{{route('dashboard.posts.edit', $post->id)}}" class="btn btn-info waves-effect">Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7">
                                            <div class="alert alert-warning">
                                                <h6 class="mb-0">No Posts Recorded Yet</h6>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>

                            @if(auth()->user()->isAdmin())
                                <div class="mt-2 d-flex justify-content-end align-items-center">
                                    {{$allPosts->links()}}
                                </div>
                            @else
                                <div class="mt-2 d-flex justify-content-end align-items-center">
                                    {{$writerRolePosts->links()}}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

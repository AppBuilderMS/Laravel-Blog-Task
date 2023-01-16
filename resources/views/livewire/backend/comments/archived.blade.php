<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            @if(auth()->user()->isAdmin())
                <h5 class="card-header border-bottom text-uppercase bg-primary bg-soft text-primary">All Comments</h5>
            @else
                <h5 class="card-header border-bottom text-uppercase bg-primary bg-soft text-primary">All Comments For {{auth()->user()->name}}</h5>
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
                            <h6 class="mb-0">All Comments List</h6>
                        @else
                            <h6 class="mb-0">All Comments For {{auth()->user()->name}}</h6>
                        @endif
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
                                    <th>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="">Post</span>
                                            <span class="cursor-pointer" wire:click.prevent="sortBy('post_id')">
                                                <i class="fa fa-arrow-up {{$sortColumnName === 'post_id' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                                                <i class="fa fa-arrow-down {{$sortColumnName === 'post_id' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                            </span>
                                        </div>
                                    </th>
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
                                            <span class="">Comment</span>
                                            <span class="cursor-pointer" wire:click.prevent="sortBy('comment')">
                                                <i class="fa fa-arrow-up {{$sortColumnName === 'comment' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                                                <i class="fa fa-arrow-down {{$sortColumnName === 'comment' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
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
                                @if($allComments->count() > 0)
                                    @foreach($allComments as $index => $comment)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td><a target="_blank"  href="{{route('posts.single', $comment->post->id)}}">{{$comment->post->title}}</a></td>
                                            <td>{{$comment->user->name}}</td>
                                            <td>{{$comment->comment}}</td>
                                            <td>{{$comment->date_for_web}}</td>
                                            <td>
                                                <a href="#" class="btn btn-warning waves-effect" wire:click.prevent="restoreComment({{$comment->id}})">Restore</a>
                                                <a href="#" class="btn btn-danger waves-effect" wire:click.prevent="forceDeleteComment({{$comment->id}})">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7">
                                            <div class="alert alert-warning">
                                                <h6 class="mb-0">No Comments Recorded Yet</h6>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>


                            <div class="mt-2 d-flex justify-content-end align-items-center">
                                {{$allComments->links()}}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



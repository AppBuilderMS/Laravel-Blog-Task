<div class="row justify-content-center">
    <div class="col-9">
        <div class="card">
            <h5 class="card-header border-bottom text-uppercase bg-primary bg-soft text-primary">All Users</h5>

            <div class="card-body">
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <i class="mdi mdi-check-all me-2"></i>
                        {{Session::get('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0">All Users List</h6>
                    </div>
                    <div class="card-body">
                        <!--Filters-->
                        <div class="d-flex justify-content-between">
                            <label for="" class="d-flex justify-content-start align-items-center">
                                <span class="me-2">show</span>
                                <select name="" id="" class="form-select form-select-sm" wire:model="perPage">
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
                                            <span class="">Name</span>
                                            <span class="cursor-pointer" wire:click.prevent="sortBy('name')">
                                                <i class="fa fa-arrow-up {{$sortColumnName === 'name' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                                                <i class="fa fa-arrow-down {{$sortColumnName === 'name' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                            </span>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="">Email</span>
                                            <span class="cursor-pointer" wire:click.prevent="sortBy('email')">
                                                <i class="fa fa-arrow-up {{$sortColumnName === 'email' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                                                <i class="fa fa-arrow-down {{$sortColumnName === 'email' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
                                            </span>
                                        </div>
                                    </th>
                                    <th>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="">Role</span>
                                            <span class="cursor-pointer" wire:click.prevent="sortBy('role')">
                                                <i class="fa fa-arrow-up {{$sortColumnName === 'role' && $sortDirection === 'asc' ? '' : 'text-muted'}}"></i>
                                                <i class="fa fa-arrow-down {{$sortColumnName === 'role' && $sortDirection === 'desc' ? '' : 'text-muted'}}"></i>
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
                                @if($users->count() > 0)
                                    @foreach($users as $index => $user)
                                        <tr>
                                            <th scope="row">{{$loop->iteration}}</th>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->role}}</td>
                                            <td>{{$user->date_for_web}}</td>
                                            <td>
                                                @if($user->role != 'admin')
                                                    <a href="#" class="btn btn-info waves-effect" wire:click.prevent="makeAdmin({{$user->id}})">Make as admin</a>
                                                @endif
                                                <a href="#" class="btn btn-danger waves-effect" wire:click.prevent="deleteUser({{$user->id}})">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6">
                                            <div class="alert alert-warning">
                                                <h6 class="mb-0">No Users Details Recorded Yet</h6>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>

                            <div class="mt-2 d-flex justify-content-end align-items-center">
                                {{$users->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('styles')
    <link rel="stylesheet" href="{{asset('assets/backend/libs/summernote/summernote-lite.css')}}">
    <style>
        .note-editor .note-toolbar .note-color-all .note-dropdown-menu, .note-popover .popover-content .note-color-all .note-dropdown-menu {
            min-width: 350px !important;
        }

        .is-invalid-c{
            width: 100%;margin-top: 0.25rem;font-size: 80%;color: #f46a6a;
        }
    </style>

@endpush

<div class="row justify-content-center">
    <div class="col-9">
        <div class="card">
            <h5 class="card-header border-bottom text-uppercase bg-primary bg-soft text-primary">Edit Comment</h5>
            <div class="card-body">

                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <i class="mdi mdi-check-all me-2"></i>
                        {{Session::get('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form wire:submit.prevent="update">
                    <div class="row">
                        <div class="col-12">

                            <div class="form-group mb-2">
                                <label for="" class="require">Comment</label>
                                <textarea  class="form-control @error('comment') is-invalid @enderror" rows="5" placeholder="Add comment" wire:model="comment"></textarea>
                                @error('comment')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="mt-3 d-flex justify-content-end">
                                <button class="btn btn-primary waves-effect" type="submit">Save</button>
                            </div>
                        </div>
                    </div>


                </form>

            </div>
        </div>
    </div>
</div>



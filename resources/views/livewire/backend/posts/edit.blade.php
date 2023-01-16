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
            <h5 class="card-header border-bottom text-uppercase bg-primary bg-soft text-primary">Edit Post</h5>
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
                                <label for="" class="require">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Add post title" wire:model="title">
                                @error('title')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" wire:model="image">
                                @error('image')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                                @enderror
                                @if($image)
                                    @php
                                        $validExtension = false;
                                        $extension = pathinfo($image->getFilename(), PATHINFO_EXTENSION);
                                        if (in_array($extension, ['png','jpg','webp'])) {
                                            $validExtension = true;
                                        }
                                    @endphp
                                    @if($validExtension == true)
                                        <div style="width: 70px" class="mt-2">
                                            <img src="{{$image->temporaryUrl()}}" class="img-thumbnail w-100" alt="">
                                        </div>
                                    @endif
                                @elseif($oldImage)
                                    <div style="width: 70px" class="mt-2">
                                        <img src="{{asset('uploads/posts_images')}}/{{$oldImage}}" class="img-thumbnail w-100" alt="">
                                    </div>
                                @else
                                    <div style="width: 70px" class="mt-2">
                                        <img src="{{asset('uploads/posts_images/default.png')}}" class="img-thumbnail w-100" alt="">
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mb-2" wire:ignore>
                                <label>Content</label>
                                <textarea id="editor-edit-content" class="form-control" wire:model="content"></textarea>
                            </div>
                            @error('content')
                            <div class="is-invalid-c">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror

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



@push('scripts')
    <!--Summernote-->
    <script src="{{asset('assets/backend/libs/summernote/summernote-lite.min.js')}}"></script>
    <script>
        @if(auth()->user()->isAdmin())
            $(document).ready(function() {
                $('#editor-edit-content').summernote({
                    placeholder: "Add Post Content...",
                    minHeight: 600,
                    tabSize: 2,
                    toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript', "underline", "clear"]],
                        ["fontname", ["fontname"]],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        ["table", ["table"]],
                        ["insert", ["link"]],
                        ["view", ["help", "codeview"]]
                    ],
                    callbacks: {
                        onChange: function(contents, $editable) {
                            @this.set('content', contents)
                        }
                    }
                });
            });
        @else
            $(document).ready(function() {
                $('#editor-edit-content').summernote({
                    placeholder: "Add Post Content...",
                    minHeight: 600,
                    tabSize: 2,
                    toolbar: [
                        ['style', ['bold', 'italic', 'underline', 'clear']],
                        ['font', ['strikethrough', 'superscript', 'subscript', "underline", "clear"]],
                        ["fontname", ["fontname"]],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['height', ['height']],
                        ["table", ["table"]],
                        ["insert", ["link"]],
                        ["view", ["help"]]
                    ],
                    callbacks: {
                        onChange: function(contents, $editable) {
                            @this.set('content', contents)
                        }
                    }
                });
            });
        @endif
    </script>

@endpush

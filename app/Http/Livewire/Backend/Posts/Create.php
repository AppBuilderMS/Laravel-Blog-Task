<?php

namespace App\Http\Livewire\Backend\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Validator;
//use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;
    public $title;
    public $content;
    public $image;

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required|unique:posts|max:255',
            'content' => 'required|min:20',
            'image' => 'required|image|mimes:png,jpg,webp|max:2048'
        ]);
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|unique:posts|max:255',
            'content' => 'required|min:20',
            'image' => 'required|image|mimes:png,jpg,webp|max:2048'
        ]);

        uploadPostImage($this->image);

        $post = new Post();
        $post->title = $this->title;
        $post->content = $this->content;
        $post->image = $this->image->hashName();
        $post->user_id = Auth::id();
        $post->save();

        redirect(route('dashboard.posts'))->with('success', 'Post has been created successfully!');
    }
    public function render()
    {
        $breadcrumbs = [
            ['name' => 'Dashboard' , 'link' => route('dashboard.dashboard')],
            ['name' => 'Posts', 'link' => route('dashboard.posts')],
            ['name' => 'Create New Post'],
        ];
        $pageTitle = 'Create New Post';
        return view('livewire.backend.posts.create')->layout('backend.layouts.app', ['breadcrumbs' => $breadcrumbs, 'pageTitle' => $pageTitle]);
    }
}

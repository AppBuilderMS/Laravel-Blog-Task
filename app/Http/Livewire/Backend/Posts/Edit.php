<?php

namespace App\Http\Livewire\Backend\Posts;

use App\Models\Post;
//use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
//use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
    public $post;
    public $title;
    public $content;
    public $image;
    public $oldImage;

    public function mount($id)
    {
        $this->post = Post::findOrFail($id);
        $this->title = $this->post->title;
        $this->content = $this->post->content;
        $this->oldImage = $this->post->image;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'title' => 'required|max:255|unique:posts,title,'.$this->post->id,
            'content' => 'required|min:20',
            'image' => [Rule::when($this->image, ['required', 'image', 'mimes:png,jpg,webp', 'max:2048'])]
        ]);
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|max:255|unique:posts,title,'.$this->post->id,
            'content' => 'required|min:20',
            'image' => [Rule::when($this->image, ['required', 'image', 'mimes:png,jpg,webp', 'max:2048'])]
        ]);

        if($this->image){
            //delete old image
            if($this->image != 'default.png' && $this->oldImage != 'default.png'){
                deleteOldImage($this->post->image);
            }
            //create new image
            uploadPostImage($this->image);
        }
        $this->post->update([
            'title' => $this->title,
            'content' => $this->content,
            'image' =>  $this->image ? $this->image->hashName() : $this->oldImage,
        ]);
        redirect(route('dashboard.posts'))->with('success', 'Post has been updated successfully!');
    }
    public function render()
    {
        $breadcrumbs = [
            ['name' => 'Dashboard' , 'link' => route('dashboard.dashboard')],
            ['name' => 'Posts', 'link' => route('dashboard.posts')],
            ['name' => 'Edit Post'],
        ];
        $pageTitle = 'Edit Post';
        return view('livewire.backend.posts.edit')->layout('backend.layouts.app', ['breadcrumbs' => $breadcrumbs, 'pageTitle' => $pageTitle]);
    }
}

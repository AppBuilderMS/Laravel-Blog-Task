<?php

namespace App\Http\Livewire\Frontend\Posts;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Single extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $post;
    public $user_id;
    public $post_id;
    public $comment;

    public function mount($id)
    {
        $this->post = Post::findOrFail($id);
        $this->post_id = $this->post->id;
        if(auth()->user()){
            $this->user_id = auth()->user()->id;
        }
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
           'user_id' => 'required',
            'post_id' => 'required',
            'comment' => 'required|min:5'
        ]);
    }

    public function save()
    {
        $this->validate([
            'user_id' => 'required',
            'post_id' => 'required',
            'comment' => 'required'
        ]);

        Comment::create([
            'user_id' => $this->user_id,
            'post_id' => $this->post->id,
            'comment' => $this->comment,
        ]);

        $this->mount($this->post_id);

        session()->flash('success', 'Your comment has been added successfully!');
    }


    public function render()
    {
        $latestPosts = Post::with('author', 'comments')->orderBy('created_at', 'desc')->take(5)->get();
        $popularPosts = Post::withCount('comments')->orderBy('comments_count', 'desc')->take(10)->get();
        $latestArchivedPosts = Post::onlyTrashed()->with('author')->orderBy('deleted_at', 'desc')->get();
        return view('livewire.frontend.posts.single',[
            'latestPosts' => $latestPosts,
            'popularPosts' => $popularPosts,
            'latestArchivedPosts' => $latestArchivedPosts
        ])->layout('frontend.layouts.app');
    }
}

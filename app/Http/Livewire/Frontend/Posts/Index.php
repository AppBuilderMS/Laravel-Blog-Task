<?php

namespace App\Http\Livewire\Frontend\Posts;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;

    public function searchReset()
    {
        $this->resetPage();
    }

    public function render()
    {
        $posts = Post::with('author')->search(trim($this->search))->orderBy('created_at', 'desc')->paginate(9);
        return view('livewire.frontend.posts.index',[
            'posts' => $posts
        ])->layout('frontend.layouts.app');
    }
}

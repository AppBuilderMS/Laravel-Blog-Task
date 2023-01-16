<?php

namespace App\Http\Livewire\Backend\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $perPage;
    public $sortColumnName = 'created_at';
    public $sortDirection = 'desc';
    public $search;

    public function mount()
    {
        $this->perPage = 5;
        $this->search = '';
    }

    public function sortBy($columnName)
    {
        if($this->sortColumnName === $columnName){
            $this->sortDirection = $this->swapSortDirection();
        }else{
            $this->sortDirection = 'asc';
        }
        $this->sortColumnName = $columnName;
    }

    public function swapSortDirection()
    {
        return $this->sortDirection === 'asc' ? 'desc' : 'asc';
    }

    public function searchReset()
    {
        $this->resetPage();
    }

    public function deletePost($postId)
    {
        $post = Post::find($postId);
        $post->delete();
        $this->resetPage();
        session()->flash('success', 'Post has been archived successfully!');
    }

    public function render()
    {
        $breadcrumbs = [
            ['name' => 'Dashboard' , 'link' => route('dashboard.dashboard')],
            ['name' => 'Posts']
        ];
        $pageTitle = 'Posts';

        $allPosts = Post::with('author')->search(trim($this->search))
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->perPage);
        $writerRolePosts = Post::with('author')->where('user_id', Auth::id())->search(trim($this->search))
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->perPage);
        return view('livewire.backend.posts.index',[
            'allPosts' => $allPosts,
            'writerRolePosts' => $writerRolePosts
        ])->layout('backend.layouts.app', ['breadcrumbs' => $breadcrumbs, 'pageTitle' => $pageTitle]);
    }
}

<?php

namespace App\Http\Livewire\Backend\Posts;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Archived extends Component
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

    public function forceDeletePost($postId)
    {
        $post = Post::withTrashed()->find($postId);
        //delete old image
        if($post->image != 'default.png'){
            deleteOldImage($post->image);
        }
        $post->forceDelete();
        $this->mount();
        session()->flash('success', 'Post has been deleted successfully!');
    }

    public function restorePost($postId)
    {
        Post::withTrashed()->find($postId)->restore();
        redirect(route('dashboard.posts'))->with('success', 'Post has been restored successfully!');
    }

    public function render()
    {
        $breadcrumbs = [
            ['name' => 'Dashboard' , 'link' => route('dashboard.dashboard')],
            ['name' => 'Archived Posts']
        ];
        $pageTitle = 'Archived Posts';
        $allPosts = Post::onlyTrashed()->with('author')->search(trim($this->search))
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->perPage);
        return view('livewire.backend.posts.archived',[
            'allPosts' => $allPosts
        ])->layout('backend.layouts.app', ['breadcrumbs' => $breadcrumbs, 'pageTitle' => $pageTitle]);
    }
}

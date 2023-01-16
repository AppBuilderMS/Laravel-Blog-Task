<?php

namespace App\Http\Livewire\Backend\Comments;

use App\Models\Comment;
use App\Models\Post;
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

    public function forceDeleteComment($commentId)
    {
        $comment = Comment::withTrashed()->find($commentId);
        $comment->forceDelete();
        $this->mount();
        session()->flash('success', 'Comment has been deleted successfully!');
    }

    public function restoreComment($commentId)
    {
        Comment::withTrashed()->find($commentId)->restore();
        redirect(route('dashboard.comments'))->with('success', 'Comment has been restored successfully!');
    }
    public function render()
    {
        $breadcrumbs = [
            ['name' => 'Dashboard' , 'link' => route('dashboard.dashboard')],
            ['name' => 'Archived Comments']
        ];
        $pageTitle = 'Archived Comments';
        $allComments = Comment::onlyTrashed()->with('user')->search(trim($this->search))
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->perPage);
        return view('livewire.backend.comments.archived',[
            'allComments' => $allComments
        ])->layout('backend.layouts.app', ['breadcrumbs' => $breadcrumbs, 'pageTitle' => $pageTitle]);
    }
}

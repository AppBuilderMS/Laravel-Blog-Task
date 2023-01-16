<?php

namespace App\Http\Livewire\Backend\Comments;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
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

    public function deleteComment($commentId)
    {
        $comment = Comment::find($commentId);
        $comment->delete();
        $this->resetPage();
        session()->flash('success', 'Comment has been archived successfully!');
    }
    public function render()
    {
        $breadcrumbs = [
            ['name' => 'Dashboard' , 'link' => route('dashboard.dashboard')],
            ['name' => 'Comments']
        ];
        $pageTitle = 'Comments';

        $allComments = Comment::with(['user', 'post'])->search(trim($this->search))
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->perPage);
        $writerRoleComments = Comment::with(['user', 'post'])->where('user_id', Auth::id())->search(trim($this->search))
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->perPage);
        return view('livewire.backend.comments.index',[
            'allComments' => $allComments,
            'writerRoleComments' => $writerRoleComments
        ])->layout('backend.layouts.app', ['breadcrumbs' => $breadcrumbs, 'pageTitle' => $pageTitle]);
    }
}

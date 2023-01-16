<?php

namespace App\Http\Livewire\Backend\Users;

use App\Models\User;
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

    public function deleteUser($userId)
    {
        $user = User::find($userId);
        $user->delete();
        $this->resetPage();
        session()->flash('success', 'User has been deleted successfully!');
    }

    public function makeAdmin($userId)
    {
        $user = User::find($userId);
        $user->update([
            'role' => 'admin'
        ]);
        session()->flash('success', 'User has been updated successfully!');
    }

    public function searchReset()
    {
        $this->resetPage();
    }

    public function render()
    {
        $breadcrumbs = [
            ['name' => 'Dashboard' , 'link' => route('dashboard.dashboard')],
            ['name' => 'Users']
        ];
        $pageTitle = 'Users';

        $users = User::with('posts')->search(trim($this->search))
            ->orderBy($this->sortColumnName, $this->sortDirection)
            ->paginate($this->perPage);
        return view('livewire.backend.users.index',[
            'users' => $users
        ])->layout('backend.layouts.app', ['breadcrumbs' => $breadcrumbs, 'pageTitle' => $pageTitle]);
    }
}

<?php

namespace App\Http\Livewire\Backend\Comments;

use App\Models\Comment;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Edit extends Component
{
    public $oldComment;
    public $comment;

    public function mount($id)
    {
        $this->oldComment = Comment::findOrFail($id);
        $this->comment = $this->oldComment->comment;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'comment' => 'required|min:5'
        ]);
    }

    public function update()
    {
        $this->validate([
            'comment' => 'required|min:5'
        ]);

        $this->oldComment->update([
            'comment' => $this->comment,
        ]);
        redirect(route('dashboard.comments'))->with('success', 'Comment has been updated successfully!');
    }
    public function render()
    {
        $breadcrumbs = [
            ['name' => 'Dashboard' , 'link' => route('dashboard.dashboard')],
            ['name' => 'Comments', 'link' => route('dashboard.comments')],
            ['name' => 'Edit Comment'],
        ];
        $pageTitle = 'Edit Comment';
        return view('livewire.backend.comments.edit')->layout('backend.layouts.app', ['breadcrumbs' => $breadcrumbs, 'pageTitle' => $pageTitle]);
    }
}

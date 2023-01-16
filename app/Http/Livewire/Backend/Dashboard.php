<?php

namespace App\Http\Livewire\Backend;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $breadcrumbs = [
            ['name' => 'Dashboard'],
        ];
        $pageTitle = 'Dashboard';

        $users = User::all();
        $archivedPosts = Post::onlyTrashed()->with('author')->orderBy('deleted_at', 'desc')->get();
        $archivedComments = Comment::onlyTrashed()->with(['user', 'post'])->orderBy('deleted_at', 'desc')->get();
        if(auth()->user()->isAdmin()){
            $posts = Post::all();
            $comments = Comment::all();
        }else{
            $posts = Post::where('user_id', Auth::id())->get();
            $comments = Comment::where('user_id', Auth::id())->get();
        }


        return view('livewire.backend.dashboard',[
            'users' => $users,
            'posts' => $posts,
            'archivedPosts' => $archivedPosts,
            'comments' => $comments,
            'archivedComments' => $archivedComments,
        ])->layout('backend.layouts.app', ['breadcrumbs' => $breadcrumbs, 'pageTitle' => $pageTitle]);
    }
}

<?php

namespace App\Http\Livewire\Backend;

use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class EditAuthCredentials extends Component
{

    public $name;
    public $email;
    public $current_password;
    public $password;
    public $password_confirmation;

    public function mount(){
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => [
                'required',
                'different:current_password',
                Rule::when(true, ['min:8', 'confirmed'])
            ],
        ]);
    }

    public function saveCredentials()
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => $this->current_password ? 'required|min:8|confirmed|different:current_password' : '',
        ]);

        if($this->current_password){
            if(Hash::check($this->current_password, Auth::user()->password))
            {
                $user = User::findOrFail(auth()->user()->id);
                $user->name = $this->name;
                $user->email = $this->email;
                $user->password = Hash::make($this->password);
                $user->save();
                session()->flash('password_success', 'User data has been changed successfully!');
            }else{
                session()->flash('password_error', "Current password doesn't match!");
            }
        }else{
            $user = User::findOrFail(auth()->user()->id);
            $user->name = $this->name;
            $user->email = $this->email;
            $user->save();
            session()->flash('password_success', 'user data has been changed successfully!');
        }
    }
    public function render()
    {
        $breadcrumbs = [
            ['name' => 'Dashboard', 'link' => route('dashboard.dashboard')],
            ['name' => 'Edit Auth Credentials'],
        ];
        $pageTitle = 'Edit Auth Credentials';
        return view('livewire.backend.edit-auth-credentials')->layout('backend.layouts.app', ['breadcrumbs' => $breadcrumbs, 'pageTitle' => $pageTitle]);
    }
}

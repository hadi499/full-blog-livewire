<?php

namespace App\Livewire\Users;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Login')]
class Login extends Component
{

    #[Rule('required', 'email')]
    public string $email = '';

    #[Rule('required')]
    public string $password = '';

    public function login()
    {
        if (Auth::attempt($this->validate())) {
            return redirect()->route('home');
        }
        throw ValidationException::withMessages([
            'email' => 'the provided credentials do not match.'
        ]);
    }

    public function render()
    {
        return view('livewire.users.login');
    }
}
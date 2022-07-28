<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LoginComponent extends Component
{
    public $email, $password;

    public function render()
    {
        return view('livewire.login-component');
    }

    public function login()
    {
        $data = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt($data)){
            return redirect()->intended('/');
        }else{
            $this->dispatchBrowserEvent('swal:modal', [
                'type' => 'error',
                'title' => 'Sorry, credentials are invalid!',
                'text' => '',
            ]);
        }
    }

}

<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Clicker extends Component
{
    use WithPagination;
    #[Rule('required|min:2|max:50')]
    public $name = '';

    #[Rule('required|email|unique:users')]
    public $email='';

    #[Rule('required|min:2')]
    public $password;

    public function handleClicker(){
        /** first validation way */
        /*
        $this->validate([
            "name"=>"required|min:2|max:6",
            "email"=>"required|email|unique:users",
            "password"=>"required|min:2|max:6",
        ]);
        */
        $this->validate();
        $user = User::create([
            "name"=>$this->name,
            "email"=>$this->email,
            "password"=>Hash::make($this->password),
        ]);
        $this->reset(['name','email','password']);
        request()->session()->flash('success', "User created successfully");
    }

    public function render()
    {
        $data["users"] = User::paginate(5);
        return view('livewire.clicker',$data);
    }
}

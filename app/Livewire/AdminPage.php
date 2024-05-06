<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;

class AdminPage extends Component
{
    public function render()
    {   
        $students = User::where('status', 'inactive')->get();
        dd($students);
        return view('livewire.admin-page', compact('students'));
    }
}

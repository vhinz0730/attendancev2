<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class StudentPage extends Component
{
    use WithPagination;
    public function render()
    {
        $students = User::where('status', 'active')->orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.student-page', compact('students'));
    }

    public function delete($id)
    {
        $this->studentID = $id;
       
        User::where('id', $this->studentID)->delete();
         

        session()->flash('message', 'Student removed!');
        $this->reset();
    }
}

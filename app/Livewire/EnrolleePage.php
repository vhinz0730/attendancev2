<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;

class EnrolleePage extends Component
{
    public $studentID;
    public $status;
    use WithPagination;

    public function render()
    {
        $students = User::where('status', 'inactive')->orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.enrollee-page', compact('students'));
    }
    public function accept($id)
    {
        $this->studentID = $id;
        $status = "Active";

        User::where('id', $this->studentID)->update([
            'status' => $status,
        ]);

        session()->flash('message', 'Student accepted!');
        $this->reset();
    }
    public function delete($id)
    {
        $this->studentID = $id;
       
        User::where('id', $this->studentID)->delete();
         

        session()->flash('message', 'Student removed!');
        $this->reset();
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Log;
use Livewire\WithPagination;

class TimeinPage extends Component
{
    use WithPagination;
    public function render()
    {
        $students = Log::where('action', 'Time In')->orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.timein-page', compact('students'));
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Log;
use Livewire\WithPagination;

class LogPage extends Component
{
    use WithPagination;

    public function render()
    {
        $students = Log::orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.log-page', compact('students'));
    }
}

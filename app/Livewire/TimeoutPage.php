<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Log;
use Livewire\WithPagination;

class TimeoutPage extends Component
{
    use WithPagination;
    public function render()
    {
        $students = Log::where('action', 'Time Out')->orderBy('created_at', 'desc')->paginate(5);
        return view('livewire.timeout-page', compact('students'));
    }
}

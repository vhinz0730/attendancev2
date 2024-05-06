<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Log;

class TimePage extends Component
{
    public $student_id,$name,$year,$section,$action,$picture;
    public $currentTime;
    public $currentDate;
    public $studentID;
    public $logs;

    public function render()
    {
        $this->currentTime = now()->format('h:i A');
        $this->currentDate = now()->format('F j, Y');
        return view('livewire.time-page');
    }
    public function logs()
    {
       
    }

    public function timein()
    {
        try {
            $user = User::where('student_id', $this->student_id)
                            ->where('status', 'Active')->first();
            if ($user) {
                $log = new Log();
                $log->student_id = $user->student_id;
                $log->name = $user->name;
                $log->year = $user->year;
                $log->section = $user->section;
                $log->action = 'Time In';
                $log->picture = $user->profile_picture;
                $log->save();
                $this->reset();


                session()->flash('message', [
                    'student_id' => $log->student_id,
                    'name' => $log->name,
                    'year' => $log->year,
                    'section' => $log->section,
                    'action' => $log->action,
                    'picture' => $log->picture,
                    'time' => $this->currentTime = now()->format('h:i A')
                ]);
               
            } else {
                session()->flash('error', 'Student not found!');
            }
        } catch (\Exception $e) {
            // Handle the exception
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
        }
    }

    public function timeout()
    {
        try {
            $user = User::where('student_id', $this->student_id)
                        ->where('status', 'Active')->first();
    
            if ($user) {
                $log = new Log();
                $log->student_id = $user->student_id;
                $log->name = $user->name;
                $log->year = $user->year;
                $log->section = $user->section;
                $log->action = 'Time Out';
                $log->picture = $user->profile_picture;
                $log->save();
                $this->reset();


                session()->flash('message', [
                    'student_id' => $log->student_id,
                    'name' => $log->name,
                    'year' => $log->year,
                    'section' => $log->section,
                    'action' => $log->action,
                    'picture' => $log->picture,
                    'time' => $this->currentTime = now()->format('h:i A')
                ]);
               
            } else {
                session()->flash('error', 'Student ID not found.');
            }
        } catch (\Exception $e) {
            // Handle the exception
            session()->flash('error', 'An error occurred: ' . $e->getMessage());
        }
        
    }
    public function closeModal()
    {
        $this->reset();
        return view('livewire.time-page');
    }
}

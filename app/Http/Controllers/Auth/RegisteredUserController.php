<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'year' => 'required',
            'section' => 'required',
            'profile_picture' => ['image', 'max:2048']
        ]);
        if ($request->hasFile('profile_picture')) {
            $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
        } else {
            $imagePath = null;
        }
        do {
            $student_id = mt_rand(1000000, 9999999);
        } while (User::where('student_id', $student_id)->exists());

        $user = User::create([
            'name' => ucwords($request->name),
            'email' => $request->email,
            'year' => ucwords($request->year),
            'section' => strtoupper($request->section),
            'student_id' => $student_id,
            'profile_picture' => $imagePath,
            'status' => "Inactive"
        ]);
        $flashMessage = 'Your ID: '.$student_id;
        if ($imagePath) {
            // If profile picture exists, append HTML for image tag to flash message
            $imageURL = asset('storage/'.$imagePath);
            $flashMessage .= '<br>';
        }

        event(new Registered($user));
        session()->flash('message', $flashMessage );
        return redirect(route('register', absolute: false));
    }
}

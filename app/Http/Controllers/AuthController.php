<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function showLoginForm()
    {
        return view('auth.login'); // Ensure this view exists in resources/views/auth/
    }

    public function login(Request $request)
{
    // Validate the incoming request data
    $request->validate([
        'email' => 'required|string|email',
        'password' => 'required|string',
    ]);

    // Attempt to log the user in
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        // If successful, redirect to intended page or dashboard
        return redirect()->intended('admin')->with('success', 'Login successful!');
    }

    // If authentication fails, redirect back with an error message
    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->withInput($request->only('email')); // Preserve the email input
}


    public function showRegistrationForm()
    {
        return view('auth.register'); // Ensure this view exists in resources/views/auth/
    }
    
    public function register(Request $request)
    {
        // Validate input fields including profile photo
        $data = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:10|regex:/^\d{10}$/',
            'first_name' => 'required|string|max:255', // Add validation for first name
            'last_name' => 'required|string|max:255',  // Add validation for last name
            'password' => 'required|string|confirmed',
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate photo
        ]);
    
        // Handle file upload
        $photoPath = null; // Initialize variable to hold photo path
        if ($request->hasFile('profile_photo')) {
            $profilePhoto = $request->file('profile_photo');
            $photoPath = $profilePhoto->store('uploads/profile_photos', 'public'); // Save to 'storage/app/public/uploads/profile_photos'
        }
    
        // Save user with profile photo path using repository
        $user = $this->userRepository->create([
            'username' => $data['username'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'first_name' => $data['first_name'],  // Include first name
            'last_name' => $data['last_name'],    // Include last name
            'password' => bcrypt($data['password']),
            'profile_photo_path' => $photoPath,    // Save the file path
        ]);
    
        return redirect()->route('login')->with('success', 'Registration successful! Please login.');
    }
    
    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/login'); // Redirect to home after logout
    }

    
}

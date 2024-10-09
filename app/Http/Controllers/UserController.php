<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $userRepository;

    // Inject the repository
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        // Get all users from the repository
        $users = $this->userRepository->getAll();
        return view('admin.index', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'required|string|max:10',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'password' => 'required|string|confirmed|min:6',
            'profile_photo' => 'required|image|max:2048',
        ]);

        // Handle file upload
        $filePath = null;
        if ($request->hasFile('profile_photo')) {
            $filePath = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        // Create user via the repository
        $this->userRepository->create([
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => Hash::make($request->password),
            'profile_photo_path' => $filePath,
        ]);

        return response()->json(['success' => 'User created successfully!']);
    }

    public function edit($id)
    {
        // Get the user by ID via the repository
        $user = $this->userRepository->findById($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $user = $this->userRepository->findById($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'phone' => 'required|string|max:10',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'password' => 'nullable|string|confirmed|min:6',
            'profile_photo' => 'nullable|image|max:2048',
        ]);

        // Handle file upload
        $filePath = $user->profile_photo_path; // Preserve existing file
        if ($request->hasFile('profile_photo')) {
            $filePath = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        // Update user via the repository
        $this->userRepository->update($id, [
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'profile_photo_path' => $filePath,
        ]);

        return response()->json(['success' => 'User updated successfully!']);
    }

    public function destroy($id)
    {
        $user = $this->userRepository->findById($id);
        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $this->userRepository->delete($id);
        return response()->json(['success' => 'User deleted successfully!']);
    }
}

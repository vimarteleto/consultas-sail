<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use App\Repositories\UserRepository;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    public function getUsers()
    {
    	$users = $this->userRepository->getUsers();
        return response($users);
    }

    public function getUserById($id)
    {
        $user = $this->userRepository->getUserById($id);
        return $user ?? response()->json(['message' => "User does not exists"], 404);
    }

    public function getAppointmentsByUserId($id)
	{
		$appointments = $this->userRepository->getAppointmentsByUserId($id);
        return $appointments ?? response()->json(['message' => "User does not exists"], 404);
	}

    public function updateUser(UpdateUserRequest $request, $id)
	{
		$user = $this->userRepository->updateUser($request, $id);
		return $user ?? response()->json(['message' => "User does not exists"], 404);
	}

    public function deleteUser($id)
	{
        $user = $this->userRepository->deleteUser($id);
        $user ? $message = "User $id removed" : $message = "User does not exists";
        return response()->json(['message' => $message]);
	}
}

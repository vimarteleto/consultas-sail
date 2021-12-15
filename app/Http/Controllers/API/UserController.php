<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Repositories\UserRepository;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    public function getAllUsers()
    {
    	$users = $this->userRepository->getAll();
        return response($users);
    }

    public function getUserById($id)
    {
        $user = $this->userRepository->getUserById($id);
        return response($user);
    }

    public function getAppointmentsByUserId($id)
	{
		$appointments = $this->userRepository->getAppointmentsByUserId($id);
        return response($appointments);
	}
}

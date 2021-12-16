<?php

namespace App\Repositories;

use App\Http\Requests\User\RegisterUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository 
{
	private $model;

	public function __construct(User $model)
	{
		$this->model = $model;
	}

	public function createUser(RegisterUserRequest  $request)
	{
		$user = $this->model->create([
			'email' => $request->email,
			'name' => $request->name,
			'password' => Hash::make($request->password),
			'crm' => $request->crm,
			'specialty_id' => $request->specialty_id,
		]);
		return $user;
	}

	public function getUsers()
	{
		return $this->model->all();
	}
	
	public function getUserById($id)
	{
		return $this->model->find($id);
	}

	public function getAppointmentsByUserId($id)
	{
		$user = $this->model->find($id);
		return $user ? $user->appointments()->with('patient', 'doctor')->get() : null;
	}

	public function updateUser(UpdateUserRequest $request, $id)
	{
		$user = $this->model->find($id);
		$user ? $user->update($request->all()) : $user = null;
		return $user;
	}

	public function deleteUser($id)
	{
		$user = $this->model->find($id);
		$user ? $user->delete() : $user = null;
		return $user;
		
	}
}
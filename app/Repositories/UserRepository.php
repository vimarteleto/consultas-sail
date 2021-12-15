<?php

namespace App\Repositories;

use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository 
{
	private $model;

	public function __construct(User $model)
	{
		$this->model = $model;
	}

	public function create(RegisterRequest $request)
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

	public function getAll()
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
		return $user->appointments()->get();
	}
}
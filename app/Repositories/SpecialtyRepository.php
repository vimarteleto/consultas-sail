<?php

namespace App\Repositories;

use App\Http\Requests\Specialty\RegisterSpecialtyRequest;
use App\Http\Requests\Specialty\UpdateSpecialtyRequest;
use App\Models\Specialty;

class SpecialtyRepository 
{
	private $model;

	public function __construct(Specialty $model)
	{
		$this->model = $model;
	}

	public function createSpecialty(RegisterSpecialtyRequest  $request)
	{
		$specialty = $this->model->create([
			'name' => $request->name,
		]);
		return $specialty;
	}

	public function getSpecialties()
	{
		return $this->model->all();
	}
	
	public function getSpecialtyById($id)
	{
		return $this->model->find($id);
	}

	public function getDoctorsBySpecialtyId($id)
	{
		$specialty = $this->model->find($id);
		return $specialty ? $specialty->doctors()->get() : null;
	}

	public function updateSpecialty(UpdateSpecialtyRequest $request, $id)
	{
		$specialty = $this->model->find($id);
		$specialty ? $specialty->update($request->all()) : $specialty = null;
		return $specialty;
	}

	public function deleteSpecialty($id)
	{
		$specialty = $this->model->find($id);
		$specialty ? $specialty->delete() : $specialty = null;
		return $specialty;
		
	}
}
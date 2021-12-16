<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Specialty\RegisterSpecialtyRequest;
use App\Http\Requests\Specialty\UpdateSpecialtyRequest;
use App\Repositories\SpecialtyRepository;
use Illuminate\Http\Request;

class SpecialtyController extends Controller
{
    private $specialtyRepository;

    public function __construct(SpecialtyRepository $specialtyRepository)
    {
        $this->specialtyRepository = $specialtyRepository;
    }

    public function createSpecialty(RegisterSpecialtyRequest $request)
    {
        $specialty = $this->specialtyRepository->createSpecialty($request);
        return response()->json($specialty, 200);
    }
    
    public function getSpecialties()
    {
    	$specialties = $this->specialtyRepository->getSpecialties();
        return response($specialties);
    }

    public function getSpecialtyById($id)
    {
        $specialty = $this->specialtyRepository->getSpecialtyById($id);
        return $specialty ?? response()->json(['message' => "Specialty does not exists"], 404);
    }

    public function getDoctorsBySpecialtyId($id)
	{
		$doctors = $this->specialtyRepository->getDoctorsBySpecialtyId($id);
        return $doctors ?? response()->json(['message' => "Specialty does not exists"], 404);
	}

    public function updateSpecialty(UpdateSpecialtyRequest $request, $id)
	{
        $specialty = $this->specialtyRepository->updateSpecialty($request, $id);
		return $specialty ?? response()->json(['message' => "Specialty does not exists"], 404);
	}

    public function deleteSpecialty($id)
	{
        $specialty = $this->specialtyRepository->deleteSpecialty($id);
        $specialty ? $message = "Specialty $id removed" : $message = "Specialty does not exists";
        return response()->json(['message' => $message]);
	}
}

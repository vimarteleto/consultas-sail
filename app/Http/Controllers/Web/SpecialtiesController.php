<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Specialty\RegisterSpecialtyRequest;
use App\Http\Requests\Specialty\UpdateSpecialtyRequest;
use App\Repositories\AppointmentRepository;
use App\Repositories\PatientRepository;
use App\Repositories\SpecialtyRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpecialtiesController extends Controller
{
    protected $userRepository;
    protected $appointmentRepository;
    protected $patientRepository;
    protected $specialtyRepository;

    public function __construct(
        UserRepository $userRepository, 
        AppointmentRepository $appointmentRepository,
        PatientRepository $patientRepository,
        SpecialtyRepository $specialtyRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->appointmentRepository = $appointmentRepository;
        $this->patientRepository = $patientRepository;
        $this->specialtyRepository = $specialtyRepository;
    }

    public function getSpecialties()
    {
        $specialties = $this->specialtyRepository->getSpecialties();
        return view('specialties.specialties', ['specialties' => $specialties]);
    }

    public function getSpecialtyById($id)
    {
        $specialty = $this->specialtyRepository->getSpecialtyById($id);
        return view('specialties.edit-specialty', ['specialty' => $specialty]);
    }

    public function updateSpecialty(UpdateSpecialtyRequest $request, $id)
    {
        $this->specialtyRepository->updateSpecialty($request, $id);
        return redirect('/specialties')->with(['warning' => 'Especialidade editada com sucesso!']);
    }

    public function deleteSpecialty($id)
    {
        $this->specialtyRepository->deleteSpecialty($id);
        return redirect('/specialties')->with(['danger' => 'Especialidade excluída com sucesso!']);
    }

    public function createSpecialty()
    {
        return view('specialties.create-specialty');
    }

    public function storeSpecialty(RegisterSpecialtyRequest $request)
    {
        $this->specialtyRepository->createSpecialty($request);
        return redirect('/specialties')->with(['success' => 'Especialidade registrada com sucesso!']);
    }

    public function getDoctorsBySpecialtyId($id)
    {
        $users = $this->specialtyRepository->getDoctorsBySpecialtyId($id);
        $specialty = $this->specialtyRepository->getSpecialtyById($id);
        return view('specialties.specialty-users', ['users' => $users, 'specialty' => $specialty]);
    }
}

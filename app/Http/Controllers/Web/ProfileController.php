<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateUserRequest;
use App\Repositories\AppointmentRepository;
use App\Repositories\PatientRepository;
use App\Repositories\SpecialtyRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected $userRepository;
    protected $appointmentRepository;
    protected $patientRepository;

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

    public function getProfile()
    {
        $id = Auth::user()->id;
        $specialties = $this->specialtyRepository->getSpecialties();
        $user = $this->userRepository->getUserById($id);
        return view('user.profile', ['user' => $user, 'specialties' => $specialties]);
    }

    public function updateUser(UpdateUserRequest $request, $id)
    {
        $this->userRepository->updateUser($request, $id);
        return redirect('/user')->with(['success' => 'Perfil atualizado com sucesso!']);
    }
}

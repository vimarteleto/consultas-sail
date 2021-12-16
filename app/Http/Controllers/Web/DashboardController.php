<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Repositories\AppointmentRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    protected $userRepository;
    protected $appointmentRepository;

    public function __construct(UserRepository $userRepository, AppointmentRepository $appointmentRepository)
    {
        $this->userRepository = $userRepository;
        $this->appointmentRepository = $appointmentRepository;
    }

    public function getAppointments()
    {
        $id = Auth::user()->id;
        $appointments = $this->userRepository->getAppointmentsByUserId($id);
        return view('dashboard', ['appointments' => $appointments]);
    }

    public function getAppointmentById($id)
    {
        $appointment = $this->appointmentRepository->getAppointmentById($id);
        return view('appointment', ['appointment' => $appointment]);
    }

    public function deleteAppointment($id)
    {
        $this->appointmentRepository->deleteAppointment($id);
        return redirect('dashboard')->with(['danger' => 'Consulta excluída com sucesso!']);
    }
}

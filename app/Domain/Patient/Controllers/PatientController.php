<?php

declare(strict_types=1);

namespace App\Domain\Patient\Controllers;

use App\Domain\Patient\Repositories\PatientRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PatientController extends Controller
{
    protected $repository;

    protected array $validators = [
        'name' => 'required|string',
        'cpf' => 'required|string',
        'phone' => 'required|string',
    ];

    /**
     * @param PatientRepository $patientRepository
     */
    public function __construct(PatientRepository $patientRepository)
    {
        $this->repository = $patientRepository;
    }

    public function index(Request $request)
    {
        return parent::index($request);
    }

    public function store(Request $request)
    {
        return parent::store($request);
    }

    public function update(Request $request, int $id)
    {
        return parent::update($request, $id);
    }

    public function destroy(int $id)
    {
        return parent::destroy($id);
    }

    public function patient(int $id)
    {
        try {
            if (!empty($this->repository)) {
                return response()->json([$this->repository->findDoctorAndPatient($id)])
                    ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
            }
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage())
                ->setStatusCode(Response::HTTP_NOT_FOUND, Response::$statusTexts[Response::HTTP_NOT_FOUND]);
        }
    }

    public function bindPatientAndDoctor(Request $request, int $id)
    {
        try {
            if (!empty($this->repository)) {
                return response()->json([$this->repository->createDoctorAndPatient($request->all(), $id)])
                    ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
            }
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage())
                ->setStatusCode(Response::HTTP_NOT_FOUND, Response::$statusTexts[Response::HTTP_NOT_FOUND]);
        }
    }
}

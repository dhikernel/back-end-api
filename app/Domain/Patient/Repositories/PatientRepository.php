<?php

declare(strict_types=1);

namespace App\Domain\Patient\Repositories;

use App\Domain\Doctor\Models\Doctor;
use App\Domain\Patient\Models\Patient;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class PatientRepository
{
    protected $relationships;

    public function __construct()
    {
        $this->relationships = [
            'patients',
        ];
    }

    public function index()
    {
        return QueryBuilder::for(Patient::class)
            ->allowedFilters([
                AllowedFilter::partial('name'),
                AllowedFilter::exact('specialty'),
            ])
            ->get();
    }

    public function store(array $request): Patient
    {
        try {
            DB::beginTransaction();

            $createdPatient = Patient::create($request);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            throw new \Exception($exception->getMessage());
        }

        return $createdPatient;
    }

    public function update(array $data, int $id)
    {
        $updatePatient = Patient::find($id);

        return $updatePatient->fill($data)->save();
    }

    public function destroy(int $id): bool
    {
        return (bool) Patient::destroy($id);
    }

    public function findDoctorAndPatient(int $id)
    {
        $doctor = Doctor::with('patients')->find($id);

        $patients = $doctor->patients;

        return $patients;
    }
}

<?php

declare(strict_types=1);

namespace App\Domain\Doctor\Repositories;

use App\Domain\Doctor\Models\Doctor;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class DoctorRepository
{
    public function index()
    {
        return QueryBuilder::for(Doctor::class)
            ->allowedFilters([
                AllowedFilter::partial('name'),
                AllowedFilter::exact('specialty'),
            ])
            ->get();
    }

    public function store(array $request): Doctor
    {
        try {
            DB::beginTransaction();

            $createdDoctor = Doctor::create($request);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            throw new \Exception($exception->getMessage());
        }

        return $createdDoctor;
    }

    public function update(array $data, int $id)
    {
        $updateDoctor = Doctor::find($id);

        return $updateDoctor->fill($data)->save();
    }

    public function destroy(int $id): bool
    {
        return (bool) Doctor::destroy($id);
    }
}

<?php

declare(strict_types=1);

namespace App\Domain\Address\Repositories;

use App\Domain\Address\Models\City;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CityRepository
{
    public function index()
    {
        return QueryBuilder::for(City::class)
            ->allowedFilters([
                AllowedFilter::partial('name'),
                AllowedFilter::exact('state'),
            ])
            ->get();
    }

    public function store(array $request): City
    {
        try {
            DB::beginTransaction();

            $createdCity = City::create($request);

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollback();
            throw new \Exception($exception->getMessage());
        }

        return $createdCity;
    }

    public function update(array $data, int $id)
    {
        $updateCity = City::find($id);

        return $updateCity->fill($data)->save();
    }

    public function destroy(int $id): bool
    {
        return (bool) City::destroy($id);
    }
}

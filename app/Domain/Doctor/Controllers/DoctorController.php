<?php

declare(strict_types=1);

namespace App\Domain\Doctor\Controllers;

use App\Domain\Doctor\Repositories\DoctorRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    protected $repository;

    protected array $validators = [
        'name' => 'required|string',
        'specialty' => 'required|string',
        'city_id' => 'required|integer',
    ];

    /**
     * @param DoctorRepository $doctorRepository
     */
    public function __construct(DoctorRepository $doctorRepository)
    {
        $this->repository = $doctorRepository;
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
}

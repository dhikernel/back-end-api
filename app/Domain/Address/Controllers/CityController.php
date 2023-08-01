<?php

declare(strict_types=1);

namespace App\Domain\Address\Controllers;

use App\Domain\Address\Repositories\CityRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
    protected $repository;

    protected array $validators = [
        'name' => 'required|string',
        'state' => 'required|string',
    ];

    /**
     * @param CityRepository $cityRepository
     */
    public function __construct(CityRepository $cityRepository)
    {
        $this->repository = $cityRepository;
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

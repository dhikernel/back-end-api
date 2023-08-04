<?php

declare(strict_types=1);

namespace App\Domain\Address\Controllers;

use App\Domain\Address\Repositories\CityRepository;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

    public function getCityDoctor(int $id)
    {
        try {
            if (!empty($this->repository)) {
                return response()->json([$this->repository->findCityAndDoctor($id)])
                    ->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);
            }
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage())
                ->setStatusCode(Response::HTTP_NOT_FOUND, Response::$statusTexts[Response::HTTP_NOT_FOUND]);
        }
    }
}

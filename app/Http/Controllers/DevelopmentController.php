<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\DevelopmentStoreRequest;
use App\Http\Resources\DevelopmentResource;
use App\Http\Resources\EventResource;
use App\Http\Resources\PaginateResource;
use App\Interfaces\DevelopmentRepositoryInterface;
use Illuminate\Http\Request;

class DevelopmentController extends Controller
{
    private DevelopmentRepositoryInterface $developmentRepository;
    
    public function __construct(DevelopmentRepositoryInterface $developmentRepository)
    {
        $this->developmentRepository = $developmentRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $events = $this->developmentRepository->getAll(
                $request->search,
                $request->limit,
                true
            );

            return ResponseHelper::jsonResponse(true, 'Data Event Berhasil Diambil', EventResource::collection($events), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    public function getAllPaginated(Request $request)
    {
        $request = $request->validate([
            'search' => 'nullable|string',
            'row_per_page' => 'required|integer'
        ]);

        try {
            $events = $this->developmentRepository->getAllPaginated(
                $request['search'] ?? null,
                $request['row_per_page'],
            );

            return ResponseHelper::jsonResponse(true, 'Data Event Berhasil Diambil', PaginateResource::make($events, EventResource::class), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DevelopmentStoreRequest $request)
    {
        $request = $request->validated();

        try {
            $development = $this->developmentRepository->create($request);

            return ResponseHelper::jsonResponse(true, 'Data Pembangunan Berhasil Diambil', new DevelopmentResource($development), 201);

        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $development = $this->developmentRepository->getById($id);

            if(!$development) {
                return ResponseHelper::jsonResponse(true, 'Data Pembangunan Tidak Ditemukan', null, 404);
            }

            return ResponseHelper::jsonResponse(true, 'Data Pembangunan Berhasil Diambil', new DevelopmentResource($development), 200);

        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

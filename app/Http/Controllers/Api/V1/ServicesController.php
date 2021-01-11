<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Requests\Backend\Services\DeleteServiceRequest;
use App\Http\Requests\Backend\Services\ManageServiceRequest;
use App\Http\Requests\Backend\Services\StoreServiceRequest;
use App\Http\Requests\Backend\Services\UpdateServiceRequest;
use App\Http\Resources\ServicesResource;
use App\Models\Service;
use App\Repositories\Backend\ServicesRepository;
use Illuminate\Http\Response;

/**
 * @group Services Management
 *
 * Class ServicesController
 *
 * APIs for Services Management
 *
 * @authenticated
 */
class ServicesController extends APIController
{
    /**
     * Repository.
     *
     * @var ServicesRepository
     */
    protected $repository;

    /**
     * __construct.
     *
     * @param $repository
     */
    public function __construct(ServicesRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Get all Services.
     *
     * This endpoint provides a paginated list of all Services. You can customize how many records you want in each
     * returned response as well as sort records based on a key in specific order.
     *
     * @queryParam Service Which Service to show. Example: 12
     * @queryParam per_Service Number of records per Service. (use -1 to retrieve all) Example: 20
     * @queryParam order_by Order by database column. Example: created_at
     * @queryParam order Order direction ascending (asc) or descending (desc). Example: asc
     *
     * @responseFile status=401 scenario="api_key not provided" responses/unauthenticated.json
     * @responseFile responses/Service/Service-list.json
     *
     * @param \Illuminate\Http\ManageServiceRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ManageServiceRequest $request)
    {
        $collection = $this->repository->retrieveList($request->all());

        return ServicesResource::collection($collection);
    }

    /**
     * Gives a specific Service.
     *
     * This endpoint provides you a single Service
     * The Service is identified based on the ID provided as url parameter.
     *
     * @urlParam id required The ID of the Service
     *
     * @responseFile status=401 scenario="api_key not provided" responses/unauthenticated.json
     * @responseFile responses/Service/Service-show.json
     *
     * @param ManageServiceRequest $request
     * @param \App\Models\Service $Service
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ManageServiceRequest $request, Service $Service)
    {
        return new ServicesResource($Service);
    }

    /**
     * Create a new Service.
     *
     * This endpoint lets you create new Service
     *
     * @responseFile status=401 scenario="api_key not provided" responses/unauthenticated.json
     * @responseFile status=201 responses/Service/Service-store.json
     *
     * @param \App\Http\Requests\Backend\Services\StoreServiceRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreServiceRequest $request)
    {
        $Service = $this->repository->create($request->validated());

        return (new ServicesResource($Service))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Update Service.
     *
     * This endpoint allows you to update existing Service with new data.
     * The Service to be updated is identified based on the ID provided as url parameter.
     *
     * @urlParam id required The ID of the Service
     *
     * @responseFile status=401 scenario="api_key not provided" responses/unauthenticated.json
     * @responseFile responses/Service/Service-update.json
     *
     * @param \App\Models\Service $Service
     * @param \App\Http\Requests\Backend\Services\UpdateServiceRequest $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateServiceRequest $request, Service $Service)
    {
        $Service = $this->repository->update($Service, $request->validated());

        return new ServicesResource($Service);
    }

    /**
     * Delete Service.
     *
     * This endpoint allows you to delete a Service
     * The Service to be deleted is identified based on the ID provided as url parameter.
     *
     * @urlParam id required The ID of the Service
     *
     * @responseFile status=401 scenario="api_key not provided" responses/unauthenticated.json
     * @responseFile status=204 scenario="When the record is deleted" responses/Service/Service-destroy.json
     *
     * @param \App\Models\Service $Service
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DeleteServiceRequest $request, Service $Service)
    {
        $this->repository->delete($Service);

        return response()->noContent();
    }
}

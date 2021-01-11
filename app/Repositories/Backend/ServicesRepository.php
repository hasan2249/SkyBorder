<?php

namespace App\Repositories\Backend;

use App\Events\Backend\Services\ServiceCreated;
use App\Events\Backend\Services\ServiceDeleted;
use App\Events\Backend\Services\ServiceUpdated;
use App\Exceptions\GeneralException;
use App\Service;
use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

class ServicesRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Service::class;

    /**
     * Sortable.
     *
     * @var array
     */
    private $sortable = [
        'id',
        'title_ar',
        'title_en',
        'content_ar',
        'content_en',
        'price',
        'img',
        'created_at',
        'updated_at',
    ];

    /**
     * Retrieve List.
     *
     * @var array
     * @return Collection
     */
    public function retrieveList(array $options = [])
    {
        $perPage = isset($options['per_page']) ? (int) $options['per_page'] : 20;
        $orderBy = isset($options['order_by']) && in_array($options['order_by'], $this->sortable) ? $options['order_by'] : 'created_at';
        $order = isset($options['order']) && in_array($options['order'], ['asc', 'desc']) ? $options['order'] : 'desc';
        $query = $this->query()
            ->with([
                'owner',
                'updater',
            ])
            ->orderBy($orderBy, $order);

        if ($perPage == -1) {
            return $query->get();
        }

        return $query->paginate($perPage);
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
            'id',
            'title_ar',
            'title_en',
            'content_ar',
            'content_en',
            'price',
            'img',
            'created_at',
            'updated_at',
                ]);
    }

    /**
     * @param array $input
     *
     * @throws \App\Exceptions\GeneralException
     *
     * @return bool
     */
    public function create(array $input , $path = "")
    {

        $input['status'] = $input['status'] ?? 0;
        $input['img'] = $path;

        if ($service = Service::create($input)) {
            event(new ServiceCreated($service));

            return $service->fresh();
        }

        throw new GeneralException(__('exceptions.backend.pages.create_error'));
    }

    /**
     * Update Page.
     *
     * @param \App\Models\Page $page
     * @param array $input
     */
    public function update(Service $service, array $input, $path = "")
    {
        if ($this->query()->where('title_ar', $input['title_ar'])->where('id', '!=', $service->id)->first()) {
            throw new GeneralException(__('exceptions.backend.pages.already_exists'));
        }

        $input['status'] = $input['status'] ?? 0;
        $input['img'] = $path;
        if ($service->update($input)) {
            event(new ServiceUpdated($service));

            return $service;
        }

        throw new GeneralException(
            __('exceptions.backend.pages.update_error')
        );
    }

    /**
     * @param \App\Models\Page $page
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete(Service $service)
    {
        if ($service->delete()) {
            event(new ServiceDeleted($service));

            return true;
        }

        throw new GeneralException(__('exceptions.backend.pages.delete_error'));
    }
}

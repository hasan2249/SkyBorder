<?php

namespace App\Repositories\Backend;

use App\Events\Backend\Our_works\OurWorkCreated;
use App\Events\Backend\Our_works\OurWorkDeleted;
use App\Events\Backend\Our_works\OurWorkUpdated;
use App\Exceptions\GeneralException;
use App\Our_work;
use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

class Our_worksRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Our_work::class;

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

        if ($our_work = Our_work::create($input)) {
            event(new OurWorkCreated($our_work));

            return $our_work->fresh();
        }

        throw new GeneralException(__('exceptions.backend.pages.create_error'));
    }

    /**
     * Update Page.
     *
     * @param \App\Models\Page $page
     * @param array $input
     */
    public function update(Our_work $our_work, array $input, $path = "")
    {
        if ($this->query()->where('title_ar', $input['title_ar'])->where('id', '!=', $our_work->id)->first()) {
            throw new GeneralException(__('exceptions.backend.pages.already_exists'));
        }

        $input['status'] = $input['status'] ?? 0;
        $input['img'] = $path;
        if ($our_work->update($input)) {
            event(new OurWorkUpdated($our_work));

            return $our_work;
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
    public function delete(Our_work $our_work)
    {
        if ($our_work->delete()) {
            event(new OurWorkDeleted($our_work));

            return true;
        }

        throw new GeneralException(__('exceptions.backend.pages.delete_error'));
    }
}

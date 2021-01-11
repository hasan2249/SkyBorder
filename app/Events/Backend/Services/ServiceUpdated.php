<?php

namespace App\Events\Backend\Services;

use Illuminate\Queue\SerializesModels;

/**
 * Class PageUpdated.
 */
class ServiceUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $page;

    /**
     * @param $page
     */
    public function __construct($page)
    {
        $this->page = $page;
    }
}

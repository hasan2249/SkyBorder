<?php

namespace App\Events\Backend\Services;

use Illuminate\Queue\SerializesModels;

/**
 * Class PageCreated.
 */
class ServiceCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $service;

    /**
     * @param $service
     */
    public function __construct($service)
    {
        $this->service = $service;
    }
}

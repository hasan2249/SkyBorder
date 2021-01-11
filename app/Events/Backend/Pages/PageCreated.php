<?php

namespace App\Events\Backend\Services;

use Illuminate\Queue\SerializesModels;

/**
 * Class serviceCreated.
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

<?php

namespace App\Events\Backend\Services;

use Illuminate\Queue\SerializesModels;

/**
 * Class ServiceDeleted.
 */
class ServiceDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $Service;

    /**
     * @param $Service
     */
    public function __construct($Service)
    {
        $this->Service = $Service;
    }
}

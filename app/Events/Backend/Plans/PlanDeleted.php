<?php

namespace App\Events\Backend\Plans;

use Illuminate\Queue\SerializesModels;

/**
 * Class PlanDeleted.
 */
class PlanDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $plan;

    /**
     * @param $Service
     */
    public function __construct($plan)
    {
        $this->plan = $plan;
    }
}

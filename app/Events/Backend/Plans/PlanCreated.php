<?php

namespace App\Events\Backend\Plans;

use Illuminate\Queue\SerializesModels;

/**
 * Class PageCreated.
 */
class PlanCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $plan;

    /**
     * @param $service
     */
    public function __construct($plan)
    {
        $this->plan = $plan;
    }
}

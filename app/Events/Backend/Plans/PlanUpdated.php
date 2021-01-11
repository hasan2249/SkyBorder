<?php

namespace App\Events\Backend\Plans;

use Illuminate\Queue\SerializesModels;

/**
 * Class PlanUpdated.
 */
class PlanUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $plan;

    /**
     * @param $page
     */
    public function __construct($plan)
    {
        $this->plan = $plan;
    }
}

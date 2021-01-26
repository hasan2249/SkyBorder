<?php

namespace App\Events\Backend\Our_works;

use Illuminate\Queue\SerializesModels;

/**
 * Class our_workDeleted.
 */
class OurWorkDeleted
{
    use SerializesModels;

    /**
     * @var
     */
    public $our_work;

    /**
     * @param $Service
     */
    public function __construct($our_work)
    {
        $this->our_work = $our_work;
    }
}

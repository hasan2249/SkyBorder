<?php

namespace App\Events\Backend\Our_works;

use Illuminate\Queue\SerializesModels;

/**
 * Class our_workUpdated.
 */
class OurWorkUpdated
{
    use SerializesModels;

    /**
     * @var
     */
    public $our_work;

    /**
     * @param $page
     */
    public function __construct($our_work)
    {
        $this->our_work = $our_work;
    }
}

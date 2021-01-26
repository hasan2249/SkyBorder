<?php

namespace App\Events\Backend\Our_works;

use Illuminate\Queue\SerializesModels;

/**
 * Class OurWorkCreated.
 */
class OurWorkCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $our_work;

    /**
     * @param $our_work
     */
    public function __construct($our_work)
    {
        $this->our_work = $our_work;
    }
}

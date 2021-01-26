<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service;
use App\Our_work;
use App\Plan;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $sers = new Service();
        $our_works = new Our_work();
        $plans = new Plan();

        $index_parameters = ["services" => $sers->getAllServices(),"our_works" => $our_works->getAllOurWorks(), 
                             "plans" => $plans->getAllPlans()];

        return view('frontend.index', $index_parameters);
    }
}

<?php

namespace App\Http\Controllers;
use App\Providers\TimeService;
use Illuminate\Http\Request;

class TimeRpcController extends Controller {
    private TimeService $timeService;

    public function __construct(TimeService $timeService) {
        $this->timeService = $timeService;
    }

    public function showTime() {
        $time = $this->timeService->getCurrentTime();
        return response("current time is " . $time);
    }
}
<?php

namespace App\Http\Controllers;
use App\Providers\TimeService;
use Illuminate\Http\Request;

class TimeApiController extends Controller {
    private TimeService $timeService;

    public function __construct(TimeService $timeService) {
        $this->timeService = $timeService;
    }
    public function getTime() {
        $time = $this->timeService->getCurrentTime();

        return response()->json([
            'current_time' => $time
        ]);
    }

    public function index() {}
    public function store(Request $request) {}
    public function show(string $id) {}
    public function update(Request $request, string $id) {}
    public function destroy(string $id) {}
}

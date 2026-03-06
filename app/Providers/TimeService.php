<?php

namespace App\Providers;

class TimeService {
    public function getCurrentTime(): string {
        return now()->format('Y-m-d H:i:s');
    }
}

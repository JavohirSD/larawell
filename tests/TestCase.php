<?php

namespace Tests;

use App\Models\Enums\UserStatus;
use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function getTestUser()
    {
        return User::where('status', UserStatus::ACTIVE)
            ->inRandomOrder()
            ->first();
    }
}

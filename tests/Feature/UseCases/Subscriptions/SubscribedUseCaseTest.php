<?php

namespace Tests\Feature\UserCases\Subscriptions;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Workshop;
use App\UseCases\Subscriptions\SubscribedUseCase;

class SubscribedUseCaseTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_subscribe_to_a_workshop()
    {
        $user = User::factory()->create();
        $workshop = Workshop::factory()->create();

        $subscribeService = new SubscribedUseCase($user);
        $subscribeService->execute($user->id, $workshop->id);
        
        $this->assertEquals($user->subscriptions->count(), 1);

    }

    public function test_subscribed_user_cannot_subscribe_again() {
        $user = User::factory()->create();
        $workshop = Workshop::factory()->create();

        $subscribeService = new SubscribedUseCase($user);
        $subscribeService->execute($user->id, $workshop->id);
        $subscribeService->execute($user->id, $workshop->id);
        
        $this->assertEquals($user->subscriptions->count(), 1);
    }
}

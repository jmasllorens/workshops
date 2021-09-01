<?php

namespace Tests\Feature\UserCases\Subscriptions;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Workshop;
use App\UseCases\Unsubscriptions\UnsubscribedUseCase;

class UnsubscribedUseCaseTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_unsubscribe_from_a_workshop()
    {
        $user = User::factory()->create();
        $workshop = Workshop::factory()->create();

        $unsubscribeService = new UnsubscribedUseCase($user);
        $unsubscribeService->execute($user->id, $workshop->id);

        $this->assertEquals($user->subscriptions->count(), 0);
    }

    public function test_unsubscribed_user_cannot_unsubscribe()
    {
        $user = User::factory()->create();
        $workshop = Workshop::factory()->create();

        $unsubscribeService = new UnsubscribedUseCase($user);
        $unsubscribeService->execute($user->id, $workshop->id);
        $unsubscribeService->execute($user->id, $workshop->id);

        $this->assertEquals($user->subscriptions->count(), 0);
    }
}

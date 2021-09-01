<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\UseCases\Subscriptions\SubscribedUseCase;
use App\UseCases\Unsubscriptions\UnsubscribedUseCase;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function subscribe($request) {
        $subscribeService = new SubscribedUseCase($request);
        $subscribeService->execute(Auth::id(), $request->workshopId);
    }

    public function unsuscribe($request) {
        $unsubscribeService = new UnsubscribedUseCase($request);
        $unsubscribeService->execute(Auth::id(), $request->workshopId);
    }
}

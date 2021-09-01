<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\UseCases\Subscriptions\SubscribedUseCase;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function subscribe($request) {
        $subscribeService = new SubscribedUseCase($request);
        $subscribeService->execute(Auth::id(), $request->workshopId);
    }
}

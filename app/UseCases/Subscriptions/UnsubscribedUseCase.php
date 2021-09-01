<?php

namespace App\UseCases\Subscriptions;

class UnsubscribedUseCase {

    private $userRepository;
    
    public function __construct($userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    public function execute($userId, $workshopId) {

        $user = $this->userRepository->find($userId);
        $workshop = $this->userRepository->find($workshopId);

        if($user->isSubscribed($workshopId)) {
            $user->subscriptions()->deattach($workshop);
        } 
    }
}
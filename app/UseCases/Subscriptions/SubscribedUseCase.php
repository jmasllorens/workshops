<?php

namespace App\UseCases\Subscriptions;

class SubscribedUseCase {

    private $userRepository;
    
    public function __construct($userRepository)
    {
        $this->userRepository = $userRepository;
    }
    
    public function execute($userId, $workshopId) {

        $user = $this->userRepository->find($userId);
        $workshop = $this->userRepository->find($workshopId);

        if(!$user->isSubscribed($workshopId)) {
            $user->subscriptions()->attach($workshop);
        } 
    }

    /* public function execute($userId, $workshopId) {
        $user = User::find($userId);
        $workshop = Workshop::find($workshopId);

        if(!$user->isSubscribed($workshopId)) {
            $user->subscriptions()->attach($workshop);
        } 
    } */
}
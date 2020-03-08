<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;

use App\Plan;
use App\Subscription;

use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    protected function updateSubscription(Request $request)
    {
        $user = auth('api')->user();

        $plan = Plan::find($request->plan_id);
        $payment_id = $request->payment_id;

        Subscription::create([
            'payment_id' => $payment_id,
            'plan_id' => $plan->id,
            'user_id' => $user->id,
            'expires_at' => $plan->expires_at
        ]);

        return response(['user' => $this->userRepository->getUserById($user->id)], 200);
    }
}

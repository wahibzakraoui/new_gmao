<?php

namespace App\Listeners;

use App\Events\workOrderCreated;
use App\Models\User;
use App\Models\WorkOrder;
use App\Notifications\WorkOrders\workOrderCreatedNotification;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class workOrderCreatedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(WorkOrder $workOrder)
    {
        $when = Carbon::now()->addSeconds(10);
        $user = \App\Models\User::find(1);
        $user->notify(
            (new workOrderCreatedNotification($workOrder)
            )->delay($when));
    }
}

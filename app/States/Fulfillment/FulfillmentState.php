<?php


namespace App\States\Fulfillment;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class FulfillmentState extends State
{
    public static $name = "pending";

    public static function config(): StateConfig
    {
        return parent::config()
            ->default(Pending::class)
            ->allowTransition(Pending::class, PartiallyReceived::class)
            ->allowTransition(Pending::class, Received::class)
            ;
    }
}

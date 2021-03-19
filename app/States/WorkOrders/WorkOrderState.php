<?php


namespace App\States\WorkOrders;

use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class WorkOrderState extends State
{
    public static function config(): StateConfig
    {
        return parent::config()
            ->default(IDT::class)
            ->allowTransition(IDT::class, PLN20::class)
            ->allowTransition(IDT::class, CAN90::class)
            ->allowTransition(PLN20::class, CAN90::class)
            ->allowTransition(PLN20::class, WMA60::class)
            ->allowTransition(PLN20::class, RDY64::class)
            ->allowTransition(WMA60::class, RDY64::class)
            ->allowTransition(WMA60::class, WMA62::class)
            ->allowTransition(WMA62::class, RDY64::class)
            ->allowTransition(RDY64::class, COM80::class)
            ;

    }
}

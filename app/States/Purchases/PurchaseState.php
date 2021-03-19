<?php


namespace App\States\Purchases;



use Spatie\ModelStates\State;
use Spatie\ModelStates\StateConfig;

abstract class PurchaseState extends State
{
    public static function config(): StateConfig
    {
        return parent::config()
            ->default(Pending::class)
            ->allowTransition(Pending::class, Confirmed::class)
            ->allowTransition(Pending::class, Failed::class)
            ->allowTransition(Confirmed::class, Consulting::class)
            ->allowTransition(Consulting::class, Ordered::class)
            ->allowTransition(Ordered::class, Fulfilled::class)
            ;
    }
}

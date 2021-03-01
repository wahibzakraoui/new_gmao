<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class PermissionDeniedException extends Exception
{
    public function render($request){
        $request->session()->flash('message-header', 'Permission refusee'); 
        $request->session()->flash('message-body', 'Vous ne disposez pas des droits necessaires afin de visiter cette ressource'); 
        $request->session()->flash('message-footer', 'Demandez acces a votre administrateur'); 
        $request->session()->flash('alert-class', 'alert-danger'); 
        return redirect('dashboard');
    }
}

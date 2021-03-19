
    @if($workOrder->status !== "finished" && $workOrder->assigned_user_id )
<div class="dropdown dropdown-inline">
    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
        <i class="la la-cog"></i>
    </a>

    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
        <ul class="nav nav-hoverable flex-column">
            @if(Auth()->user()->hasPermissionTo('create purchases'))
                <li class="nav-item"><a class="nav-link" href="{{route('add-purchase', $workOrder->id)}}"><i class="nav-icon la la-cart-plus"></i><span class="nav-text">Create Purchase</span></a></li>
            @endif
            @if(Auth()->user()->hasPermissionTo('create work_orders'))
                <li class="nav-item"><a class="nav-link" href="{{route('add-work_order', $workOrder->id)}}"><i class="nav-icon la la-asterisk"></i><span class="nav-text">Create BTC</span></a></li>
            @endif
            @if(Auth()->user()->hasPermissionTo('execute work_orders'))
                <li class="nav-item"><a class="nav-link" href="{{route('execute-work_order', $workOrder->id)}}"><i class="nav-icon la la-arrow-circle-up"></i><span class="nav-text">Finish</span></a></li>
            @endif
        </ul>
    </div>
</div>
@endif

@if($workOrder->status !== 'finished')
@can('assign work_orders')
<a href="{{route('edit-work_order', $workOrder->id)}}" class="btn btn-sm btn-clean btn-icon" title="Edit details">
    <i class="la la-edit"></i>
</a>
@endcan


@can('delete work_orders')
    {{ Form::open(array('route' => ['delete-work_order', $workOrder->id], 'id' => 'delete_form')) }}
        <button id="delete_dialog"  type="submit" class="btn btn-sm btn-clean btn-icon" title="Delete">
            <i class="la la-trash"></i>
        </button>
    {{ Form::close() }}
@endcan
@endif

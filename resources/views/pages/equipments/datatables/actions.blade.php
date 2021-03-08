<td nowrap="nowrap">
<div class="dropdown dropdown-inline">
    <a href="javascript:;" class="btn btn-sm btn-clean btn-icon" data-toggle="dropdown">
        <i class="la la-cog"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
        <ul class="nav nav-hoverable flex-column">
            <li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-leaf"></i><span class="nav-text">Update Status</span></a></li>
            <li class="nav-item"><a class="nav-link" href="#"><i class="nav-icon la la-print"></i><span class="nav-text">Print</span></a></li>
        </ul>
    </div>
</div>
@can('edit equipments')
<a href="{{route('edit-equipment', $equipment->id)}}" class="btn btn-sm btn-clean btn-icon" title="Edit details">
    <i class="la la-edit"></i>
</a>
@endcan
@can('delete equipments')
    {{ Form::open(array('route' => ['delete-equipment', $equipment->id], 'id' => 'delete_form')) }}
        <button id="delete_dialog"  type="submit" class="btn btn-sm btn-clean btn-icon" title="Delete">
            <i class="la la-trash"></i>
        </button>
    {{ Form::close() }}
@endcan
</td>

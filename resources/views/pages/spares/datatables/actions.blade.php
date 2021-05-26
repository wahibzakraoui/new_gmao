
<div class="btn-toolbar" role="toolbar" aria-label="...">
    <div class="btn-group mr-2" role="group" aria-label="...">
        @can('edit spares')
        <a href="{{route('edit-spare', $spare->id)}}" class="btn btn-outline-secondary btn-icon" data-toggle="tooltip" data-theme="dark" title="Edit spare"><i class="la la-edit"></i></a>
        @endcan
        @can('delete spares')
            {{ Form::open(array('route' => ['delete-spare', $spare->id], 'id' => 'delete_form')) }}
                <button type="submit" id="delete_dialog" class="btn btn-outline-secondary btn-icon" data-toggle="tooltip" data-theme="dark" title="Delete Spare"><i class="la la-trash"></i></button>
            {{ Form::close() }}
        @endcan
    </div>
</div>

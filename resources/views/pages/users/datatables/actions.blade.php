
<div class="btn-toolbar" role="toolbar" aria-label="...">
    <div class="btn-group mr-2" role="group" aria-label="...">
        @can('edit users')
        <a href="{{route('edit-user', $user->id)}}" class="btn btn-outline-secondary btn-icon" data-toggle="tooltip" data-theme="dark" title="Dark theme"><i class="la la-edit"></i></a>
        @endcan
        @can('delete users')
            {{ Form::open(array('route' => ['delete-user', $user->id], 'id' => 'delete_form')) }}
                <button type="submit" id="delete_dialog" class="btn btn-outline-secondary btn-icon" data-toggle="tooltip" data-theme="dark" title="Dark theme"><i class="la la-trash"></i></button>
            {{ Form::close() }}
        @endcan
    </div>
</div>


<div class="btn-toolbar" role="toolbar" aria-label="...">
    <div class="btn-group mr-2" role="group" aria-label="...">
        @can('view gamuts')
            <a href="{{route('show-gamut', $gamut->id)}}" class="btn btn-outline-secondary btn-icon" data-toggle="tooltip" data-theme="dark" title="Delete"><i class="la la-eye"></i></a>
        @endcan
        @can('edit gamuts')
        <a href="{{route('edit-gamut', $gamut->id)}}" class="btn btn-outline-secondary btn-icon" data-toggle="tooltip" data-theme="dark" title="Delete"><i class="la la-edit"></i></a>
        @endcan
        @can('delete gamuts')
            {{ Form::open(array('route' => ['delete-gamut', $gamut->id], 'id' => 'delete_form')) }}
                <button type="submit" id="delete_dialog" class="btn btn-outline-secondary btn-icon" data-toggle="tooltip" data-theme="dark" title="Delete"><i class="la la-trash"></i></button>
            {{ Form::close() }}
        @endcan
    </div>
</div>

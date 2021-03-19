
@if($purchase->state === "pending")
<div class="btn-toolbar" role="toolbar" aria-label="...">
    <div class="btn-group mr-2" role="group" aria-label="...">
        @can('review purchases')
            <a href="{{route('approve-purchase', $purchase->id)}}" class="btn btn-outline-secondary btn-icon" data-toggle="tooltip" data-theme="dark" title="Approce"><i class="la la-check"></i></a>
        @endcan
        @can('delete purchases')
            {{ Form::open(array('route' => ['delete-purchase', $purchase->id], 'class' => 'd-inline', 'id' => 'delete_form')) }}
            <button type="submit" id="delete_dialog" class="btn btn-outline-secondary btn-icon" data-toggle="tooltip" data-theme="dark" title="Delete"><i class="la la-trash"></i></button>
            {{ Form::close() }}
        @endcan
    </div>
</div>
@elseif($purchase->state === "confirmed")
    <div class="btn-group mr-2" role="group" aria-label="...">
        @can('edit purchases')
            <a href="{{route('edit-purchase', $purchase->id)}}" class="btn btn-outline-secondary btn-icon" data-toggle="tooltip" data-theme="dark" title="Edit"><i class="la la-edit"></i></a>
        @endcan
        @can('view purchases')
            <a href="{{route('view-purchase', $purchase->id)}}" class="btn btn-outline-secondary btn-icon" data-toggle="tooltip" data-theme="dark" title="Edit"><i class="la la-file-pdf text-warning"></i></a>
        @endcan
        @can('consult purchases')
            <a href="{{route('add-quotation', $purchase->id)}}" class="btn btn-outline-secondary btn-icon" data-toggle="tooltip" data-theme="dark" title="Add quotation"><i class="la la-plus text-info"></i></a>
        @endcan
        @can('delete purchases')
            {{ Form::open(array('route' => ['delete-purchase', $purchase->id], 'class' => 'd-inline', 'id' => 'delete_form')) }}
            <button type="submit" id="delete_dialog" class="btn btn-outline-secondary btn-icon" data-toggle="tooltip" data-theme="dark" title="Delete"><i class="la la-trash text-danger"></i></button>
            {{ Form::close() }}
        @endcan
    </div>
@elseif($purchase->state === "consulting")
        @can('edit purchases')
            <a href="{{route('edit-purchase', $purchase->id)}}" class="btn btn-outline-secondary btn-icon" data-toggle="tooltip" data-theme="dark" title="Edit"><i class="la la-eye"></i></a>
        @endcan
        @can('view purchases')
            <a href="{{route('view-purchase', $purchase->id)}}" class="btn btn-outline-secondary btn-icon" data-toggle="tooltip" data-theme="dark" title="Edit"><i class="la la-file-pdf text-warning"></i></a>
        @endcan
        @can('consult purchases')
            <a href="{{route('add-quotation', $purchase->id)}}" class="btn btn-outline-secondary btn-icon" data-toggle="tooltip" data-theme="dark" title="Add quotation"><i class="la la-plus text-info"></i></a>
        @endcan
        @can('delete purchases')
            {{ Form::open(array('route' => ['delete-purchase', $purchase->id], 'class' => 'd-inline', 'id' => 'delete_form')) }}
            <button type="submit" id="delete_dialog" class="btn btn-outline-secondary btn-icon" data-toggle="tooltip" data-theme="dark" title="Delete"><i class="la la-trash text-danger"></i></button>
            {{ Form::close() }}
        @endcan

@elseif($purchase->state === "ordered")
    @can('view purchases')
        <a href="{{route('view-purchase', $purchase->id)}}" class="btn btn-outline-secondary btn-icon" data-toggle="tooltip" data-theme="dark" title="Edit"><i class="la la-file-pdf text-warning"></i></a>
    @endcan
    @can('receive purchases')
        <a href="{{route('receive-purchase', $purchase->id)}}" class="btn btn-outline-secondary btn-icon" data-toggle="tooltip" data-theme="dark" title="Edit"><i class="la la-arrow-circle-o-down text-success text-bold"></i></a>
    @endcan
    @can('delete purchases')
        {{ Form::open(array('route' => ['delete-purchase', $purchase->id], 'class' => 'd-inline', 'id' => 'delete_form')) }}
        <button type="submit" id="delete_dialog" class="btn btn-outline-secondary btn-icon" data-toggle="tooltip" data-theme="dark" title="Delete"><i class="la la-trash text-danger"></i></button>
        {{ Form::close() }}
    @endcan
@endif

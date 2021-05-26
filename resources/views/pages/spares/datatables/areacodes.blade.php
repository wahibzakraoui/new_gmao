@foreach($area->codes as $c)
<span class="btn btn-icon btn-light-success pulse pulse-success mr-5">
    <span class="position-relative">{{ $c->code }}</span>
    <span class="pulse-ring"></span>
</span>
@endforeach
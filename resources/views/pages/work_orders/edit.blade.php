@extends('layouts.metro')

@section('title', 'Edit Work Order')

@section('content')

    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Work Order</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('work_orders')}}" class="text-muted">Work Order</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">@lang('lang.edit')</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Actions-->
                <a href="#" class="btn btn-light-primary font-weight-bolder btn-sm">@lang('lang.actions')</a>
                <!--end::Actions-->
                <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                    <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="svg-icon svg-icon-success svg-icon-2x">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24"/>
                                <path
                                    d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                                    fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                <path
                                    d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z"
                                    fill="#000000"/>
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-md dropdown-menu-right p-0 m-0">
                        <!--begin::Navigation-->
                        <ul class="navi navi-hover">
                            <li class="navi-header font-weight-bold py-4">
                                <span class="font-size-lg">Choose Label:</span>
                                <i class="flaticon2-information icon-md text-muted" data-toggle="tooltip"
                                   data-placement="right" title="Click to learn more..."></i>
                            </li>
                            <li class="navi-separator mb-3 opacity-70"></li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                <span class="navi-text">
                                    <span class="label label-xl label-inline label-light-success">Customer</span>
                                </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                <span class="navi-text">
                                    <span class="label label-xl label-inline label-light-danger">Partner</span>
                                </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                <span class="navi-text">
                                    <span class="label label-xl label-inline label-light-warning">Suplier</span>
                                </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                <span class="navi-text">
                                    <span class="label label-xl label-inline label-light-primary">Member</span>
                                </span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                <span class="navi-text">
                                    <span class="label label-xl label-inline label-light-dark">Staff</span>
                                </span>
                                </a>
                            </li>
                            <li class="navi-separator mt-3 opacity-70"></li>
                            <li class="navi-footer py-4">
                                <a class="btn btn-clean font-weight-bold btn-sm" href="#">
                                    <i class="ki ki-plus icon-sm"></i>Add new</a>
                            </li>
                        </ul>
                        <!--end::Navigation-->
                    </div>
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Content-->
    <div class="container">
        <div class="col-xs-12 col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap py-3">
                <div class="card-title">
                    <h3 class="card-label">@lang('lang.edit') Work Order:
                        <span class="d-block text-muted pt-2 font-size-sm">@lang('lang.required_fields_notice')</span>
                    </h3>
                </div>
            </div>
            <div class="card-body">
                {{ Form::model($work_order, array('route' => array('update-work_order', $work_order->id), 'method' => 'POST', 'id' =>
                'edit_equipment_form', 'files' => 'true')) }}
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <label>Designation <span class="text-danger">*</span></label>
                            {{ Form::text('designation', null, ['class' => 'form-control']) }}
                            <span class="form-text text-muted">Designation of this WO</span>
                        </div>
                    </div>
                    <div class="form-group row fv-plugins-icon-container">
                        <div class="col-lg-6">
                            <label>Equipment <span class="text-danger">*</span></label>
                            {{ Form::select('equipment_id', $equipmentList , $work_order->equipment_id, ['class' => 'form-control selectpicker', 'id' => 'equipment_id' , 'data-live-search' => 'true', 'data-size' => 7,]) }}
                            <span class="form-text text-muted">Equipment</span>
                        </div>
                        <div class="col-lg-6">
                            <label>Part <span class="text-danger">*</span></label>
                            {{ Form::select('part_id', $partsList , $work_order->part_id, ['class' => 'form-control selectpicker', 'id' => 'part_id', 'data-live-search' => 'true', 'data-size' => 7,]) }}
                            <span class="form-text text-muted">Equipment</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <label>Description of the problem <span class="text-danger">*</span></label>
                            {{ Form::textarea('description', null, ['class' => 'form-control', 'id' => 'kt-tinymce-1']) }}
                            <span class="form-text text-muted">Please enter a brief description of this problem</span>
                        </div>
                    </div>
                    <div class="form-group row fv-plugins-icon-container">
                        <div class="col-lg-6">
                            <label>Assign to user <span class="text-danger">*</span></label>
                            {{ Form::select('assigned_user_id', $usersList , $work_order->assigned_user_id, ['class' => 'form-control selectpicker', 'id' => 'assigned_user_id' , 'data-live-search' => 'true', 'data-size' => 7,]) }}
                            <span class="form-text text-muted">Technician</span>
                        </div>
                        <div class="col-lg-6">
                            <label>Service <span class="text-danger">*</span></label>
                            {{ Form::select('service_id', $servicesList , $work_order->service_id, ['class' => 'form-control selectpicker', 'id' => 'part_id', 'data-live-search' => 'true', 'data-size' => 7,]) }}
                            <span class="form-text text-muted">Service</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label class="col-form-label">Deadline</label>
                            <div class="col-lg-12">
                                <div class="input-group date" id="kt_datetimepicker_1" data-target-input="nearest">
                                    {{ Form::text('deadline', null, ['class' => 'form-control datetimepicker-input', 'data-target' => '#kt_datetimepicker_1']) }}

                                    <div class="input-group-append" data-target="#kt_datetimepicker_1"
                                         data-toggle="datetimepicker">
                                        <span class="input-group-text">
                                         <i class="ki ki-calendar"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6 col-xs-12 mb-5 text-right">
                            <button type="reset"
                                    class="btn btn-lg btn-secondary d-xs-block">@lang('lang.cancel')</button>
                            <button type="submit"
                                    class="btn btn-lg btn-primary mr-2 d-xs-block">@lang('lang.save')</button>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}


            </div>
        </div>
        <!--end::Card-->
    </div>

    <!--end::Content-->
@stop

@section('my-scripts')
    <script src="{{asset('assets/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
    <script src="{{asset('assets/js/pages/crud/forms/editors/tinymce.js')}}"></script>
    <script>
        FormValidation.formValidation(
            document.getElementById('edit_equipment_form'),
            {
                fields: {

                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    // Validate fields when clicking the Submit button
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    // Submit the form when all fields are valid
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap({
                        eleInvalidClass: '',
                        eleValidClass: '',
                    })
                }
            }
        );
    </script>
    <script>
        var KTTinymce = function () {
            // Private functions
            var demos = function () {
                tinymce.init({
                    selector: '#kt-tinymce-1',
                    menubar: false,
                    toolbar: ['styleselect fontselect fontsizeselect',
                        'undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify',
                        'bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code'],
                    plugins: 'advlist autolink link image lists charmap print preview code'
                });
            }

            return {
                // public functions
                init: function () {
                    demos();
                }
            };
        }();
        // Initialization
        jQuery(document).ready(function () {
            KTTinymce.init();
        });
    </script>
@stop

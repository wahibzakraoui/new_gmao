@extends('layouts.metro')

@section('title', 'New equipment')

@section('content')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold my-1 mr-5">Equipments</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}" class="text-muted">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{route('equipments')}}" class="text-muted">Equipments</a>
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
            <a href="#" class="btn btn-light-primary font-weight-bolder btn-sm">Actions</a>
            <!--end::Actions-->
            <!--begin::Dropdown-->
            <div class="dropdown dropdown-inline" data-toggle="tooltip" title="Quick actions" data-placement="left">
                <a href="#" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="svg-icon svg-icon-success svg-icon-2x">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Files/File-plus.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <polygon points="0 0 24 0 24 24 0 24" />
                                <path
                                    d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z"
                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                <path
                                    d="M11,14 L9,14 C8.44771525,14 8,13.5522847 8,13 C8,12.4477153 8.44771525,12 9,12 L11,12 L11,10 C11,9.44771525 11.4477153,9 12,9 C12.5522847,9 13,9.44771525 13,10 L13,12 L15,12 C15.5522847,12 16,12.4477153 16,13 C16,13.5522847 15.5522847,14 15,14 L13,14 L13,16 C13,16.5522847 12.5522847,17 12,17 C11.4477153,17 11,16.5522847 11,16 L11,14 Z"
                                    fill="#000000" />
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
    <!--begin::Notice-->
    <div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
        <div class="alert-icon">
            <span class="svg-icon svg-icon-primary svg-icon-xl">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24" />
                        <path
                            d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z"
                            fill="#000000" opacity="0.3" />
                        <path
                            d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z"
                            fill="#000000" fill-rule="nonzero" />
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
        </div>
        <div class="alert-text">This page lets you create the different Areas that constitute your infrastructure.
            <br />An Area will house and contain all the different Equipments.
        </div>
    </div>
    <!--end::Notice-->
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
    @if(count($areasList) > 0 && isset($areasList[1]))
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">New equipment:
                    <span class="d-block text-muted pt-2 font-size-sm">Required fields are marked with a star
                        sign.</span>
                </h3>
            </div>
        </div>
        <div class="card-body">
            {{ Form::open(array('route' => array('store-part'), 'method' => 'POST', 'id' => 'create_part_form', 'files' => true)) }}
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>@lang('parts.name') <span class="text-danger">*</span></label>
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                        <span class="form-text text-muted">@lang('lang.please_enter') @lang('parts.name')</span>
                    </div>
                    <div class="col-lg-6">
                        <label>@lang('parts.belongs_in_area') <span class="text-danger">*</span></label>
                        {{ Form::select('area_id', $areasList , [], ['class' => 'form-control selectpicker', 'id' => 'areaName', 'data-size' => 7, 'data-live-search' => 'true']) }}
                        <span class="form-text text-muted">@lang('lang.please_enter') @lang('area.name')</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>@lang('parts.part_code') <span class="text-danger">*</span></label>
                        <div class=" col-lg-12">
                            {{ Form::text('code', null, ['class' => 'form-control']) }}
                            <span class="form-text text-muted">@lang('lang.please_enter') @lang('parts.part_code').</span>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label>@lang('parts.complementary_code') <span class="text-danger">*</span></label>
                        <div class=" col-lg-12">
                            {{ Form::text('complementary_code', null, ['class' => 'form-control']) }}
                            <span class="form-text text-muted">@lang('lang.please_enter') @lang('parts.complementary_code')</span>
                        </div>
                    </div>
                </div>
                <div class="form-group row fv-plugins-icon-container">
                    <div class="col-lg-6">
                        <label>@lang('parts.belongs_in_area_code') <span class="text-danger">*</span></label>
                        {{ Form::select('area_code', [] , null, ['class' => 'form-control', 'id' => 'areaCode']) }}
                        <span class="form-text text-muted">@lang('lang.please_enter') @lang('area.codes')</span>
                    </div>
                    <div class="col-lg-6">
                        <label>@lang('equipment.equipment') <span class="text-danger">*</span></label>
                        {{ Form::select('equipment_id', $equipmentList , null, ['class' => 'form-control selectpicker', 'id' => '', 'data-size' => 7, 'data-live-search' => 'true']) }}
                        <span class="form-text text-muted">@lang('lang.please_enter') @lang('equipment.equipment')</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>@lang('criticity.criticity') <span class="text-danger">*</span></label>
                        {{ Form::select('criticity_id', $criticitiesList , null, ['class' => 'form-control selectpicker', 'id' => '', 'data-size' => 7, 'data-live-search' => 'true']) }}
                        <span class="form-text text-muted">@lang('lang.please_enter') @lang('criticity.criticity')</span>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label class="col-3 col-form-label">@lang('lang.active')</label>
                        <div class="col-3">
                            <span class="switch switch-outline switch-icon switch-success">
                                <label>
                                    {{ Form::checkbox('active') }}
                                    <span></span>
                                </label>
                            </span>
                        </div>
                        <span class="form-text text-muted">@lang('lang.is_this_item_active')</span>
                    </div>
                    <div class="col-lg-6">
                        <div class="image-input image-input-outline" id="kt_image_1">
                            <div class="image-input-wrapper" style="background-image: url()">
                            </div>
                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                   data-action="change" data-toggle="tooltip" title="" data-original-title="Change image">
                                <i class="fa fa-pen icon-sm text-muted"></i>
                                <input type="file" name="photo" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="photo_remove" />
                            </label>
                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"
                                  data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                            </span>
                            <label>@lang('parts.photo') </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-6"></div>
                    <div class="col-lg-6 col-xs-12 mb-5 text-right">
                        <button type="reset" class="btn btn-lg btn-secondary d-xs-block">Cancel</button>
                        <button type="submit" class="btn btn-lg btn-primary mr-2 d-xs-block"
                            id="submit_button">Save</button>
                    </div>
                </div>
            </div>
            {{ Form::close() }}


        </div>
    </div>
    <!--end::Card-->
    @else
    <div class="col-lg-12">
        <!--begin::Callout-->
        <div class="card card-custom mb-2">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between p-4 flex-lg-wrap flex-xl-nowrap">
                    <div class="d-flex flex-column mr-5">
                        <a href="#" class="h4 text-dark text-hover-primary mb-5">No areas defined yet</a>
                        <p class="text-dark-50">In order to add Equipments, please add an Area first. You can come back
                            to this page later.</p>
                    </div>
                    <div class="ml-6 ml-lg-0 ml-xxl-6 flex-shrink-0">
                        <a href="{{ route('add-area') }}" target="_self"
                            class="btn font-weight-bolder text-uppercase btn-primary py-4 px-6">Create area</a>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Callout-->
    </div>
    @endif
</div>
<!--end::Content-->
@stop

@section('my-scripts')
<script src="{{asset('assets/js/pages/crud/forms/widgets/select2.js')}}"></script>
<script>
    FormValidation.formValidation(
        document.getElementById('create_part_form'),
        {
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: '@lang('parts.name') @lang('lang.is_required')'
                        }
                    }
                },
                code: {
                    validators: {
                        notEmpty: {
                            message: '@lang('parts.part_code') @lang('lang.is_required')'
                        },
                    }
                },
                area_id: {
                    validators: {
                        notEmpty: {
                            message: '@lang('area.name') @lang('lang.is_required')'
                        },
                    }
                },
                equipment_id: {
                    validators: {
                        notEmpty: {
                            message: '@lang('equipment.equipment') @lang('lang.is_required')'
                        },
                    }
                },
                area_code: {
                    validators: {
                        notEmpty: {
                            message: '@lang('equipment.area_code_validation') @lang('lang.is_required')'
                        },
                    }
                },
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
    const avatar1 = new KTImageInput('kt_image_1');
    $('#areaName').change(function () {
        const selected_area = $(this).val();
        const self = $('#areaCode');
        if (selected_area !== "") {
            self.empty().attr('disabled', 'disabled');
            $.get("{{route('areas-json')}}" + '/' + selected_area, function (data) {
                $(data).each(function (index, d) {
                    const newOption = new Option(d.name, d.id, true, true);
                    self.append(newOption).trigger('change');
                });
            }).then(function () {
                self.attr('disabled', false);
            });

        } else {
            self.empty().trigger('change');
        }
    });
</script>
@stop

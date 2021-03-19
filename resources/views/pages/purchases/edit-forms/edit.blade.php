@extends('layouts.metro')

@section('title', 'Edit Purchase')

@section('content')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline flex-wrap mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-1 mr-5">Purchases</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{route('dashboard')}}" class="text-muted">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('equipments')}}" class="text-muted">Purchases</a>
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
    <div class="container-fluid">
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
        <!--  begin::quotations  -->
        <div class="card card-custom gutter-b">
            <!--begin::Header-->
            <div class="card-header border-0 py-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label font-weight-bolder text-dark">Quotations</span>
                    <span class="text-muted mt-3 font-weight-bold font-size-sm">You can still add more quotations</span>
                </h3>
                @if($purchase->state->getValue() === "consulting")
                <div class="card-toolbar">
                    <a href="{{route('add-quotation', $purchase->id)}}" class="btn btn-info font-weight-bolder font-size-sm">New Quotation</a>
                </div>
                @elseif($purchase->state->getValue() === "ordered")
                    <div class="card-toolbar">
                        <a href="{{route('view-purchase', $purchase->id)}}" class="btn btn-info font-weight-bolder font-size-sm">View PDF</a>
                    </div>
                @endif
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body py-0">
                <!--begin::Table-->
                <div class="table-responsive">
                    <table class="table table-head-custom table-vertical-center" id="kt_advance_table_widget_2">
                        <thead>
                        <tr class="text-uppercase">
                            <th style="min-width: 120px">Reference</th>
                            <th style="min-width: 150px">
                                <span class="text-primary">Supplier</span>
                            </th>
                            <th style="min-width: 150px">Expected on</th>
                            <th style="min-width: 130px">Total</th>
                            <th style="min-width: 130px">Status</th>
                            <th class="pr-0 text-right" style="min-width: 160px">action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($purchase->quotations as $quote)
                        <tr>
                            <td class="pl-0">
                                <a href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$quote->quotation_reference}}</a>
                            </td>
                            <td>
                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$quote->supplier->name}}</span>
                                <span class="text-muted font-weight-bold">{{$quote->supplier->contact_email ?? $quote->supplier->contact_phone}}</span>
                            </td>
                            <td>
                                @if(isset($quote->expected_delivery_date))
                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$quote->expected_delivery_date->isoFormat('LL') ?? $quote->created_at}}</span>
                                @endif
                                <span class="text-muted font-weight-bold">{{ $purchase->should_be_available_by < $quote->expected_delivery_date ? 'Late' : 'On time' }}</span>
                            </td>
                            <td>
                                <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{number_format($quote->total_amount_in_cents / 100, 2)}}</span>
                                <span class="text-muted font-weight-bold">MAD</span>
                            </td>
                            <td>
                                <span class="label label-lg label-light-primary label-inline">{{$quote->state}}</span>
                            </td>

                            <td class="pr-0 text-right">
                                @if($purchase->state->getValue() !== "ordered")
                                @can('delete consultation')
                                {{ Form::open(array('route' => ['delete-quotation', $quote->id], 'class'=>'d-inline', 'id' => 'delete_form')) }}
                                <a href="#" id="delete_dialog" class="btn btn-icon btn-light btn-hover-primary btn-sm">
																<span class="svg-icon svg-icon-md svg-icon-primary">
                                                                    <!--begin::Svg Icon | path:assets/media/svg/icons/General/Trash.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<rect x="0" y="0" width="24"
                                                                                  height="24"></rect>
																			<path
                                                                                d="M6,8 L6,20.5 C6,21.3284271 6.67157288,22 7.5,22 L16.5,22 C17.3284271,22 18,21.3284271 18,20.5 L18,8 L6,8 Z"
                                                                                fill="#000000"
                                                                                fill-rule="nonzero"></path>
																			<path
                                                                                d="M14,4.5 L14,4 C14,3.44771525 13.5522847,3 13,3 L11,3 C10.4477153,3 10,3.44771525 10,4 L10,4.5 L5.5,4.5 C5.22385763,4.5 5,4.72385763 5,5 L5,5.5 C5,5.77614237 5.22385763,6 5.5,6 L18.5,6 C18.7761424,6 19,5.77614237 19,5.5 L19,5 C19,4.72385763 18.7761424,4.5 18.5,4.5 L14,4.5 Z"
                                                                                fill="#000000" opacity="0.3"></path>
																		</g>
																	</svg>
                                                                    <!--end::Svg Icon-->

																</span>
                                </a>
                                {{ Form::close() }}
                                @endcan
                                <a onclick="return confirm('Are you sure you want to select this offer?');" href="{{route('select-quotation', $quote->id)}}" class="btn btn-icon btn-light btn-hover-primary btn-sm">
                                    <span class="svg-icon svg-icon-md svg-icon-primary">
											<!--begin::Svg Icon | path:assets/media/svg/icons/General/Settings-1.svg-->
																	<svg xmlns="http://www.w3.org/2000/svg"
                                                                         xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         width="24px" height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
																		<g stroke="none" stroke-width="1" fill="none"
                                                                           fill-rule="evenodd">
																			<rect x="0" y="0" width="24"
                                                                                  height="24"></rect>
																			<path
                                                                                d="M7,3 L17,3 C19.209139,3 21,4.790861 21,7 C21,9.209139 19.209139,11 17,11 L7,11 C4.790861,11 3,9.209139 3,7 C3,4.790861 4.790861,3 7,3 Z M7,9 C8.1045695,9 9,8.1045695 9,7 C9,5.8954305 8.1045695,5 7,5 C5.8954305,5 5,5.8954305 5,7 C5,8.1045695 5.8954305,9 7,9 Z"
                                                                                fill="#000000"></path>
																			<path
                                                                                d="M7,13 L17,13 C19.209139,13 21,14.790861 21,17 C21,19.209139 19.209139,21 17,21 L7,21 C4.790861,21 3,19.209139 3,17 C3,14.790861 4.790861,13 7,13 Z M17,19 C18.1045695,19 19,18.1045695 19,17 C19,15.8954305 18.1045695,15 17,15 C15.8954305,15 15,15.8954305 15,17 C15,18.1045695 15.8954305,19 17,19 Z"
                                                                                fill="#000000" opacity="0.3"></path>
																		</g>
                                                                    </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </a>
                                    @endif
                            </td>
                        </tr>
                        @empty

                        @endforelse
                        </tbody>
                    </table>
                </div>
                <!--end::Table-->
            </div>
            <!--end::Body-->
        </div>
        <!--  end::quotations  -->
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header flex-wrap py-3">
                <div class="card-title">
                    <h3 class="card-label">Approve purchase:
                        <span class="d-block text-muted pt-2 font-size-sm">Required fields are marked with a star
                        sign.</span>
                    </h3>
                </div>
            </div>
            <div class="card-body">
                {{ Form::open(array('route' => array('edit-purchase', $purchase->id), 'method' => 'POST', 'id' => 'approve_purchase_form', 'files' => false)) }}
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <h2 class="mb-8">Details</h2>
                            <h6 for="">Purchase Number: {{$purchase->reference}}</h6>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <h6 for="">Approved by: {{$purchase->reviewer->name}}</h6>
                        </div>
                        <div class="col-lg-6">
                            <h6 for="">Approved on: {{$purchase->review_date}}</h6>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <h6 for="">Requesting service: {{$purchase->service->name}}</h6>
                        </div>
                        <div class="col-lg-6">
                            <h6 for="">State: {{ucfirst($purchase->state)}}</h6>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label>Reference Number <span class="text-danger">*</span></label>
                            {{ Form::text('reference', $purchase->reference, ['class' => 'form-control form-control-solid', 'placeholder' => 'Reference of Purchasing Request']) }}
                            <span class="form-text text-muted">Uniquely identifiable number; Eg: DA-55</span>
                        </div>
                        <div class="col-lg-6">
                            <label>Deliver before <span class="text-danger">*</span></label>
                            <div class="input-group input-group-solid date" id="kt_datetimepicker_3"
                                 data-target-input="nearest">
                                <input type="text" name="should_be_available_by"
                                       value="{{$purchase->should_be_available_by}}"
                                       class="form-control form-control-solid datetimepicker-input"
                                       placeholder="Select date & time" data-target="#kt_datetimepicker_3"/>
                                <div class="input-group-append" data-target="#kt_datetimepicker_3"
                                     data-toggle="datetimepicker">
                                <span class="input-group-text">
                                    <i class="ki ki-calendar"></i>
                                </span>
                                </div>
                            </div>
                            <span class="form-text text-muted">Specify the time before which this item should be procured.</span>
                        </div>
                    </div>
                    <div id="items" class="bg-success-o-10 p-10 mb-8" style="border-radius:5px;">
                        @foreach($purchase->buyables as $buyable)
                            <div class="col-lg-12 mb-5">
                                <label>{{$buyable->model->name}} </label>
                                <input type="text" class="form-control form-control-solid form-control-lg"
                                       value="{{$buyable->pivot->quantity_ordered}}" disabled="disabled">
                            </div>
                        @endforeach
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <label>Internal note </label>
                            {{ Form::textarea('internal_note', $purchase->internal_note, ['class' => 'form-control', 'id' => 'kt-tinymce-1']) }}
                            <span class="form-text text-muted">Please enter a note to staff</span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-12">
                            <label>Note to Supplier (Be careful! visible in order form!) </label>
                            {{ Form::textarea('supplier_note', $purchase->supplier_note, ['class' => 'form-control', 'id' => 'kt-tinymce-2']) }}
                            <span class="form-text text-muted">Please enter a note to supplier if applicable</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-lg-6"></div>
                        <div class="col-lg-6 col-xs-12 mb-5 text-right">
                            <button type="reset" class="btn btn-lg btn-secondary d-xs-block">Cancel</button>
                            <button type="submit" class="btn btn-lg btn-primary mr-2 d-xs-block"
                                    id="submit_button">Save
                            </button>
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
    <script>
        FormValidation.formValidation(
            document.getElementById('approve_purchase_form'),
            {
                fields: {
                    state: {
                        validators: {
                            notEmpty: {
                                message: 'State is required'
                            }
                        }
                    },
                    review_reason: {
                        validators: {
                            notEmpty: {
                                message: 'Justification is required.'
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
@stop

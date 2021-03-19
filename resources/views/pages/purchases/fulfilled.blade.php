@extends('layouts.metro')

@section('title', 'Delivered')

@section('content')

<!--begin::Subheader-->
<div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold my-1 mr-5">Delivered</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="/dashboard" class="text-muted">@lang('dashboard.dashboard')</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="" class="text-muted">Delivered</a>
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
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-8">
            <!--begin::Engage Widget 7-->
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-body d-flex p-0">
                    <div class="flex-grow-1 p-12 card-rounded bgi-no-repeat d-flex flex-column justify-content-center align-items-start" style="background-color: #FFF4DE; background-position: right bottom; background-size: auto 100%; background-image: url({{asset('assets/media/svg/humans/custom-8.svg')}})">
                        <h4 class="text-danger font-weight-bolder m-0">Attention</h4>
                        <p class="text-dark-50 my-5 font-size-xl font-weight-bold">Researching and filtering is done in cents, do not try to search an amount in MAD.
                            <br>the search will fail. Instead use Amount * 100 (eg. 100 MAD = 10000 cents)</p>
                    </div>
                </div>
            </div>
            <!--end::Engage Widget 7-->
        </div>
        <div class="col-xl-4">
            <!--begin::Engage Widget 8-->
            <div class="card card-custom card-stretch gutter-b">
                <div class="card-body p-0 d-flex">
                    <div class="d-flex align-items-start justify-content-start flex-grow-1 bg-light-warning p-8 card-rounded flex-grow-1 position-relative">
                        <div class="d-flex flex-column align-items-start flex-grow-1 h-100">
                            <div class="p-1 flex-grow-1">
                                <h4 class="text-warning font-weight-bolder">Error</h4>
                                <p class="text-dark-50 font-weight-bold mt-3">Stock module returned with error 15: Module ! Present.</p>
                            </div>
                            <a href="#" class="btn btn-link btn-link-warning font-weight-bold">Fix the issue
                                <span class="svg-icon svg-icon-lg svg-icon-warning">
															<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
															<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																	<polygon points="0 0 24 0 24 24 0 24"></polygon>
																	<rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
																	<path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
																</g>
															</svg>
                                    <!--end::Svg Icon-->
														</span></a>
                        </div>
                        <div class="position-absolute right-0 bottom-0 mr-5 overflow-hidden">
                            <img src="{{asset('assets/media/svg/humans/custom-13.svg')}}" class="max-h-200px max-h-xl-275px mb-n20" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Engage Widget 8-->
        </div>
    </div>
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap py-3">
            <div class="card-title">
                <h3 class="card-label">List of archived purchases:</h3>
            </div>
            <div class="card-toolbar">
                @can('add area')
                <!--begin::Button-->
                <a href="{{route('add-purchase')}}" class="btn btn-primary font-weight-bolder">
                    <span class="svg-icon svg-icon-md">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                            height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <circle fill="#000000" cx="9" cy="15" r="6" />
                                <path
                                    d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                    fill="#000000" opacity="0.3" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>New Record</a>
                <!--end::Button-->
                @endcan
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Reference</th>
                        <th>User</th>
                        <th>Service</th>
                        <th>Limit date</th>
                        <th>Created At</th>
                        <th>Reviewed At</th>
                        <th>Reviewed By</th>
                        <th>Supplier</th>
                        <th>Subtotal</th>
                        <th>Tax</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
    <!--end::Card-->
</div>

<!--end::Content-->
@stop

@section('my-scripts')
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
<script>
    "use strict";
    var KTDatatablesDataSourceAjaxServer = function () {

        var initTable1 = function () {
            var table = $('#kt_datatable');

            // begin first table
            table.DataTable({
                responsive: true,
                searchDelay: 500,
                processing: true,
                serverSide: true,
                dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
			            <'row'<'col-sm-12'tr>>
                        <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
                    ajax: {
                        url: '/purchases/list_archived',
                        type: 'POST',
                        data: {
                        // parameters for custom backend script demo
                        columnsDef: [
                            'name', 'code',
                            'description'],
                    },
                },
                buttons: [
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [ 1, 2, 3, 4, 5 ]
                        }
                    },
                    {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [ 1, 2, 3, 4, 5 ]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: [ 1, 2, 3, 4, 5 ]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: [ 1, 2, 3, 4, 5 ]
                        }
                    },
                ],
                columns: [
                    { data: 'id' },
                    { data: 'reference' },
                    { "data": "user.name", "name": "user.name"  },
                    { "data": "service.name", "name": "service.name"  },
                    { "data": "should_be_available_by" },
                    { "data": "created_at" },
                    { "data": "review_date" },
                    { "data": "reviewer.name", "name": "reviewer.name"  },
                    { "data": "supplier.name", "name": "supplier.name"  },
                    { "data": "subtotal_in_cents" },
                    { "data": "tax_total_in_cents" },
                    { "data": "total_amount_in_cents" },
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ],
                columnDefs: [
                    {
                        width: '75px',
                        targets: [4, 5],
                        render: function (data, type, full, meta) {
                            return moment(data).format('YYYY-MM-DD');
                        },
                    },
                    {
                        width: '75px',
                        targets: [9, 10, 11],
                        render: function (data, type, full, meta) {
                            return (data /100).toFixed(2);
                        },
                    },
                ],
            });

            $('#export_print').on('click', function (e) {
                e.preventDefault();
                table.button(0).trigger();
            });

            $('#export_copy').on('click', function (e) {
                e.preventDefault();
                table.button(1).trigger();
            });

            $('#export_excel').on('click', function (e) {
                e.preventDefault();
                table.button(2).trigger();
            });

            $('#export_csv').on('click', function (e) {
                e.preventDefault();
                table.button(3).trigger();
            });

            $('#export_pdf').on('click', function (e) {
                e.preventDefault();
                table.button(4).trigger();
            });
        };

        return {

            //main function to initiate the module
            init: function () {
                initTable1();
            },

        };

    }();

    jQuery(document).ready(function () {
        KTDatatablesDataSourceAjaxServer.init();
    });

    @if(session('success'))
        toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
        };

        toastr.success("{{session('success')}}");
    @endif


</script>
@stop

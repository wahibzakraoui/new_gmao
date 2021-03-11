@extends('layouts.metro')

@section('title', 'Show Gamut')

@section('content')
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Details-->
            <div class="d-flex align-items-center flex-wrap mr-2">
                <!--begin::Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Gamut</h5>
                <!--end::Title-->
                <!--begin::Separator-->
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-5 bg-gray-200"></div>
                <!--end::Separator-->
                <!--begin::Search Form-->
                <div class="d-flex align-items-center" id="kt_subheader_search">
                    <span class="text-dark-50 font-weight-bold" id="kt_subheader_total">{{$gamut->designation}}</span>
                </div>
                <!--end::Search Form-->
            </div>
            <!--end::Details-->
            <!--begin::Toolbar-->
            <div class="d-flex align-items-center">
                <!--begin::Button-->
                <a href="{{route('gamuts')}}" class="btn btn-default font-weight-bold">Back</a>
                <!--end::Button-->
                <!--begin::Dropdown-->
                <div class="btn-group ml-2">
                    <a href="{{route('edit-gamut', $gamut->id)}}" type="button" class="btn btn-primary font-weight-bold">Edit Gamut</a>
                    <button type="button" class="btn btn-primary font-weight-bold dropdown-toggle dropdown-toggle-split"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                    <div class="dropdown-menu dropdown-menu-sm p-0 m-0 dropdown-menu-right">
                        <ul class="navi py-5">
                            {{--<li class="navi-item">
                                <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="flaticon2-writing"></i>
                                </span>
                                    <span class="navi-text">Save &amp; continue</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="flaticon2-medical-records"></i>
                                </span>
                                    <span class="navi-text">Save &amp; add new</span>
                                </a>
                            </li>
                            <li class="navi-item">
                                <a href="#" class="navi-link">
                                <span class="navi-icon">
                                    <i class="flaticon2-hourglass-1"></i>
                                </span>
                                    <span class="navi-text">Save &amp; exit</span>
                                </a>
                            </li>--}}
                        </ul>
                    </div>
                </div>
                <!--end::Dropdown-->
            </div>
            <!--end::Toolbar-->
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Card-->
            <div class="card card-custom gutter-b">
                <div class="card-body">
                    <div class="d-flex">
                        <!--begin: Pic-->
                        <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                            <div class="symbol symbol-50 symbol-lg-120">
                                <img alt="Equipment" style="object-fit: cover;" src="{{$gamut->equipment->getFirstMediaUrl('equipment')}}" />
                            </div>
                            <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                                <span class="font-size-h3 symbol-label font-weight-boldest">{{$gamut->code}}></span>
                            </div>
                        </div>
                        <!--end: Pic-->
                        <!--begin: Info-->
                        <div class="flex-grow-1">
                            <!--begin: Title-->
                            <div class="d-flex align-items-center justify-content-between flex-wrap">
                                <div class="mr-3">
                                    <!--begin::Name-->
                                    <a target="_blank" href="{{route('edit-equipment', $gamut->equipment_id)}}"
                                       class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{$gamut->code}} - {{$gamut->designation}}
                                        @if($gamut->active)
                                            <i class="flaticon2-correct text-success icon-md ml-2"></i></a>
                                        @endif
                                    <!--end::Name-->
                                    <!--begin::Contacts-->
                                    <div class="d-flex flex-wrap my-2">
                                        <a href="#"
                                           class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                        <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                            @if($gamut->state === "Running")
                                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Done-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                                        <path d="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill="#000000" fill-rule="nonzero"/>
                                                    </g>
                                                </svg><!--end::Svg Icon-->
                                            @else
                                                <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Error-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                                        <path d="M12.0355339,10.6213203 L14.863961,7.79289322 C15.2544853,7.40236893 15.8876503,7.40236893 16.2781746,7.79289322 C16.6686989,8.18341751 16.6686989,8.81658249 16.2781746,9.20710678 L13.4497475,12.0355339 L16.2781746,14.863961 C16.6686989,15.2544853 16.6686989,15.8876503 16.2781746,16.2781746 C15.8876503,16.6686989 15.2544853,16.6686989 14.863961,16.2781746 L12.0355339,13.4497475 L9.20710678,16.2781746 C8.81658249,16.6686989 8.18341751,16.6686989 7.79289322,16.2781746 C7.40236893,15.8876503 7.40236893,15.2544853 7.79289322,14.863961 L10.6213203,12.0355339 L7.79289322,9.20710678 C7.40236893,8.81658249 7.40236893,8.18341751 7.79289322,7.79289322 C8.18341751,7.40236893 8.81658249,7.40236893 9.20710678,7.79289322 L12.0355339,10.6213203 Z" fill="#000000"/>
                                                    </g>
                                                </svg><!--end::Svg Icon-->
                                            @endif

                                        </span>{{$gamut->state}}</a>
                                        <a href="#"
                                           class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                        <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Terminal.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "/>
                                                    <rect fill="#000000" opacity="0.3" x="12" y="17" width="10" height="2" rx="1"/>
                                                </g>
                                            </svg><!--end::Svg Icon-->
                                        </span>{{$gamut->factory->code}}-{{$gamut->equipment->area_code}}-{{$gamut->equipment->code}}</a>
                                        <a href="#" class="text-muted text-hover-primary mr-5 font-weight-bold">
                                        <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Map/Marker2.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24" />
                                                    <path
                                                        d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z"
                                                        fill="#000000" />
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>{{$gamut->factory->name}}</a>
                                        <a href="#" class="text-muted text-hover-primary font-weight-bold">
                                        <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                            <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Time-schedule.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M10.9630156,7.5 L11.0475062,7.5 C11.3043819,7.5 11.5194647,7.69464724 11.5450248,7.95024814 L12,12.5 L15.2480695,14.3560397 C15.403857,14.4450611 15.5,14.6107328 15.5,14.7901613 L15.5,15 C15.5,15.2109164 15.3290185,15.3818979 15.1181021,15.3818979 C15.0841582,15.3818979 15.0503659,15.3773725 15.0176181,15.3684413 L10.3986612,14.1087258 C10.1672824,14.0456225 10.0132986,13.8271186 10.0316926,13.5879956 L10.4644883,7.96165175 C10.4845267,7.70115317 10.7017474,7.5 10.9630156,7.5 Z" fill="#000000"/>
                                                    <path d="M7.38979581,2.8349582 C8.65216735,2.29743306 10.0413491,2 11.5,2 C17.2989899,2 22,6.70101013 22,12.5 C22,18.2989899 17.2989899,23 11.5,23 C5.70101013,23 1,18.2989899 1,12.5 C1,11.5151324 1.13559454,10.5619345 1.38913364,9.65805651 L3.31481075,10.1982117 C3.10672013,10.940064 3,11.7119264 3,12.5 C3,17.1944204 6.80557963,21 11.5,21 C16.1944204,21 20,17.1944204 20,12.5 C20,7.80557963 16.1944204,4 11.5,4 C10.54876,4 9.62236069,4.15592757 8.74872191,4.45446326 L9.93948308,5.87355717 C10.0088058,5.95617272 10.0495583,6.05898805 10.05566,6.16666224 C10.0712834,6.4423623 9.86044965,6.67852665 9.5847496,6.69415008 L4.71777931,6.96995273 C4.66931162,6.97269931 4.62070229,6.96837279 4.57348157,6.95710938 C4.30487471,6.89303938 4.13906482,6.62335149 4.20313482,6.35474463 L5.33163823,1.62361064 C5.35654118,1.51920756 5.41437908,1.4255891 5.49660017,1.35659741 C5.7081375,1.17909652 6.0235153,1.2066885 6.2010162,1.41822583 L7.38979581,2.8349582 Z" fill="#000000" opacity="0.3"/>
                                                </g>
                                            </svg><!--end::Svg Icon-->
                                        </span>{{$gamut->periodicity->name}}</a>
                                    </div>
                                    <!--end::Contacts-->
                                </div>
                                <div class="my-lg-0 my-1">
                                    <a href="#"
                                       class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3">Reports</a>
                                    <a data-toggle="tab" href="#kt_apps_projects_view_tab_1" class="btn btn-sm btn-info font-weight-bolder text-uppercase">New
                                        Task</a>
                                </div>
                            </div>
                            <!--end: Title-->
                            <!--begin: Content-->
                            <div class="d-flex align-items-center flex-wrap justify-content-between">
                                <div class="flex-grow-1 font-weight-bold text-dark-50 py-5 py-lg-2 mr-5">{{$gamut->periodicity->description}}
                                </div>
                                <div class="d-flex flex-wrap align-items-center py-2">
                                    <div class="d-flex align-items-center mr-10">
                                        <div class="mr-6">
                                            <div class="font-weight-bold mb-2">Creation Date</div>
                                            <span
                                                class="btn btn-sm btn-text btn-light-primary text-uppercase font-weight-bold">{{$gamut->created_at->isoFormat('LL')}}</span>
                                        </div>
                                        <div class="">
                                            <div class="font-weight-bold mb-2">Due Date</div>
                                            <span
                                                class="btn btn-sm btn-text btn-light-danger text-uppercase font-weight-bold">{{$gamut->next_run->isoFormat('LL')}}</span>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 flex-shrink-0 w-150px w-xl-300px mt-4 mt-sm-0">
                                        <span class="font-weight-bold">Success rate</span>
                                        <div class="progress progress-xs mt-2 mb-2">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{($gamut_done_work_orders_count / $gamut_all_work_orders_count *100)}}%;"
                                                 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="font-weight-bolder text-dark">{{number_format(($gamut_done_work_orders_count / $gamut_all_work_orders_count *100), 2)}}%</span>
                                    </div>
                                </div>
                            </div>
                            <!--end: Content-->
                        </div>
                        <!--end: Info-->
                    </div>
                    <div class="separator separator-solid my-7"></div>
                    <!--begin: Items-->
                    <div class="d-flex align-items-center flex-wrap">
                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                        <span class="mr-4">
                            <i class="flaticon-piggy-bank icon-2x text-muted font-weight-bold"></i>
                        </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Purchases</span>
                                <span class="font-weight-bolder font-size-h5">
                                <span class="text-dark-50 font-weight-bold">MAD </span>00.00</span>
                            </div>
                        </div>
                        <!--end: Item-->
                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                        <span class="mr-4">
                            <i class="flaticon-confetti icon-2x text-muted font-weight-bold"></i>
                        </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Complementary work orders</span>
                                <span class="font-weight-bolder font-size-h5">
                                <span class="text-dark-50 font-weight-bold">{{$gamut->btcs->count()}}</span></span>
                            </div>
                        </div>
                        <!--end: Item-->
                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                        <span class="mr-4">
                            <i class="flaticon-time icon-2x text-muted font-weight-bold"></i>
                        </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Time consumed</span>
                                <span class="font-weight-bolder font-size-h5">
                                <span class="text-dark-50 font-weight-bold"></span>0</span>
                            </div>
                        </div>
                        <!--end: Item-->
                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                        <span class="mr-4">
                            <i class="flaticon2-check-mark icon-2x text-success font-weight-bold"></i>
                        </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Done</span>
                                <span class="font-weight-bolder font-size-h5">
                                <span class="text-dark-50 font-weight-bold">{{$gamut_done_work_orders_count}}</span>
                            </div>
                        </div>
                        <!--end: Item-->
                        <!--begin: Item-->
                        <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                        <span class="mr-4">
                            <i class="flaticon2-cross icon-2x text-danger font-weight-bold"></i>
                        </span>
                            <div class="d-flex flex-column text-dark-75">
                                <span class="font-weight-bolder font-size-sm">Not done</span>
                                <span class="font-weight-bolder font-size-h5">
                                <span class="text-dark-50 font-weight-bold">{{$gamut_all_work_orders_count - $gamut_done_work_orders_count}}</span>
                            </div>
                        </div>
                        <!--end: Item-->
                    </div>
                    <!--begin: Items-->
                </div>
            </div>
            <!--end::Card-->
            <!--begin::Card-->
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header card-header-tabs-line">
                    <div class="card-toolbar">
                        <ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-tabs-bold nav-tabs-line-3x"
                            role="tablist">
                            <li class="nav-item mr-3">
                                <a class="nav-link active" data-toggle="tab" href="#kt_apps_projects_view_tab_2">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon mr-3">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Chat-check.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                             viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z"
                                                    fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                <path
                                                    d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z"
                                                    fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                    <span class="nav-text font-weight-bold">Work orders</span>
                                </a>
                            </li>
                            <li class="nav-item mr-3">
                                <a class="nav-link" data-toggle="tab" href="#kt_apps_projects_view_tab_4">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon mr-3">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Home/Globe.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                             viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M13,18.9450712 L13,20 L14,20 C15.1045695,20 16,20.8954305 16,22 L8,22 C8,20.8954305 8.8954305,20 10,20 L11,20 L11,18.9448245 C9.02872877,18.7261967 7.20827378,17.866394 5.79372555,16.5182701 L4.73856106,17.6741866 C4.36621808,18.0820826 3.73370941,18.110904 3.32581341,17.7385611 C2.9179174,17.3662181 2.88909597,16.7337094 3.26143894,16.3258134 L5.04940685,14.367122 C5.46150313,13.9156769 6.17860937,13.9363085 6.56406875,14.4106998 C7.88623094,16.037907 9.86320756,17 12,17 C15.8659932,17 19,13.8659932 19,10 C19,7.73468744 17.9175842,5.65198725 16.1214335,4.34123851 C15.6753081,4.01567657 15.5775721,3.39010038 15.903134,2.94397499 C16.228696,2.49784959 16.8542722,2.4001136 17.3003976,2.72567554 C19.6071362,4.40902808 21,7.08906798 21,10 C21,14.6325537 17.4999505,18.4476269 13,18.9450712 Z"
                                                    fill="#000000" fill-rule="nonzero" />
                                                <circle fill="#000000" opacity="0.3" cx="12" cy="10" r="6" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                    <span class="nav-text font-weight-bold">Settings</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#kt_apps_projects_view_tab_1">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon mr-3">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                             viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z"
                                                    fill="#000000" />
                                                <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                    <span class="nav-text font-weight-bold">Tasks</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body">
                    <div class="tab-content pt-5">
                        <!--begin::Tab Content-->
                        <div class="tab-pane active" id="kt_apps_projects_view_tab_2" role="tabpanel">
                            <!--begin: Datatable-->
                            <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Designation</th>
                                    <th>Equipment</th>
                                    <th>Gamut</th>
                                    <th>Assigned Technician</th>
                                    <th>Type</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <!--end: Datatable-->
                        </div>
                        <!--end::Tab Content-->
                        <!--begin::Tab Content-->
                        <div class="tab-pane" id="kt_apps_projects_view_tab_4" role="tabpanel">
                            <form class="form">
                                <!--begin::Heading-->
                                <div class="row">
                                    <div class="col-lg-9 col-xl-6 offset-xl-3">
                                        <h3 class="font-size-h6 mb-5">Setup Email Notification:</h3>
                                    </div>
                                </div>
                                <!--end::Heading-->
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Email
                                        Notification</label>
                                    <div class="col-lg-9 col-xl-6">
                                    <span class="switch">
                                        <label>
                                            <input type="checkbox" checked="checked" name="email_notification_1" />
                                            <span></span>
                                        </label>
                                    </span>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Send Copy To Personal
                                        Email</label>
                                    <div class="col-lg-9 col-xl-6">
                                    <span class="switch">
                                        <label>
                                            <input type="checkbox" name="email_notification_2" />
                                            <span></span>
                                        </label>
                                    </span>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <!--begin::Heading-->
                                <div class="row">
                                    <div class="col-lg-9 col-xl-6 offset-xl-3">
                                        <h3 class="font-size-h6 mb-5">Activity Related settings:</h3>
                                    </div>
                                </div>
                                <!--end::Heading-->
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Notification</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="checkbox-list">
                                            <label class="checkbox">
                                                <input type="checkbox" />
                                                <span></span>New Equipment added</label>
                                            <label class="checkbox">
                                                <input type="checkbox" />
                                                <span></span>New Part added</label>
                                            <label class="checkbox">
                                                <input type="checkbox" checked="checked" />
                                                <span></span>Someone adds a gamut</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">When To send
                                        Emails</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="checkbox-list">
                                            <label class="checkbox">
                                                <input type="checkbox" />
                                                <span></span>Upon new gamut</label>
                                            <label class="checkbox">
                                                <input type="checkbox" />
                                                <span></span>New work order approval</label>
                                            <label class="checkbox">
                                                <input type="checkbox" checked="checked" />
                                                <span></span>User assigned</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--end::Tab Content-->
                        <!--begin::Tab Content-->
                        <div class="tab-pane" id="kt_apps_projects_view_tab_1" role="tabpanel">
                            <div class="container">
                                {{ Form::open(array('route' => array('store-task'), 'method' => 'POST', 'id' => 'create_task_form')) }}
                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>Label <span class="text-danger">*</span></label>
                                            {{ Form::text('label', null, ['class' => 'form-control form-control-lg form-control-solid']) }}
                                            <span class="form-text text-muted">Please enter the label</span>
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Quality </label>
                                            {{ Form::text('quality', null, ['class' => 'form-control form-control-lg form-control-solid']) }}
                                            <span class="form-text text-muted">Please specify the Quality if a product is to be used</span>
                                        </div>
                                        {{ Form::hidden('gamut_id', $gamut->id) }}
                                        <div class="col-lg-4">
                                            <label>Quantity </label>
                                            {{ Form::text('quantity', null, ['class' => 'form-control form-control-lg form-control-solid']) }}
                                            <span class="form-text text-muted">Please specify the Quantity if a product is to be used</span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <textarea id="kt-tinymce-1" name="description" class="tox-targe form-control form-control-lg form-control-solid"
                                               rows="3" placeholder="Type notes"></textarea>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <button type="submit" class="btn btn-light-primary font-weight-bold">Add task</button>
                                            <a href="#" class="btn btn-clean font-weight-bold">Cancel</a>
                                        </div>
                                    </div>
                                {{ Form::close() }}
                                <div class="separator separator-dashed my-10"></div>
                                <!--begin::Timeline-->
                                <div class="timeline timeline-3">
                                    <div class="timeline-items">
                                        @foreach($gamut->tasks as $task)
                                            <div class="timeline-item">
                                            <div class="timeline-media">
                                                {{$loop->iteration}}
                                            </div>
                                            <div class="timeline-content">
                                                <div class="d-flex align-items-center justify-content-between mb-3">
                                                    <div class="mr-2">
                                                        <a href="#"
                                                           class="text-dark-75 text-hover-primary font-weight-bold">{{$task->label}}</a>
                                                        <span class="text-muted ml-2">{{$task->created_at->isoFormat('LLL')}}</span>
                                                        @if($task->quality)
                                                        <span class="label label-light-warning font-weight-bolder label-inline ml-2">{{$task->quality}} {{$task->quantity}}</span>
                                                        @endif
                                                    </div>
                                                    <div class="dropdown ml-2" data-toggle="tooltip" title="Quick actions"
                                                         data-placement="left">
                                                        <a href="#" class="btn btn-hover-light-primary btn-sm btn-icon"
                                                           data-toggle="dropdown" aria-haspopup="true"
                                                           aria-expanded="false">
                                                            <i class="ki ki-more-hor icon-md"></i>
                                                        </a>
                                                        <div
                                                            class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right">
                                                            <!--begin::Navigation-->
                                                            <ul class="navi navi-hover">
                                                                <li class="navi-header font-weight-bold py-4">
                                                                    <span class="font-size-lg">Actions:</span>
                                                                    <i class="flaticon2-information icon-md text-muted"
                                                                       data-toggle="tooltip" data-placement="right"
                                                                       title="Click to learn more..."></i>
                                                                </li>
                                                                <li class="navi-separator mb-3 opacity-70"></li>
                                                                    @can('delete gamuts')
                                                                        <li class="navi-item">
                                                                            {{ Form::open(array('route' => ['delete-task', $task->id], 'id' => 'delete_form')) }}
                                                                            <input type="hidden" name="gamut_id" value="{{$gamut->id}}">
                                                                            <button type="submit" class="btn btn-light-success font-weight-bold mr-2">
                                                                            <span class="navi-text">
                                                                                <span
                                                                                    class="label label-xl label-inline label-light-danger">Delete task</span>
                                                                            </span>
                                                                            </button>
                                                                            {{ Form::close()}}
                                                                        </li>
                                                                    @endcan
                                                            </ul>
                                                            <!--end::Navigation-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <p class="p-0">{!! html_entity_decode($task->description) !!}</p>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!--end::Timeline-->
                            </div>
                        </div>
                        <!--end::Tab Content-->
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@stop

@section('my-scripts')
    <script src="{{asset('assets/plugins/custom/tinymce/tinymce.bundle.js')}}"></script>
    <script src="{{asset('assets/js/pages/crud/forms/editors/tinymce.js')}}"></script>
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
                        url: '{{route("gamut-work_orders-list", $gamut->id)}}',
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
                                columns: [ 0, 1, 2, 3, 4, 5 ]
                            }
                        },
                        {
                            extend: 'copyHtml5',
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5 ]
                            }
                        },
                        {
                            extend: 'excelHtml5',
                            exportOptions: {
                                columns: [ 1, 2, 3, 4, 5, 6 ]
                            }
                        },
                        {
                            extend: 'pdfHtml5',
                            exportOptions: {
                                columns: [ 0, 1, 2, 3, 4, 5 ]
                            }
                        },
                    ],
                    columns: [
                        { "data": "number", "name": "work_orders.id"  },
                        { "data": "created_at", "name": "work_orders.created_at"  },
                        { data: 'designation' },
                        { "data": "equipmentName", "name": "equipment.name"  },
                        { "data": "gamutCode", "name": "gamuts.code"  },
                        { "data": "userName", "name": "users.name"  },
                        { data: 'type' },
                        { data: 'status' },
                        { data: 'actions', name: 'actions', orderable: false, searchable: false }
                    ],
                    columnDefs: [
                        {width:'20px', targets: 0},
                        {
                            width: '75px',
                            targets: 6,
                            render: function (data, type, full, meta) {
                                const status = {
                                    gamut: {'title': 'Gamut', 'state': 'success'},
                                    complementary_wo: {'title': 'BTC', 'state': 'warning'},
                                    corrective_maintenance: {'title': 'Corrective', 'state': 'danger'},
                                };
                                if (typeof status[data] === 'undefined') {
                                    return '<span class="label label-danger label-dot mr-2"></span>' +
                                        '<span class="font-weight-bold text-danger">Inactive</span>';
                                }
                                return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
                                    '<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
                            },
                        },
                        {
                            width: '75px',
                            targets: 7,
                            render: function (data, type, full, meta) {
                                const status = {
                                    finished: {'title': 'Finished', 'state': 'success'},
                                    assigned: {'title': 'Assigned', 'state': 'warning'},
                                    pending: {'title': 'Pending', 'state': 'danger'},
                                };
                                if (typeof status[data] === 'undefined') {
                                    return '<span class="label label-danger label-dot mr-2"></span>' +
                                        '<span class="font-weight-bold text-danger">Inactive</span>';
                                }
                                return '<span class="label label-' + status[data].state + ' label-dot mr-2"></span>' +
                                    '<span class="font-weight-bold text-' + status[data].state + '">' + status[data].title + '</span>';
                            },
                        },
                        {
                            width: '75px',
                            targets: 4,
                            render: function (data, type, full, meta) {
                                console.log(full);
                                if(data !== 'undefined' && full.gamut_id !== 'undefined')
                                    return `<a href="/gamuts/show/${full.gamut_id}" class="btn btn-light-warning font-weight-bold mr-2">${data}</a>`;
                            },
                        },
                        {
                            width: '75px',
                            targets: 1,
                            render: function (data, type, full, meta) {
                                if(data !== 'undefined')
                                    return moment.utc(data).format('YYYY-MM-DD').toString();
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

        var KTTinymce = function () {
            // Private functions
            var demos = function () {
                tinymce.init({
                    selector: '#kt-tinymce-1',
                    menubar: false,
                    toolbar: ['styleselect fontselect fontsizeselect',
                        'undo redo | cut copy paste | bold italic | link image | alignleft aligncenter alignright alignjustify',
                        'bullist numlist | outdent indent | blockquote subscript superscript | advlist | autolink | lists charmap | print preview |  code'],
                    plugins : 'advlist autolink link image lists charmap print preview code'
                });
            }

            return {
                // public functions
                init: function() {
                    demos();
                }
            };
        }();

        // Initialization
        jQuery(document).ready(function() {
            KTTinymce.init();
            KTDatatablesDataSourceAjaxServer.init();
        });
    </script>
@stop

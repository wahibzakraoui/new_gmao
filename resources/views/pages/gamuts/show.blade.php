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
                            <li class="navi-item">
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
                            </li>
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
                                <img alt="Equipment" src="{{$gamut->equipment->getFirstMediaUrl('equipment')}}" />
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
                                    <a href="#"
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
                                            <div class="progress-bar bg-success" role="progressbar" style="width: {{($gamut->done->count() / $gamut->work_orders->count() *100)}}%;"
                                                 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span class="font-weight-bolder text-dark">{{($gamut->done->count() / $gamut->work_orders->count() *100)}}%</span>
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
                                <span class="text-dark-50 font-weight-bold">0</span></span>
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
                                <a class="nav-link" data-toggle="tab" href="#kt_apps_projects_view_tab_3">
                                <span class="nav-icon mr-2">
                                    <span class="svg-icon mr-3">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Devices/Display1.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                             viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path
                                                    d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z"
                                                    fill="#000000" opacity="0.3" />
                                                <path
                                                    d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z"
                                                    fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </span>
                                    <span class="nav-text font-weight-bold">Access Control</span>
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
                            <form class="form">
                                <div class="row">
                                    <div class="col-lg-9 col-xl-6 offset-xl-3">
                                        <h3 class="font-size-h6 mb-5">Project Info:</h3>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Project Name</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                               value="Nick" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Project Owner</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                               value="Bold" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Customer Name</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <input class="form-control form-control-lg form-control-solid" type="text"
                                               value="Loop Inc." />
                                        <span class="form-text text-muted">If you want your invoices addressed to a company.
                                        Leave blank to use your full name.</span>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <!--begin::Heading-->
                                <div class="row">
                                    <div class="col-lg-9 col-xl-6 offset-xl-3">
                                        <h3 class="font-size-h6 mb-5">Contact Info:</h3>
                                    </div>
                                </div>
                                <!--end::Heading-->
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Contact Phone</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-phone"></i>
                                            </span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                   value="+35278953712" placeholder="Phone" />
                                        </div>
                                        <span class="form-text text-muted">We'll never share your email with anyone
                                        else.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Email Address</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-at"></i>
                                            </span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                   value="nick.bold@loop.com" placeholder="Email" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Company Site</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                   placeholder="Username" value="loop" />
                                            <div class="input-group-append">
                                                <span class="input-group-text">.com</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!--end::Tab Content-->
                        <!--begin::Tab Content-->
                        <div class="tab-pane" id="kt_apps_projects_view_tab_3" role="tabpanel">
                            <form class="form">
                                <div class="row">
                                    <div class="col-lg-9 col-xl-6 offset-xl-3">
                                        <!--begin::Notice-->
                                        <div class="alert alert-custom alert-light-danger fade show mb-9" role="alert">
                                            <div class="alert-icon">
                                                <i class="flaticon-warning"></i>
                                            </div>
                                            <div class="alert-text">Configure user passwords to expire periodically.
                                                <br />Users will need warning that their passwords are going to expire,
                                                or they might inadvertently get locked out of the system!
                                            </div>
                                            <div class="alert-close">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">
                                                    <i class="ki ki-close"></i>
                                                </span>
                                                </button>
                                            </div>
                                        </div>
                                        <!--end::Notice-->
                                    </div>
                                </div>
                                <!--begin::Heading-->
                                <div class="row">
                                    <div class="col-lg-9 col-xl-6 offset-xl-3">
                                        <h3 class="font-size-h6 mb-5">Account:</h3>
                                    </div>
                                </div>
                                <!--end::Heading-->
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Username</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="spinner spinner-sm spinner-success spinner-right">
                                            <input class="form-control form-control-lg form-control-solid" type="text"
                                                   value="nick84" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Email Address</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="input-group input-group-lg input-group-solid">
                                            <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="la la-at"></i>
                                            </span>
                                            </div>
                                            <input type="text" class="form-control form-control-lg form-control-solid"
                                                   value="nick.watson@loop.com" placeholder="Email" />
                                        </div>
                                        <span class="form-text text-muted">Email will not be publicly displayed.
                                        <a href="#">Learn more</a>.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Language</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control form-control-lg form-control-solid">
                                            <option>Select Language...</option>
                                            <option value="id">Bahasa Indonesia - Indonesian</option>
                                            <option value="msa">Bahasa Melayu - Malay</option>
                                            <option value="ca">Català - Catalan</option>
                                            <option value="cs">Čeština - Czech</option>
                                            <option value="da">Dansk - Danish</option>
                                            <option value="de">Deutsch - German</option>
                                            <option value="en" selected="selected">English</option>
                                            <option value="en-gb">English UK - British English</option>
                                            <option value="es">Español - Spanish</option>
                                            <option value="eu">Euskara - Basque (beta)</option>
                                            <option value="fil">Filipino</option>
                                            <option value="fr">Français - French</option>
                                            <option value="ga">Gaeilge - Irish (beta)</option>
                                            <option value="gl">Galego - Galician (beta)</option>
                                            <option value="hr">Hrvatski - Croatian</option>
                                            <option value="it">Italiano - Italian</option>
                                            <option value="hu">Magyar - Hungarian</option>
                                            <option value="nl">Nederlands - Dutch</option>
                                            <option value="no">Norsk - Norwegian</option>
                                            <option value="pl">Polski - Polish</option>
                                            <option value="pt">Português - Portuguese</option>
                                            <option value="ro">Română - Romanian</option>
                                            <option value="sk">Slovenčina - Slovak</option>
                                            <option value="fi">Suomi - Finnish</option>
                                            <option value="sv">Svenska - Swedish</option>
                                            <option value="vi">Tiếng Việt - Vietnamese</option>
                                            <option value="tr">Türkçe - Turkish</option>
                                            <option value="el">Ελληνικά - Greek</option>
                                            <option value="bg">Български език - Bulgarian</option>
                                            <option value="ru">Русский - Russian</option>
                                            <option value="sr">Српски - Serbian</option>
                                            <option value="uk">Українська мова - Ukrainian</option>
                                            <option value="he">עִבְרִית - Hebrew</option>
                                            <option value="ur">اردو - Urdu (beta)</option>
                                            <option value="ar">العربية - Arabic</option>
                                            <option value="fa">فارسی - Persian</option>
                                            <option value="mr">मराठी - Marathi</option>
                                            <option value="hi">हिन्दी - Hindi</option>
                                            <option value="bn">বাংলা - Bangla</option>
                                            <option value="gu">ગુજરાતી - Gujarati</option>
                                            <option value="ta">தமிழ் - Tamil</option>
                                            <option value="kn">ಕನ್ನಡ - Kannada</option>
                                            <option value="th">ภาษาไทย - Thai</option>
                                            <option value="ko">한국어 - Korean</option>
                                            <option value="ja">日本語 - Japanese</option>
                                            <option value="zh-cn">简体中文 - Simplified Chinese</option>
                                            <option value="zh-tw">繁體中文 - Traditional Chinese</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Time Zone</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <select class="form-control form-control-lg form-control-solid">
                                            <option data-offset="-39600" value="International Date Line West">
                                                (GMT-11:00) International Date Line West
                                            </option>
                                            <option data-offset="-39600" value="Midway Island">(GMT-11:00) Midway
                                                Island
                                            </option>
                                            <option data-offset="-39600" value="Samoa">(GMT-11:00) Samoa</option>
                                            <option data-offset="-36000" value="Hawaii">(GMT-10:00) Hawaii</option>
                                            <option data-offset="-28800" value="Alaska">(GMT-08:00) Alaska</option>
                                            <option data-offset="-25200" value="Pacific Time (US &amp; Canada)">
                                                (GMT-07:00) Pacific Time (US &amp; Canada)
                                            </option>
                                            <option data-offset="-25200" value="Tijuana">(GMT-07:00) Tijuana</option>
                                            <option data-offset="-25200" value="Arizona">(GMT-07:00) Arizona</option>
                                            <option data-offset="-21600" value="Mountain Time (US &amp; Canada)">
                                                (GMT-06:00) Mountain Time (US &amp; Canada)
                                            </option>
                                            <option data-offset="-21600" value="Chihuahua">(GMT-06:00) Chihuahua
                                            </option>
                                            <option data-offset="-21600" value="Mazatlan">(GMT-06:00) Mazatlan</option>
                                            <option data-offset="-21600" value="Saskatchewan">(GMT-06:00) Saskatchewan
                                            </option>
                                            <option data-offset="-21600" value="Central America">(GMT-06:00) Central
                                                America
                                            </option>
                                            <option data-offset="-18000" value="Central Time (US &amp; Canada)">
                                                (GMT-05:00) Central Time (US &amp; Canada)
                                            </option>
                                            <option data-offset="-18000" value="Guadalajara">(GMT-05:00) Guadalajara
                                            </option>
                                            <option data-offset="-18000" value="Mexico City">(GMT-05:00) Mexico City
                                            </option>
                                            <option data-offset="-18000" value="Monterrey">(GMT-05:00) Monterrey
                                            </option>
                                            <option data-offset="-18000" value="Bogota">(GMT-05:00) Bogota</option>
                                            <option data-offset="-18000" value="Lima">(GMT-05:00) Lima</option>
                                            <option data-offset="-18000" value="Quito">(GMT-05:00) Quito</option>
                                            <option data-offset="-14400" value="Eastern Time (US &amp; Canada)">
                                                (GMT-04:00) Eastern Time (US &amp; Canada)
                                            </option>
                                            <option data-offset="-14400" value="Indiana (East)">(GMT-04:00) Indiana
                                                (East)
                                            </option>
                                            <option data-offset="-14400" value="Caracas">(GMT-04:00) Caracas</option>
                                            <option data-offset="-14400" value="La Paz">(GMT-04:00) La Paz</option>
                                            <option data-offset="-14400" value="Georgetown">(GMT-04:00) Georgetown
                                            </option>
                                            <option data-offset="-10800" value="Atlantic Time (Canada)">(GMT-03:00)
                                                Atlantic Time (Canada)
                                            </option>
                                            <option data-offset="-10800" value="Santiago">(GMT-03:00) Santiago</option>
                                            <option data-offset="-10800" value="Brasilia">(GMT-03:00) Brasilia</option>
                                            <option data-offset="-10800" value="Buenos Aires">(GMT-03:00) Buenos Aires
                                            </option>
                                            <option data-offset="-9000" value="Newfoundland">(GMT-02:30) Newfoundland
                                            </option>
                                            <option data-offset="-7200" value="Greenland">(GMT-02:00) Greenland</option>
                                            <option data-offset="-7200" value="Mid-Atlantic">(GMT-02:00) Mid-Atlantic
                                            </option>
                                            <option data-offset="-3600" value="Cape Verde Is.">(GMT-01:00) Cape Verde
                                                Is.
                                            </option>
                                            <option data-offset="0" value="Azores">(GMT) Azores</option>
                                            <option data-offset="0" value="Monrovia">(GMT) Monrovia</option>
                                            <option data-offset="0" value="UTC">(GMT) UTC</option>
                                            <option data-offset="3600" value="Dublin">(GMT+01:00) Dublin</option>
                                            <option data-offset="3600" value="Edinburgh">(GMT+01:00) Edinburgh</option>
                                            <option data-offset="3600" value="Lisbon">(GMT+01:00) Lisbon</option>
                                            <option data-offset="3600" value="London">(GMT+01:00) London</option>
                                            <option data-offset="3600" value="Casablanca">(GMT+01:00) Casablanca
                                            </option>
                                            <option data-offset="3600" value="West Central Africa">(GMT+01:00) West
                                                Central Africa
                                            </option>
                                            <option data-offset="7200" value="Belgrade">(GMT+02:00) Belgrade</option>
                                            <option data-offset="7200" value="Bratislava">(GMT+02:00) Bratislava
                                            </option>
                                            <option data-offset="7200" value="Budapest">(GMT+02:00) Budapest</option>
                                            <option data-offset="7200" value="Ljubljana">(GMT+02:00) Ljubljana</option>
                                            <option data-offset="7200" value="Prague">(GMT+02:00) Prague</option>
                                            <option data-offset="7200" value="Sarajevo">(GMT+02:00) Sarajevo</option>
                                            <option data-offset="7200" value="Skopje">(GMT+02:00) Skopje</option>
                                            <option data-offset="7200" value="Warsaw">(GMT+02:00) Warsaw</option>
                                            <option data-offset="7200" value="Zagreb">(GMT+02:00) Zagreb</option>
                                            <option data-offset="7200" value="Brussels">(GMT+02:00) Brussels</option>
                                            <option data-offset="7200" value="Copenhagen">(GMT+02:00) Copenhagen
                                            </option>
                                            <option data-offset="7200" value="Madrid">(GMT+02:00) Madrid</option>
                                            <option data-offset="7200" value="Paris">(GMT+02:00) Paris</option>
                                            <option data-offset="7200" value="Amsterdam">(GMT+02:00) Amsterdam</option>
                                            <option data-offset="7200" value="Berlin">(GMT+02:00) Berlin</option>
                                            <option data-offset="7200" value="Bern">(GMT+02:00) Bern</option>
                                            <option data-offset="7200" value="Rome">(GMT+02:00) Rome</option>
                                            <option data-offset="7200" value="Stockholm">(GMT+02:00) Stockholm</option>
                                            <option data-offset="7200" value="Vienna">(GMT+02:00) Vienna</option>
                                            <option data-offset="7200" value="Cairo">(GMT+02:00) Cairo</option>
                                            <option data-offset="7200" value="Harare">(GMT+02:00) Harare</option>
                                            <option data-offset="7200" value="Pretoria">(GMT+02:00) Pretoria</option>
                                            <option data-offset="10800" value="Bucharest">(GMT+03:00) Bucharest</option>
                                            <option data-offset="10800" value="Helsinki">(GMT+03:00) Helsinki</option>
                                            <option data-offset="10800" value="Kiev">(GMT+03:00) Kiev</option>
                                            <option data-offset="10800" value="Kyiv">(GMT+03:00) Kyiv</option>
                                            <option data-offset="10800" value="Riga">(GMT+03:00) Riga</option>
                                            <option data-offset="10800" value="Sofia">(GMT+03:00) Sofia</option>
                                            <option data-offset="10800" value="Tallinn">(GMT+03:00) Tallinn</option>
                                            <option data-offset="10800" value="Vilnius">(GMT+03:00) Vilnius</option>
                                            <option data-offset="10800" value="Athens">(GMT+03:00) Athens</option>
                                            <option data-offset="10800" value="Istanbul">(GMT+03:00) Istanbul</option>
                                            <option data-offset="10800" value="Minsk">(GMT+03:00) Minsk</option>
                                            <option data-offset="10800" value="Jerusalem">(GMT+03:00) Jerusalem</option>
                                            <option data-offset="10800" value="Moscow">(GMT+03:00) Moscow</option>
                                            <option data-offset="10800" value="St. Petersburg">(GMT+03:00) St.
                                                Petersburg
                                            </option>
                                            <option data-offset="10800" value="Volgograd">(GMT+03:00) Volgograd</option>
                                            <option data-offset="10800" value="Kuwait">(GMT+03:00) Kuwait</option>
                                            <option data-offset="10800" value="Riyadh">(GMT+03:00) Riyadh</option>
                                            <option data-offset="10800" value="Nairobi">(GMT+03:00) Nairobi</option>
                                            <option data-offset="10800" value="Baghdad">(GMT+03:00) Baghdad</option>
                                            <option data-offset="14400" value="Abu Dhabi">(GMT+04:00) Abu Dhabi</option>
                                            <option data-offset="14400" value="Muscat">(GMT+04:00) Muscat</option>
                                            <option data-offset="14400" value="Baku">(GMT+04:00) Baku</option>
                                            <option data-offset="14400" value="Tbilisi">(GMT+04:00) Tbilisi</option>
                                            <option data-offset="14400" value="Yerevan">(GMT+04:00) Yerevan</option>
                                            <option data-offset="16200" value="Tehran">(GMT+04:30) Tehran</option>
                                            <option data-offset="16200" value="Kabul">(GMT+04:30) Kabul</option>
                                            <option data-offset="18000" value="Ekaterinburg">(GMT+05:00) Ekaterinburg
                                            </option>
                                            <option data-offset="18000" value="Islamabad">(GMT+05:00) Islamabad</option>
                                            <option data-offset="18000" value="Karachi">(GMT+05:00) Karachi</option>
                                            <option data-offset="18000" value="Tashkent">(GMT+05:00) Tashkent</option>
                                            <option data-offset="19800" value="Chennai">(GMT+05:30) Chennai</option>
                                            <option data-offset="19800" value="Kolkata">(GMT+05:30) Kolkata</option>
                                            <option data-offset="19800" value="Mumbai">(GMT+05:30) Mumbai</option>
                                            <option data-offset="19800" value="New Delhi">(GMT+05:30) New Delhi</option>
                                            <option data-offset="19800" value="Sri Jayawardenepura">(GMT+05:30) Sri
                                                Jayawardenepura
                                            </option>
                                            <option data-offset="20700" value="Kathmandu">(GMT+05:45) Kathmandu</option>
                                            <option data-offset="21600" value="Astana">(GMT+06:00) Astana</option>
                                            <option data-offset="21600" value="Dhaka">(GMT+06:00) Dhaka</option>
                                            <option data-offset="21600" value="Almaty">(GMT+06:00) Almaty</option>
                                            <option data-offset="21600" value="Urumqi">(GMT+06:00) Urumqi</option>
                                            <option data-offset="23400" value="Rangoon">(GMT+06:30) Rangoon</option>
                                            <option data-offset="25200" value="Novosibirsk">(GMT+07:00) Novosibirsk
                                            </option>
                                            <option data-offset="25200" value="Bangkok">(GMT+07:00) Bangkok</option>
                                            <option data-offset="25200" value="Hanoi">(GMT+07:00) Hanoi</option>
                                            <option data-offset="25200" value="Jakarta">(GMT+07:00) Jakarta</option>
                                            <option data-offset="25200" value="Krasnoyarsk">(GMT+07:00) Krasnoyarsk
                                            </option>
                                            <option data-offset="28800" value="Beijing">(GMT+08:00) Beijing</option>
                                            <option data-offset="28800" value="Chongqing">(GMT+08:00) Chongqing</option>
                                            <option data-offset="28800" value="Hong Kong">(GMT+08:00) Hong Kong</option>
                                            <option data-offset="28800" value="Kuala Lumpur">(GMT+08:00) Kuala Lumpur
                                            </option>
                                            <option data-offset="28800" value="Singapore">(GMT+08:00) Singapore</option>
                                            <option data-offset="28800" value="Taipei">(GMT+08:00) Taipei</option>
                                            <option data-offset="28800" value="Perth">(GMT+08:00) Perth</option>
                                            <option data-offset="28800" value="Irkutsk">(GMT+08:00) Irkutsk</option>
                                            <option data-offset="28800" value="Ulaan Bataar">(GMT+08:00) Ulaan Bataar
                                            </option>
                                            <option data-offset="32400" value="Seoul">(GMT+09:00) Seoul</option>
                                            <option data-offset="32400" value="Osaka">(GMT+09:00) Osaka</option>
                                            <option data-offset="32400" value="Sapporo">(GMT+09:00) Sapporo</option>
                                            <option data-offset="32400" value="Tokyo">(GMT+09:00) Tokyo</option>
                                            <option data-offset="32400" value="Yakutsk">(GMT+09:00) Yakutsk</option>
                                            <option data-offset="34200" value="Darwin">(GMT+09:30) Darwin</option>
                                            <option data-offset="34200" value="Adelaide">(GMT+09:30) Adelaide</option>
                                            <option data-offset="36000" value="Canberra">(GMT+10:00) Canberra</option>
                                            <option data-offset="36000" value="Melbourne">(GMT+10:00) Melbourne</option>
                                            <option data-offset="36000" value="Sydney">(GMT+10:00) Sydney</option>
                                            <option data-offset="36000" value="Brisbane">(GMT+10:00) Brisbane</option>
                                            <option data-offset="36000" value="Hobart">(GMT+10:00) Hobart</option>
                                            <option data-offset="36000" value="Vladivostok">(GMT+10:00) Vladivostok
                                            </option>
                                            <option data-offset="36000" value="Guam">(GMT+10:00) Guam</option>
                                            <option data-offset="36000" value="Port Moresby">(GMT+10:00) Port Moresby
                                            </option>
                                            <option data-offset="36000" value="Solomon Is.">(GMT+10:00) Solomon Is.
                                            </option>
                                            <option data-offset="39600" value="Magadan">(GMT+11:00) Magadan</option>
                                            <option data-offset="39600" value="New Caledonia">(GMT+11:00) New
                                                Caledonia
                                            </option>
                                            <option data-offset="43200" value="Fiji">(GMT+12:00) Fiji</option>
                                            <option data-offset="43200" value="Kamchatka">(GMT+12:00) Kamchatka</option>
                                            <option data-offset="43200" value="Marshall Is.">(GMT+12:00) Marshall Is.
                                            </option>
                                            <option data-offset="43200" value="Auckland">(GMT+12:00) Auckland</option>
                                            <option data-offset="43200" value="Wellington">(GMT+12:00) Wellington
                                            </option>
                                            <option data-offset="46800" value="Nuku'alofa">(GMT+13:00) Nuku'alofa
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row align-items-center mb-0">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Communication</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="checkbox-inline">
                                            <label class="checkbox">
                                                <input type="checkbox" />
                                                <span></span>Email</label>
                                            <label class="checkbox">
                                                <input type="checkbox" />
                                                <span></span>SMS</label>
                                            <label class="checkbox">
                                                <input type="checkbox" />
                                                <span></span>Phone</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <!--begin::Heading-->
                                <div class="row">
                                    <div class="col-lg-9 col-xl-6 offset-xl-3">
                                        <h3 class="font-size-h6 mb-5">Security:</h3>
                                    </div>
                                </div>
                                <!--end::Heading-->
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Login
                                        verification</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <button type="button" class="btn btn-light-primary font-weight-bold btn-sm">
                                            Setup login verification
                                        </button>
                                        <span class="form-text text-muted">After you log in, you will be asked for
                                        additional information to confirm your identity and protect your account from
                                        being compromised.
                                        <a href="#">Learn more</a>.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Password reset
                                        verification</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="checkbox-inline">
                                            <label class="checkbox">
                                                <input type="checkbox" />
                                                <span></span>Require personal information to reset your password</label>
                                        </div>
                                        <span class="form-text text-muted">For extra security, this requires you to confirm
                                        your email or phone number when you reset your password.
                                        <a href="#">Learn more</a>.</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right"></label>
                                    <div class="col-lg-9 col-xl-6">
                                        <button type="button" class="btn btn-light-danger font-weight-bold btn-sm">
                                            Deactivate your account ?
                                        </button>
                                    </div>
                                </div>
                            </form>
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
                                        <h3 class="font-size-h6 mb-5">Activity Related Emails:</h3>
                                    </div>
                                </div>
                                <!--end::Heading-->
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">When To Email</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="checkbox-list">
                                            <label class="checkbox">
                                                <input type="checkbox" />
                                                <span></span>You have new notifications</label>
                                            <label class="checkbox">
                                                <input type="checkbox" />
                                                <span></span>You're sent a direct message</label>
                                            <label class="checkbox">
                                                <input type="checkbox" checked="checked" />
                                                <span></span>Someone adds you as a connection</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">When To Escalate
                                        Emails</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="checkbox-list">
                                            <label class="checkbox">
                                                <input type="checkbox" />
                                                <span></span>Upon new order</label>
                                            <label class="checkbox">
                                                <input type="checkbox" />
                                                <span></span>New membership approval</label>
                                            <label class="checkbox">
                                                <input type="checkbox" checked="checked" />
                                                <span></span>Member registration</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-10"></div>
                                <!--begin::Heading-->
                                <div class="row">
                                    <div class="col-lg-9 col-xl-6 offset-xl-3">
                                        <h3 class="font-size-h6 mb-5">Updates From Keenthemes:</h3>
                                    </div>
                                </div>
                                <!--end::Heading-->
                                <div class="form-group row">
                                    <label class="col-xl-3 col-lg-3 col-form-label text-right">Email You With</label>
                                    <div class="col-lg-9 col-xl-6">
                                        <div class="checkbox-list">
                                            <label class="checkbox">
                                                <input type="checkbox" />
                                                <span></span>News about Metronic product and feature updates</label>
                                            <label class="checkbox">
                                                <input type="checkbox" />
                                                <span></span>Tips on getting more out of Keen</label>
                                            <label class="checkbox">
                                                <input type="checkbox" checked="checked" />
                                                <span></span>Things you missed since you last logged into Keen</label>
                                            <label class="checkbox">
                                                <input type="checkbox" checked="checked" />
                                                <span></span>News about Metronic on partner products and other
                                                services</label>
                                            <label class="checkbox">
                                                <input type="checkbox" checked="checked" />
                                                <span></span>Tips on Metronic business products</label>
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
                                    <textarea name="description" class="form-control form-control-lg form-control-solid"
                                              id="exampleTextarea" rows="3" placeholder="Type notes"></textarea>
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
                                                <i class="flaticon2-layers text-warning"></i>
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
                                                <p class="p-0">{{$task->description}}</p>
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

@stop

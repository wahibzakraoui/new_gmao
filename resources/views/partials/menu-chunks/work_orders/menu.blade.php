<li class="menu-item menu-item-submenu {{ Route::currentRouteName() == 'work_orders' || Route::currentRouteName() == 'add-work_order' || Route::currentRouteName() == 'work_orders-finished' ? 'menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Tools\Tools.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M15.9497475,3.80761184 L13.0246125,6.73274681 C12.2435639,7.51379539 12.2435639,8.78012535 13.0246125,9.56117394 L14.4388261,10.9753875 C15.2198746,11.7564361 16.4862046,11.7564361 17.2672532,10.9753875 L20.1923882,8.05025253 C20.7341101,10.0447871 20.2295941,12.2556873 18.674559,13.8107223 C16.8453326,15.6399488 14.1085592,16.0155296 11.8839934,14.9444337 L6.75735931,20.0710678 C5.97631073,20.8521164 4.70998077,20.8521164 3.92893219,20.0710678 C3.1478836,19.2900192 3.1478836,18.0236893 3.92893219,17.2426407 L9.05556629,12.1160066 C7.98447038,9.89144078 8.36005124,7.15466739 10.1892777,5.32544095 C11.7443127,3.77040588 13.9552129,3.26588995 15.9497475,3.80761184 Z" fill="#000000"/>
        <path d="M16.6568542,5.92893219 L18.0710678,7.34314575 C18.4615921,7.73367004 18.4615921,8.36683502 18.0710678,8.75735931 L16.6913928,10.1370344 C16.3008685,10.5275587 15.6677035,10.5275587 15.2771792,10.1370344 L13.8629656,8.7228208 C13.4724413,8.33229651 13.4724413,7.69913153 13.8629656,7.30860724 L15.2426407,5.92893219 C15.633165,5.5384079 16.26633,5.5384079 16.6568542,5.92893219 Z" fill="#000000" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span>
        </span>
        <span class="menu-text">Work Orders</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link">
                    <span class="menu-text">Work Orders</span>
                </span>
            </li>
            <li class="menu-item {{ Route::currentRouteName() == 'work_orders' ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{route('work_orders')}}" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                    </i>
                    <span class="menu-text text-hover-dark-50">Active WOs <i class="flaticon2-bell-5 text-success text-hover-dark-50 ml-2"></i></span>
                </a>
            </li>
            <li class="menu-item {{ Route::currentRouteName() == 'work_orders-finished' ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{route('work_orders-finished')}}" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                    </i>
                    <span class="menu-text">Archived WOs<i class="flaticon2-folder text-info text-hover-dark-50 ml-2"></i></span>
                </a>
            </li>
            <li class="menu-item {{ Route::currentRouteName() == 'add-work_order' ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{route('add-work_order')}}" class="menu-link">
                    <i class="menu-bullet menu-bullet-dot">
                        <span></span>
                    </i>
                    <span class="menu-text">Add Work Order</span>
                </a>
            </li>
        </ul>
    </div>
</li>

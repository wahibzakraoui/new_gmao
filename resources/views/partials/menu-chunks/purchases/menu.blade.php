<li class="menu-section">
    <h4 class="menu-text">Purchasing</h4>
    <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
</li>
<li class="menu-item menu-item-submenu {{ Route::currentRouteName() == 'archived-purchases' || Route::currentRouteName() == 'purchases' || Route::currentRouteName() == 'add-purchase' || Route::currentRouteName() == 'pending-purchases' || Route::currentRouteName() == 'consulting-purchases' || Route::currentRouteName() == 'pending-delivery-purchases' ? 'menu-item-open' : '' }}" aria-haspopup="true" data-menu-toggle="hover">
    <a href="javascript:;" class="menu-link menu-toggle">
        <span class="svg-icon menu-icon">
        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Cart1.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M18.1446364,11.84388 L17.4471627,16.0287218 C17.4463569,16.0335568 17.4455155,16.0383857 17.4446387,16.0432083 C17.345843,16.5865846 16.8252597,16.9469884 16.2818833,16.8481927 L4.91303792,14.7811299 C4.53842737,14.7130189 4.23500006,14.4380834 4.13039941,14.0719812 L2.30560137,7.68518803 C2.28007524,7.59584656 2.26712532,7.50338343 2.26712532,7.4104669 C2.26712532,6.85818215 2.71484057,6.4104669 3.26712532,6.4104669 L16.9929851,6.4104669 L17.606173,3.78251876 C17.7307772,3.24850086 18.2068633,2.87071314 18.7552257,2.87071314 L20.8200821,2.87071314 C21.4717328,2.87071314 22,3.39898039 22,4.05063106 C22,4.70228173 21.4717328,5.23054898 20.8200821,5.23054898 L19.6915238,5.23054898 L18.1446364,11.84388 Z" fill="#000000" opacity="0.3"/>
        <path d="M6.5,21 C5.67157288,21 5,20.3284271 5,19.5 C5,18.6715729 5.67157288,18 6.5,18 C7.32842712,18 8,18.6715729 8,19.5 C8,20.3284271 7.32842712,21 6.5,21 Z M15.5,21 C14.6715729,21 14,20.3284271 14,19.5 C14,18.6715729 14.6715729,18 15.5,18 C16.3284271,18 17,18.6715729 17,19.5 C17,20.3284271 16.3284271,21 15.5,21 Z" fill="#000000"/>
    </g>
</svg><!--end::Svg Icon--></span>
        </span>
        <span class="menu-text">Purchases</span>
        <i class="menu-arrow"></i>
    </a>
    <div class="menu-submenu">
        <i class="menu-arrow"></i>
        <ul class="menu-subnav">
            <li class="menu-item menu-item-parent" aria-haspopup="true">
                <span class="menu-link">
                    <span class="menu-text">Purchases</span>
                </span>
            </li>
            <li class="menu-item {{ Route::currentRouteName() == 'pending-purchases' ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{route('pending-purchases')}}" class="menu-link">
                    <i class="menu-bullet fas fa-shopping-cart text-danger mr-5">
                        <span></span>
                    </i>
                    <span class="menu-text">Pending Purchases</span>
                </a>
            </li>
            <li class="menu-item {{ Route::currentRouteName() == 'purchases' ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{route('purchases')}}" class="menu-link">
                    <i class="menu-bullet fas fa-shopping-cart text-info mr-5">
                        <span></span>
                    </i>
                    <span class="menu-text">Confirmed Purchases</span>
                </a>
            </li>
            <li class="menu-item {{ Route::currentRouteName() == 'consulting-purchases' ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{route('consulting-purchases')}}" class="menu-link">
                    <i class="menu-bullet fas fa-shopping-cart text-warning mr-5">
                        <span></span>
                    </i>
                    <span class="menu-text">In Quotation</span>
                </a>
            </li>
            <li class="menu-item {{ Route::currentRouteName() == 'pending-delivery-purchases' ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{route('pending-delivery-purchases')}}" class="menu-link">
                    <i class="menu-bullet fas fa-shopping-cart text-success mr-5">
                        <span></span>
                    </i>
                    <span class="menu-text">Pending Delivery</span>
                </a>
            </li>
            <li class="menu-item {{ Route::currentRouteName() == 'archived-purchases' ? 'menu-item-active' : '' }}" aria-haspopup="true">
                <a href="{{route('pending-delivery-purchases')}}" class="menu-link">
                    <i class="menu-bullet fas fa-shopping-cart text-primary mr-5">
                        <span></span>
                    </i>
                    <span class="menu-text">Archived</span>
                </a>
            </li>
        </ul>
    </div>
</li>

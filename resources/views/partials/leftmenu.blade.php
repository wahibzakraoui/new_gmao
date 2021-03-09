<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div
        id="kt_aside_menu"
        class="aside-menu my-4"
        data-menu-vertical="1"
        data-menu-scroll="1"
        data-menu-dropdown-timeout="500"
    >
        <!--begin::Menu Nav-->
        <ul class="menu-nav">
            @include('partials.menu-chunks.dashboard.menu')
            @can('add factories')
                @include('partials.menu-chunks.factories.menu')
            @endcan
            @can('add areas')
                @include('partials.menu-chunks.areas.menu')
            @endcan
            @can('add equipments')
                @include('partials.menu-chunks.equipments.menu')
            @endcan
            @can('add parts')
                @include('partials.menu-chunks.parts.menu')
            @endcan
            @can('add gamuts')
                @include('partials.menu-chunks.gamuts.menu')
            @endcan
            @can('view work_orders')
                @include('partials.menu-chunks.work_orders.menu')
            @endcan
            @can('manage users')
                @include('partials.menu-chunks.users.menu')
            @endcan
            <!--end::Menu Nav-->
        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>

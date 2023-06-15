@inject('layoutHelper', 'JeroenNoten\LaravelAdminLte\Helpers\LayoutHelper')

@php( $dashboard_url = View::getSection('dashboard_url') ?? config('adminlte.dashboard_url', 'home') )

@if (config('adminlte.use_route_url', false))
    @php( $dashboard_url = $dashboard_url ? route($dashboard_url) : '' )
@else
    @php( $dashboard_url = $dashboard_url ? url($dashboard_url) : '' )
@endif

<a href="{{ $dashboard_url }}"
    @if($layoutHelper->isLayoutTopnavEnabled())
        class="navbar-brand {{ config('adminlte.classes_brand') }}"
    @else
        class="brand-link {{ config('adminlte.classes_brand') }}"
    @endif>

    {{-- Small brand logo --}}
    <img src="{{ asset(config('adminlte.logo_img', 'vendor/adminlte/dist/img/AdminLTELogo.png')) }}"
         alt="{{ config('adminlte.logo_img_alt', 'AdminLTE') }}"
         class="{{ config('adminlte.logo_img_class', 'brand-image img-circle elevation-3') }}"
         style="opacity:.8">

    {{-- Brand text --}}
    <span class="brand-text font-weight-light {{ config('adminlte.classes_brand_text') }}">
        {!! config('adminlte.logo', '<b>Admin</b>LTE') !!}

        @if(auth()->user()->role == 'admin')
            {!! config('adminlte.logo1', '<b>Admin</b>LTE') !!}
        @elseif(auth()->user()->role == 'doctor')
            {!! config('adminlte.logo2', '<b>Admin</b>LTE') !!}
        @elseif(auth()->user()->role == 'nurse')
            {!! config('adminlte.logo3', '<b>Admin</b>LTE') !!}
        @elseif(auth()->user()->role == 'dentist')
            {!! config('adminlte.logo4', '<b>Admin</b>LTE') !!}
        @elseif(auth()->user()->role == 'faculty')
            {!! config('adminlte.logo5', '<b>Admin</b>LTE') !!}
        @elseif(auth()->user()->role == 'student')
            {!! config('adminlte.logo6', '<b>Admin</b>LTE') !!}
        @endif
    </span>

</a>

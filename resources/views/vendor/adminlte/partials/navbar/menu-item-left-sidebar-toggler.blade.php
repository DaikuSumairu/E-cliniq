<li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#"
        @if(config('adminlte.sidebar_collapse_remember'))
            data-enable-remember="true"
        @endif
        @if(!config('adminlte.sidebar_collapse_remember_no_transition'))
            data-no-transition-after-reload="false"
        @endif
        @if(config('adminlte.sidebar_collapse_auto_size'))
            data-auto-collapse-size="{{ config('adminlte.sidebar_collapse_auto_size') }}"
        @endif
        
        @if(auth()->user()->role == 'admin')
            style="color: white;"
        @elseif(auth()->user()->role == 'doctor')
            style="color: white;"
        @elseif(auth()->user()->role == 'nurse')
            style="color: white;"
        @elseif(auth()->user()->role == 'dentist')
            style="color: white;"
        @elseif(auth()->user()->role == 'faculty')
            style="color: white;"
        @endif>
        <i class="fas fa-bars"></i>
        <span class="sr-only">{{ __('adminlte::adminlte.toggle_navigation') }}</span>
    </a>
</li>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
    @include('theme.admin.head')
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
    {{-- Nav --}}
        @include('theme.admin.navbar')
    {{-- Nav End --}}

    <!-- BEGIN: Main Menu-->
    
    <!-- END: Main Menu-->
      @include('theme.admin.sidebar')
    <!-- BEGIN: Content-->
    @yield('content')

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
      @include('theme.admin.script')
    <!-- END: Footer-->

  </body>
  <!-- END: Body-->
</html>
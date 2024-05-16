@include('layouts.header')
<!-- Page content -->
<div class="page-content">
    @include('layouts.navbar')
    @include('layouts.sidebar')
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Content area -->
        <div class="content" style="margin-top: 70px;">
            @yield('main')
        </div>
        <!-- /content area -->
        @include('layouts.footer')
    </div>
    <!-- /Main content -->
</div>
<!-- /page content -->

<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->
@include('partial.admin.head')
<!-- END: Head -->
<body class="py-5 md:py-0 bg-black/[0.15] dark:bg-transparent">
<!-- BEGIN: Mobile Menu -->
@include('partial.admin.mobileMenu')
<!-- END: Mobile Menu -->
<div class="flex mt-[4.7rem] md:mt-0 overflow-hidden">
    <!-- BEGIN: Side Menu -->
  @include('partial.admin.sidebar')
    <!-- END: Side Menu -->
    <!-- BEGIN: Content -->
    <div class="content">
        <!-- BEGIN: Top Bar -->
     @include("partial.admin.header")
        <!-- END: Top Bar -->
        @yield("content")
    <!-- END: Content -->
</div>
<!-- BEGIN: Dark Mode Switcher-->

<!-- END: Dark Mode Switcher-->

<!-- BEGIN: JS Assets-->
@include("partial.admin.bodyJS")
<!-- END: JS Assets-->
</body>
</html>

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
<div data-url="side-menu-dark-dashboard-overview-3.html" class="dark-mode-switcher cursor-pointer shadow-md fixed bottom-0 right-0 box dark:bg-dark-2 border rounded-full w-40 h-12 flex items-center justify-center z-50 mb-10 mr-10">
    <div class="mr-4 text-gray-700 dark:text-gray-300">Dark Mode</div>
    <div class="dark-mode-switcher__toggle border"></div>
</div>
<!-- END: Dark Mode Switcher-->

<!-- BEGIN: JS Assets-->
@include("partial.admin.bodyJS")
<!-- END: JS Assets-->
</body>
</html>

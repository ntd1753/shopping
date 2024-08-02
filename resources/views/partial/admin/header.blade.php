<div class="top-bar -mx-4 px-4 md:mx-0 md:px-0">
    <!-- BEGIN: Breadcrumb -->
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page"></li>
        </ol>
    </nav>
    <!-- END: Breadcrumb -->
    <!-- BEGIN: Search -->
    <div class="intro-x relative mr-3 sm:mr-6">

    </div>
    <!-- END: Search -->
    <!-- BEGIN: Notifications -->

    <!-- END: Notifications -->
    <!-- BEGIN: Account Menu -->
    <div class="intro-x dropdown w-8 h-8">
        <div class="dropdown-toggle w-8 h-8 rounded-full overflow-hidden shadow-lg image-fit zoom-in" role="button" aria-expanded="false" data-tw-toggle="dropdown">
            <img alt="Midone - HTML Admin Template" src="{{asset("backend/dist/images/profile-5.jpg")}}">
        </div>
        <div class="dropdown-menu w-56">
            <ul class="dropdown-content bg-primary text-white">
                <li class="p-2">
                    <div class="font-medium">{{Auth::user()->name}}</div></li>
                <li>
                    <a href="" class="dropdown-item hover:bg-white/5"> <i data-lucide="lock" class="w-4 h-4 mr-2"></i> Reset Password </a>
                </li>
                <li>
                    <hr class="dropdown-divider border-white/[0.08]">
                </li>
                <li>
                    <a href="#" class="dropdown-item hover:bg-white/5" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <i data-lucide="toggle-right" class="w-4 h-4 mr-2"></i> Logout </a>
                </li>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
    <!-- END: Account Menu -->
</div>

<div class="w-full wrapper">
    <div class="header bg-[#3ba66b] ">
        <div class="middle-header relative ">
            <div class="max-w-screen-xl container	 mx-auto">
                <div class="grid grid-cols-12 items-center">
                    <div class="col-span-5 lg:w-full md:w-full sm:w-full w-full 	 header-left">
                        <div class="heade_menunavs text-center text-white">
                            <div class="wrap_main">
                                <div class="bg-header-nav">
                                    <nav class="header-nav">
                                        <ul class="grid grid-cols-5 items-center justify-center text-base 2xl:text-base lg:justify-start">
                                            <li class="nav-item">
                                                <a class="a-img hover:text-[#ffb416]" href="{{route('home')}}" title="Trang chủ">
                                                    Trang chủ
                                                </a>
                                            </li>
                                            <li class="nav-item relative">
                                                <a class="a-img caret-down mr-1 hover:text-[#ffb416]" id="dropdownHoverButton"
                                                   href="{{route('user.product.all')}}"   data-dropdown-toggle="dropdownHover" data-dropdown-trigger="hover">
                                                    Sản phẩm
                                                    <span>
                                                        <i class="fa fa-caret-down absolute top-0 right-0 mt-1"></i>
                                                    </span>
                                                </a>
                                                <div id="dropdownHover" class="z-10 hidden bg-white divide-y  shadow w-64 dark:bg-gray-700">
                                                    <ul class="py-2 text-base text-black" aria-labelledby="dropdownHoverButton">
                                                        @foreach($productCategories as $item)
                                                            <li class="hover-target relative " onmouseover="handleMouseOver({{$item->id}})"
                                                                onmouseout="handleMouseOut({{$item->id}})">
                                                                <div class="border-b-2 border-[#e5e6ec] hover:text-[#ffb416]">
                                                                    <a class="a-img caret-down mr-1 flex justify-between pt-1 pb-2 px-4"
                                                                       href="{{route('user.product.category',['slug'=>$item->slug])}}"
                                                                       {{--                                                                       data-dropdown-toggle="Dropdown-product-categories-{{$item->id}}"--}}
                                                                       data-dropdown-placement="right-start">
                                                                        <div> {!! $item->name !!} </div>
                                                                        @if(count($item->subCategories)>0)
                                                                            <div><i class="fa-solid fa-caret-right"></i></div>
                                                                        @endif

                                                                    </a>

                                                                </div>
                                                                @if(count($item->subCategories)>0)
                                                                    <div id="Dropdown-product-categories-{{$item->id}}"
                                                                         class="z-10 hidden bg-white shadow-md w-56 absolute left-64 top-0 ">
                                                                        <ul class="text-base" aria-labelledby="doubleDropdownButton">
                                                                            @foreach($item->subCategories as $subItem)
                                                                                <li>
                                                                                    <div class="border-b-2 border-[#e5e6ec] hover:text-[#ffb416]">
                                                                                        <a href="{{route('user.product.category',['slug'=>$subItem->slug])}}" class="block px-4 py-2 hover:bg-gray-100 pt-1 pb-2 px-4 ">
                                                                                            {{$subItem->name}}
                                                                                        </a>
                                                                                    </div>

                                                                                </li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </div>


                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>


                                            </li>
                                            <li class="nav-item">
                                                <a class="a-img hover:text-[#ffb416]" href="/gioi-thieu" title="Giới thiệu">
                                                    Giới thiệu
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="a-img hover:text-[#ffb416]" href="{{route('user.post.index')}}">
                                                    Blog
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="a-img hover:text-[#ffb416]" href="/lien-he" title="Liên hệ">
                                                    Liên hệ
                                                </a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-span-2 grid items-center logo_contai relative">
                        <a href="/" class="logo hidden lg:block z-20 m-auto">
                            <img class="w-[100px] h-[100px]" src="//bizweb.dktcdn.net/100/065/538/themes/838571/assets/logo.png?1708919610274" alt="Halafruit.vn">
                        </a>
                        <a href="/" class="logo block lg:hidden">
                            <img src="//bizweb.dktcdn.net/100/065/538/themes/838571/assets/logomb.png?1708919610274" alt="Halafruit.vn">
                        </a>
                        <div class="mx-auto bg-none hidden lg:block absolute bottom-[-29px] z-10">
                            <div class="affter-header mx-auto  grid-cols-12 items-center ">
                                <div class="col-span-2 m-auto"><img src="{{asset('frontend/images/afterhead.png')}}" alt=""></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-5 header-right grid grid-cols-12">
                        <div class="col-span-4"></div>
                        <div class="nd-searchs col-span-5 ">
                            <form action="{{route('user.search.index')}}" method="GET">
                                <div class="relative">
                                    <input type="text" name="query" class="relative search-auto border p-2 rounded-full"
                                           placeholder="Bạn cần tìm gì?"
                                           autocomplete="off">
                                    <input type="hidden" name="type" value="product">
                                    <button class="absolute bg-yellow-400 text-white right-6 px-3 py-2 rounded-full" type="submit" aria-label="Tìm kiếm">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </form>
                            <div class="results-box"><div class="search-results"></div></div>
                        </div>

                        <div class="header-page-link col-span-3 text-white">
                            <ul class="group-account grid grid-cols-3 text-white">
                                <li>
                                    <div class="icon text-white">
                                        <a href="/yeu-thich" class="wishlist_header flex text-white" title="Sản phẩm yêu thích">
                                            <div class="w-[25px] h-[25px] text-black text-2xl text-white">
                                                <i class="fa-regular fa-heart"></i>
                                            </div>
                                            <span class="headerWishlistCount rounded-full bg-yellow-400 text-center text-[10px] w-4 h-4">0</span>
                                        </a>
                                    </div>
                                </li>
                                <li class="cart-drop">
                                    <div class="icon">
                                        <a href="#" class="nd-header-cart flex">
                                            <div class="w-[25px] h-[25px] text-black text-2xl text-white">
                                                <button id="cart-button"
                                                    type="button" data-drawer-target="drawer-right-example"
                                                    data-drawer-show="drawer-right-example"
                                                    data-drawer-placement="right"
                                                    aria-controls="drawer-right-example">
                                                    <i class="fa-solid fa-bag-shopping"></i>
                                                </button>
                                            </div>
                                            <span id="count_cart_item" class="rounded-full bg-yellow-400  text-center text-[10px] w-4 h-4">
                                               @guest()0 @else {{ count(\Cart::getContent()->toArray())}} @endguest
                                            </span>
                                        </a>
                                    </div>
                                    <div id="drawer-right-example" class="fixed top-0 right-0 z-40 h-screen p-4 overflow-y-auto transition-transform translate-x-full bg-white w-80 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-right-label">
                                        <h5 id="drawer-right-label" class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400">
                                            Giỏ hàng    </h5>
                                        <button type="button" data-drawer-hide="drawer-right-example" aria-controls="drawer-right-example" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white" >
                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                            </svg>
                                            <span class="sr-only">Close menu</span>
                                        </button>
                                        <div id="cart-side-bar-body" class="h-5/6 overflow-y-auto ">

                                        </div>
                                        <div id="check-out-form" class="absolute bottom-0 w-11/12 py-3 bg-white">

                                        </div>
                                    </div>
                                </li>


                                <li class="user">
                                    <div id="account" class="icon  w-[25px] h-[25px]" data-dropdown-toggle="dropdownAccount" data-dropdown-trigger="hover">
                                        <a href="#" class="text-2xl text-black text-white">
                                            <i class="fa-regular fa-user"></i>
                                        </a>
                                    </div>
                                    @guest()
                                        <div id="dropdownAccount" class="z-10 hidden bg-white divide-y  shadow w-24">
                                            <ul class="text-sm text-black" aria-labelledby="account">

                                                <li class="hover-target p-1 relative border-b-2 border-[#e5e6ec] hover:text-[#ffb416] text-center">
                                                    <a href="{{route('auth.login')}}">Đăng nhập</a>
                                                </li>
                                                <li class="hover-target p-1 text-sm relative hover:text-[#ffb416] text-center">
                                                    <a href="{{route('auth.register')}}" id="logout-link">Đăng kí</a>

                                                </li>
                                            </ul>
                                        </div>
                                    @endguest
                                    @auth()
                                        <div id="dropdownAccount" class="z-10 hidden bg-white divide-y  shadow w-24">
                                            <ul class="text-sm text-black" aria-labelledby="account">

                                                <li class="hover-target p-1 relative border-b-2 border-[#e5e6ec] hover:text-[#ffb416] text-center">
                                                    <a href="#">Account</a>
                                                </li>
                                                <li class="hover-target p-1 text-sm relative hover:text-[#ffb416] text-center">
                                                    <a href="/logout" id="logout-link">Đăng xuất</a>
                                                    <form id="logout-form" action="/logout" method="POST" class="hidden">
                                                        @csrf
                                                                <button type="submit" id="logout-button">logout</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    @endauth
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div >


        </div>

    </div>
</div>

<div class="w-full wrapper">
    <div class="header bg-[#3ba66b]">
        <div class="middle-header relative">
            <div class="max-w-screen-xl lg:container	 mx-auto">
                <div class="grid grid-cols-12 items-center">
                    <div class="col-span-5 lg:w-full md:w-full sm:w-full w-full 	 header-left">
                        <div class="heade_menunavs text-center text-white">
                            <div class="wrap_main">
                                <div class="bg-header-nav">
                                    <nav class="header-nav">
                                        <ul class="grid grid-cols-5 items-center justify-center text-base lg:text-xl lg:justify-start">
                                            <li class="nav-item">
                                                <a class="a-img" href="/" title="Trang chủ">
                                                    Trang chủ
                                                </a>
                                            </li>
                                            <li class="nav-item relative">
                                                <a class="a-img caret-down mr-1" href="#" title="Sản phẩm"  data-dropdown-toggle="multi-dropdown">
                                                    Sản phẩm
                                                </a>
                                                <i class="fa fa-caret-down absolute top-0 right-0 mt-1"></i>

                                                <!-- Dropdown menu -->
                                                <div id="multi-dropdown"
                                                     class="z-10 hidden bg-white divide-y divide-gray-100 shadow w-64 text-left"
                                                     >
                                                    <ul class=" text-base text-black "
                                                        aria-labelledby="multiLevelDropdownButton"
                                                        >

                                                        @foreach($productCategories as $item)
                                                            <li class="hover-target relative " onmouseover="handleMouseOver({{$item->id}})"
                                                            onmouseout="handleMouseOut({{$item->id}})">
                                                                <div class="border-b-2 border-[#e5e6ec] hover:text-[#ffb416]">
                                                                    <a class="a-img caret-down mr-1 flex justify-between pt-1 pb-2 px-4"
                                                                       href="#" title="Sản phẩm"
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
                                                                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100 pt-1 pb-2 px-4 ">
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
                                                <a class="a-img" href="/gioi-thieu" title="Giới thiệu">
                                                    Giới thiệu
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="a-img" href="/tin-tuc" title="Blog">
                                                    Blog
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="a-img" href="/lien-he" title="Liên hệ">
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
                        <div class="mx-auto bg-none absolute bottom-[-29px] z-10">
                            <div class="affter-header mx-auto  grid-cols-12 items-center ">
                                <div class="col-span-2 m-auto"><img src="{{asset('frontend/images/afterhead.png')}}" alt=""></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-5 header-right grid grid-cols-12">
                        <div class="col-span-4"></div>
                        <div class="nd-searchs col-span-5 ">
                            <form action="#" method="get" class="nd-header-search-form has-validation-callback" role="search">
                                <div class="relative">
                                    <input type="text" name="query" class="relative search-auto border p-2 rounded-full" placeholder="Bạn cần tìm gì?" autocomplete="off">
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
                                        <a href="javascript:void(0)" class="nd-header-cart flex" aria-label="Xem giỏ hàng" title="Giỏ hàng">
                                            <div class="w-[25px] h-[25px] text-black text-2xl text-white">
                                                <i class="fa-solid fa-bag-shopping"></i>
                                            </div>
                                            <span class="count_item_pr rounded-full bg-yellow-400  text-center text-[10px] w-4 h-4">0</span>
                                        </a>
                                    </div>
                                    <div class="top-cart-content">
                                        <div class="CartHeaderContainer">
                                        </div>
                                    </div>
                                </li>


                                <li class="user">
                                    <div class="icon  w-[25px] h-[25px]">
                                        <a href="/account" class="text-2xl text-black text-white" title="Tài khoản của bạn" rel="nofollow">
                                            <i class="fa-regular fa-user"></i>
                                        </a>
                                    </div>
                                    <div class="drop-account hidden">


                                        <a href="/account/login">Đăng nhập</a>
                                        <a href="/account/register">Đăng ký</a>


                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div >


        </div>

    </div>
</div>
<script>
    function handleMouseOver(id) {
        const element = document.getElementById('Dropdown-product-categories-'+id);
        if (element) {
            // Thêm class 'block' và loại bỏ class 'hidden'
            element.classList.add('block');
            element.classList.remove('hidden');
        }
    }

    // Hàm xử lý sự kiện mouseout
    function handleMouseOut(id) {
        const element = document.getElementById('Dropdown-product-categories-'+id);
        if (element) {
            // Thêm class 'hidden' và loại bỏ class 'block'
            element.classList.add('hidden');
            element.classList.remove('block');
        }
    }

</script>

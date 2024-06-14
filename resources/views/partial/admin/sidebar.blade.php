<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4 mt-3">
        <img alt="Midone - HTML Admin Template" class="w-6" src="{{asset('backend/dist/images/logo.svg')}}">
        <span class="hidden xl:block text-white text-lg ml-3"> Tinker </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="#" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title">
                    Dashboard
                </div>
            </a>

        </li>
        <li>
            <a href="#" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
                <div class="side-menu__title">
                    Quản lí danh mục
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="{{route('admin.category.index','post')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Danh mục bài biết </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.category.index','product')}}" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Danh mục sản phẩm </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{route('admin.brand.index')}}" class="side-menu">
                <div class="side-menu__icon text-xl"> <i data-lucide="at-sign"></i> </div>
                <div class="side-menu__title"> Quản lí thương hiệu </div>
            </a>
        </li>
        <li>
            <a href="{{route('admin.product.index')}}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="shopping-bag"></i> </div>
                <div class="side-menu__title">
                    Quản lí sản phẩm
                </div>
            </a>

        </li>
        <li>
            <a href="{{route('admin.post.index')}}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="file-text"></i> </div>
                <div class="side-menu__title"> Quản lí bài viết </div>
            </a>
        </li>
        <li>
            <a href="{{route('admin.file.manager')}}" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="hard-drive"></i> </div>
                <div class="side-menu__title"> File Manager </div>
            </a>
        </li>
        <li>
            <a href="#" class="side-menu">
                <div class="side-menu__icon">  <i data-lucide="settings"></i>
                   </div>
                <div class="side-menu__title">
                    Cài Đặt
                    <div class="side-menu__sub-icon"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" icon-name="chevron-down" data-lucide="chevron-down" class="lucide lucide-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg> </div>
                </div>
            </a>
            <ul class="" style="display: none;">
                <li>
                    <a href="{{route('admin.config.edit')}}" class="side-menu">
                        <div class="side-menu__icon">
                            <i data-lucide="command"></i>
                        </div>
                        <div class="side-menu__title"> Cấu hình hệ thống </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.shop.index')}}" class="side-menu">
                        <div class="side-menu__icon">
                            <i data-lucide="map-pin"></i>
                        </div>
                        <div class="side-menu__title"> Địa chỉ </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.banner.index')}}" class="side-menu">
                        <div class="side-menu__icon">
                            <i data-lucide="image"></i>
                        </div>
                        <div class="side-menu__title"> Banner </div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', function() {
            const url = window.location.href;
            console.log(url);

    });
</script>

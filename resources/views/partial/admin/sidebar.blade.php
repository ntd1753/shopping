<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4 mt-3">
        <img alt="Midone - HTML Admin Template" class="w-6" src="{{asset('backend/dist/images/logo.svg')}}">
        <span class="hidden xl:block text-white text-lg ml-3"> Tinker </span>
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="#" class="side-menu side-menu--active">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title">
                    Dashboard
                    <div class="side-menu__sub-icon transform rotate-180"> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="side-menu__sub-open">
                <li>
                    <a href="side-menu-light-dashboard-overview-1.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Overview 1 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-dashboard-overview-2.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Overview 2 </div>
                    </a>
                </li>
                <li>
                    <a href="index.html" class="side-menu side-menu--active">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Overview 3 </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-dashboard-overview-4.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Overview 4 </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu">
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
            <a href="javascript:;" class="side-menu">
                <div class="side-menu__icon"> <i data-lucide="shopping-bag"></i> </div>
                <div class="side-menu__title">
                    E-Commerce
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="">
                <li>
                    <a href="side-menu-light-categories.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Categories </div>
                    </a>
                </li>
                <li>
                    <a href="side-menu-light-add-product.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Add Product </div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title">
                            Products
                            <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="">
                        <li>
                            <a href="side-menu-light-product-list.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                <div class="side-menu__title">Product List</div>
                            </a>
                        </li>
                        <li>
                            <a href="side-menu-light-product-grid.html" class="side-menu">
                                <div class="side-menu__icon"> <i data-lucide="zap"></i> </div>
                                <div class="side-menu__title">Product Grid</div>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="side-menu-light-reviews.html" class="side-menu">
                        <div class="side-menu__icon"> <i data-lucide="activity"></i> </div>
                        <div class="side-menu__title"> Reviews </div>
                    </a>
                </li>
            </ul>
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
    </ul>
</nav>
<script>
    document.addEventListener('DOMContentLoaded', function() {
            const url = window.location.href;
            console.log(url);

    });
</script>

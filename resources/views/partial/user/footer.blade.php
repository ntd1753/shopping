
<div class="footer ">
    <div class="before-footer">
        <img src="{{asset('frontend/images/beforefooter.png')}}" alt="" class="mx-auto">
    </div>
    <div class="first-footer bg-[#3ba66b]">
        <div class="max-w-screen-xl	 mx-auto">
            <div class="grid grid-cols-3  pt-12	pb-12">
                <div class="lg:mt-20 lg:px-12 text-white  text-center">
                    <h4 class="title-menu font-bold text-base mb-6	">
                        ĐĂNG KÍ NHẬN THÔNG TIN <i class="fa fa-plus hidden" aria-hidden="true"></i>
                    </h4>
                    <p class="mb-4">
                        Đăng ký nhận bản tin để nhận ưu đãi đặc biệt về sản phẩm
                    </p>
                    <div class="footer_formcontact w-full">
                        <form method="post" action="#" id="contact" accept-charset="UTF-8"
                              class="has-validation-callback mb-8">
                            <div class="footer_input_sdt_contain relative flex w-full">
                                <input placeholder="Nhập số điện thoại" type="tel" name="contact[phone]"
                                       data-validation="required" id="tel" class=" w-full rounded-full h-2.25 w-4/5"
                                       required="">
                                <div class="absolute top-[1px] right-0">
                                    <button type="submit" class="btn bg-yellow-400 rounded-r-full p-2 ">Đăng
                                        ký</button>
                                </div>
                            </div>
                        </form>
                        <ul class="ul_menu_fot">
                            <li class="leading-7">
                                <a href="#" title="Chính sách thanh toán">Chính sách thanh toán</a>
                            </li>

                            <li class="leading-7">
                                <a href="#" title="Chính sách vận chuyển">Chính sách vận chuyển</a>
                            </li>

                            <li class="leading-7">
                                <a href="#" title="Chính sách đổi trả">Chính sách đổi trả</a>
                            </li class="leading-7">

                            <li class="leading-7">
                                <a href="#" title="Chính sách bảo mật">Chính sách bảo mật</a>
                            </li class="leading-7">

                            <li class="leading-7">
                                <a href="#" title="Chính sách kiểm hàng">Chính sách kiểm hàng</a>
                            </li>

                        </ul>
                    </div>

                </div>
                <div class="col-logo-footer text-white text-base	lg:px-12 leading-6">

                    <div class="logo-footer flex">
                        <a href="/" class="mx-auto">
                            <img class="w-[100px] h-[100px]"
                                 src="//bizweb.dktcdn.net/100/065/538/themes/838571/assets/logo_footer.png?1708919610274"
                                 alt="Halafruit.vn">
                        </a>
                    </div>
                    <div class="text_introduction mt-4 text-center">
                        {{ config('website.contact.description') }}
                        <br>
                        <b class="text-lg	">
                            Bán hàng chất lượng, uy tín, giá cả hợp lý
                        </b>
                    </div>

                    <a href="http://online.gov.vn/Home/WebDetails/97526" target="_blank"><img class="mx-auto"
                                                                                              src="//bizweb.dktcdn.net/100/065/538/themes/838571/assets/bct.png?1708919610274"
                                                                                              style="max-width:60%;margin-top:20px"></a>
                </div>
                <div class="col-contact-footer text-white text-base text-center  lg:mt-20 lg:px-12 leading-6">
                    <h4 class="title-menu font-bold text-base mb-6	">
                        LIÊN HỆ VỚI CHÚNG TÔI
                    </h4>
                    <span style="color:#fff"> Hộ kinh doanh: Trái cây nhập khẩu<br>
                            MST {{config('website.business_registration.tax_code')}}
                        Do {{config('website.business_registration.issued_by')}}
                        cấp ngày {{config('website.business_registration.issued_date')}}<br></span>
                    <ul>
                        @for($i=0;$i<count($shops);$i++)
                            <li><strong>Địa chỉ {{$i+1}}:</strong>{{$shops[$i]->address}}</li>
                        @endfor

                        <li><strong>Hotline:</strong> <a class="fone" href="tel:0862593599">{{config('website.contact.hotline')}}</a></li>
                        <li>
                            <strong>Email:</strong> <a href="mailto:hoa263mta@gmail.com">{{config('website.contact.email')}}</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="bg-[#359560] text-sm p-3">
            <div class="max-w-screen-xl	 mx-auto">
                <div class="grid grid-cols-3 ">
                    <div class="text-white">
                        <div>
                            @ Bản quyền thuộc về Halafruit.vn | Cung cấp bởi Sapo
                        </div>
                    </div>
                    <div class="col-middle-footer">

                    </div>
                    <div class="col-end-footer">
                        <div class="social-buttons text-white text-center">

                            <a href="{{config('website.social_links.facebook')}}"
                               class="social-button facebook p-2" title="Theo dõi trên Facebook">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                            <a href="{{config('website.social_links.twitter')}}" class="social-button twitter p-2" title="Theo dõi trên Twitter">
                                <i class="fa-brands fa-twitter"></i>
                            </a>

                            <a href="{{config('website.social_links.instagram')}}" class="social-button google p-2" title="Theo dõi trên Google">
                                <i class="fa-brands fa-google"></i>
                            </a>

                            <a href="#" class="social-button youtube p-2" title="Theo dõi trên Youtube">
                                <i class="fa-brands fa-youtube"></i>
                            </a>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

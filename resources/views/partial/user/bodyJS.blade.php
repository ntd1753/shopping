<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    //action khi hover vào thẻ sản phẩm
    function hoverProductCard(id){
        const items = document.getElementsByClassName(`product-${id}-action`);
        [...items].forEach((element) => {
            element.classList.remove('hidden');
            element.classList.add('translate-y-0');
        });
    }
    function mouseOutProductCard(id){
        const items = document.getElementsByClassName(`product-${id}-action`);
        [...items].forEach((element) => {
            element.classList.remove('translate-y-0');
            element.classList.add('hidden');
        });
    }

    //action khi hover vào danh mục sản phẩm trên header
    function handleMouseOver(id) {
        const element = document.getElementById('Dropdown-product-categories-'+id);
        if (element) {
            // Thêm class 'block' và loại bỏ class 'hidden'
            element.classList.add('block');
            element.classList.remove('hidden');
        }
    }
    function handleMouseOut(id) {
        const element = document.getElementById('Dropdown-product-categories-'+id);
        if (element) {
            // Thêm class 'hidden' và loại bỏ class 'block'
            element.classList.add('hidden');
            element.classList.remove('block');
        }
    }
</script>
<script>
    function updateCartBar(id){
        const quantity = document.getElementById(`product-quantity-side-bar-${id}`).value;
        $.ajax({
            url: '{{route('user.cart.update')}}', // Đảm bảo rằng route này được định nghĩa đúng trong Laravel
            type: 'POST',
            data: {
                _token:`{{csrf_token()}}`,
                id: id, // Đảm bảo rằng biến này có giá trị hợp lệ
                quantity: quantity
            },
            success: function(response) {
                if($('#provisional-price')&&$('.total-price')){
                    $('#provisional-price').text(response.totalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+`₫`);
                    $('.total-price').text(response.totalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+`₫`);
                    $(`#product-quantity-${id}`).val(quantity);
                }
                    $('#total-price-side-bar').text(response.totalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+`₫`)
            },
            error: function(xhr, status, error) {
                // Xử lý khi có lỗi
                console.error(error);
            }
        });
    }
    function deleteCartItem(id){
        $.ajax({
            url: '{{route('user.cart.delete')}}', // Đảm bảo rằng route này được định nghĩa đúng trong Laravel
            type: 'POST',
            data: {
                _token:`{{csrf_token()}}`,
                id: id,
            },
            success: function(response) {
                console.log(response)
                if (Object.keys(response).length>0){
                    if($('#count-cart-product')||$(`#product-${id}`)||$('#provisional-price')||$('#total-price')){
                        $('#count-cart-product').text('('+(Object.keys(response.cart).length)+'sản phẩm'+')');
                        $(`#product-${id}`).remove();
                        $('#provisional-price').text(response.totalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+`₫`);
                        $('#total-price').text(response.totalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+`₫`);
                    }
                        if($(`#cart-bar-item-${id}`)){
                            $(`#cart-bar-item-${id}`).remove();
                            $('#total-price-side-bar').text(response.totalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")+`₫`);
                        }
                } else {
                    if($('#cart-body')||$('#count-cart-product')){
                        const html=`
                                    <div class="flex justify-center">
                            <div class="col-md-7">
                                <div class="p-2">
                                    <img class="h-[250px]" src="{{ asset('frontend/images/shopping-cart-empty.svg') }}" alt="">
                                </div>
                                <div class="btn-cart-empty text-center my-5">
                                    <a class="btn bg-[#3ba66b] py-3 px-7 text-white rounded-[4px] text-base" href="{{ route('home') }}" title="Tiếp tục mua hàng">TIẾP TỤC MUA HÀNG</a>
                                </div>
                            </div>
                        </div>
                        `;
                        $('#cart-body').html(html)
                        $('#count-cart-product').text('(0 sản phẩm)');
                    }
                    if($('#check-out-form')||$('#cart-side-bar-body')){
                        $('#check-out-form').html(" ");
                        const htmlSideBar=`
                                    <div class="flex justify-center">
                            <div class="col-md-7">
                                <div class="p-2">
                                    <img class="h-[200px]" src="{{ asset('frontend/images/shopping-cart-empty.svg') }}" alt="">
                                </div>
                                <div class="btn-cart-empty text-center my-5">
                                    <a class="btn bg-[#3ba66b] py-3 px-7 text-white rounded-[4px] text-base" href="{{ route('home') }}" title="Tiếp tục mua hàng">TIẾP TỤC MUA HÀNG</a>
                                </div>
                            </div>
                        </div>
                        `;
                        $('#cart-side-bar-body').html(htmlSideBar);
                    }
                }

            },
            error: function(xhr, status, error) {
                // Xử lý khi có lỗi
                console.error(error);
            }
        });
    }
</script>
<script>


    @auth()
    document.getElementById('logout-link').addEventListener('click', function(event) {
        event.preventDefault(); // Ngăn không cho trình duyệt chuyển hướng
        document.getElementById('logout-form').submit(); // Gửi form
    });

    $('#cart-button').on( "click", function() {
        $.ajax({
            url: '{{route('user.cart.getItem')}}',
            type: 'GET',
            dataType:'json',
            success: function(response){
                let html= '';
                if(Object.keys(response.cart).length>0){
                    for (const productId in response.cart) {
                        if (response.cart.hasOwnProperty(productId)) {
                            const product = response.cart[productId];
                            let cartItemUrlTemplate="{{ route('user.product.detail', ['id' => 'ROOM_ID_PLACEHOLDER']) }}"
                            let cartItemUrl = cartItemUrlTemplate.replace('ROOM_ID_PLACEHOLDER', product.id);
                            html+=`
                        <div id='cart-bar-item-${product.id}' class="clearfix cart_product grid  text-black text-sm grid-cols-6 gap-4 p-2">
                            <div class="col-span-2">
                                <a class="cart_image" href="${cartItemUrl}" title="Lựu Thái">
                                    <img src="${product.attributes.image}">
                                </a>
                            </div>
                            <div class="cart_info col-span-4">
                                <div class="cart_name font-bold hover:text-[#ffb416]"><a href="${cartItemUrl}">${product.name}</a></div>
                                <div class="row-cart-left grid grid-cols-2">
                                    <div class="cart_item_name">
                                        <div><label class="cart_quantity text-xs">Số lượng</label>
                                            <div class="flex w-10 ">
                                                <button type="button" id="decrement-button"
                                                    class="text-center text-xs border-solid border-2 border-[#ebebeb] px-2" onclick="
                                        var result = document.getElementById('product-quantity-side-bar-${product.id}');
                                        var product${product.id} = result.value;
                                        if( !isNaN( product${product.id} ) && product${product.id} > 1 ) { result.value--;
                                            updateCartBar(${product.id})
                                            }
                                        return false">
                                                    <i class="fa-solid fa-minus"></i>
                                                </button>
                                                <input id="product-quantity-side-bar-${product.id}"
                                                    class="text-center max-w-[30px] border-solid border-2 border-[#ebebeb]"
                                                    value="${product.quantity}" required />
                                                <button type="button" id="increment-button"
                                                    class="border-solid border-2 text-xs border-[#ebebeb] text-center px-2" onclick="
                                        var result = document.getElementById('product-quantity-side-bar-${product.id}');
                                        var product${product.id} = result.value;
                                        if( !isNaN( product${product.id} )) {result.value++;  updateCartBar(${product.id});}
                                        return false">
                                                    <i class="fa-solid fa-plus"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-right cart_prices">
                                        <div class="cart__price">
                                            <span class="text-sm text-[#FE0000] font-bold">${product.price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")}₫</span>
                                        </div>
                                        <a class='text-xs text-[#3ba66b] hover:cursor-pointer hover:underline hover:decoration-1' onclick='deleteCartItem(${product.id})'>Bỏ sản phẩm</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                            `;
                        }
                    }
                    $('#cart-side-bar-body').html(html);
                    let checkoutform = `
                                            <hr class="text-black">
                                            <div class="grid grid-cols-2 text-black text-sm py-2">
                                                <div>Tổng tiền</div>
                                                <div id='total-price-side-bar' class="text-[#FE0000] font-bold ">${response.totalPrice.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")}₫</div>
                                            </div>
                                            <div class="w-full py-2"><a href="{{route('user.order.index')}}">
                                                <button type="button" class="bg-[#3ba66b] w-full rounded-[4px] px-3 py-1.5 hover:bg-[#2E8053] text-center text-white ">



                                                    Thanh toán
                                                </button></a>
                                            </div>`;
                    $('#check-out-form').html(checkoutform);
                }
                else{
                    const htmlSideBar=`
                                    <div class="flex justify-center">
                            <div class="col-md-7">
                                <div class="p-2">
                                    <img class="h-[200px]" src="{{ asset('frontend/images/shopping-cart-empty.svg') }}" alt="">
                                </div>
                                <div class="btn-cart-empty text-center my-5">
                                    <a class="btn bg-[#3ba66b] py-3 px-7 text-white rounded-[4px] text-base" href="{{ route('home') }}" title="Tiếp tục mua hàng">TIẾP TỤC MUA HÀNG</a>
                                </div>
                            </div>
                        </div>
                        `;
                    $('#cart-side-bar-body').html(htmlSideBar);

                }


            },
            error: function(error){
                console.log(error);
            }
        });
    });
    function addCartByProductCard(id){
        $.ajax({
            url: '{{route('user.cart.store')}}', // Đảm bảo rằng route này được định nghĩa đúng trong Laravel
            type: 'POST',
            data: {
                _token:`{{csrf_token()}}`,
                id: id, // Đảm bảo rằng biến này có giá trị hợp lệ
                quantity: 1
            },
            success: function(response) {
                document.getElementById('count_cart_item').innerText= Object.keys(response).length;
                $('#cart-button').click();
                console.log(response)
            },
            error: function(xhr, status, error) {
                // Xử lý khi có lỗi
                console.error(error);
            }
        });
    }
    @endauth


</script>


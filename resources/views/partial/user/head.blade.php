<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="">
<title>{{ config('app.name') }}</title>
<link href="//bizweb.dktcdn.net/100/065/538/themes/838571/assets/logo.png?1708919610274" rel="shortcut icon">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
      integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
      crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


@if(Route::is('home'))
   <style>

       #poster {
           position: relative;

       }



       swiper-slide {
           text-align: center;
           font-size: 18px;
           background: #fff;
           height: calc((100% - 30px) / 2) !important;
           display: flex;
           justify-content: center;
           align-items: center;
       }
       .img {
           display: block;
           width: 100%;
           object-fit: cover;
       }

       .sale-product-week-info{
           /*max-width: 227px;*/
       }
        .swiper-button-next{
            background: white;
            border-bottom-right-radius: 100px;
        }

   </style>
@endif


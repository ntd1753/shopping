@extends('layouts.adminLayout')
@section('content')

    <form action="{{route('admin.config.update')}}" method="POST">
        @csrf
        <div class="intro-x box mt-10">
            <div class=" p-5 border-b border-slate-200/60">
                <h2 class="font-medium text-2xl mr-auto">
                    Cấu hình hệ thống
                </h2>
            </div>
            <div class="p-5 grid grid-cols-2 gap-6 text-base" >

                <div class="preview" style="display: block;">
                        <div>
                            <label for="regular-form-1" class="form-label">Tên Doanh Nghiệp:</label>
                            <input id="regular-form-1" type="text" class="form-control" placeholder="Input text" name="company_name" value="{{config('website.company_name')}}">
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-2" class="form-label">Mã số thuế:</label>
                            <input id="regular-form-2" type="text" class="form-control" placeholder="Rounded" name="tax_code" value="{{config('website.business_registration.tax_code')}}">
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-3" class="form-label">Nơi cấp Mã số thuế:</label>
                            <input id="regular-form-3" type="text" class="form-control" name="issued_by"  value="{{config('website.business_registration.issued_by')}}">
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-4" class="form-label">Ngày cấp:</label>
                            <input id="regular-form-4" type="text" class="form-control" placeholder="Password" name="issued_date" value="{{config('website.business_registration.issued_date')}}">
                        </div>
                        <div class="mt-3">
                            <label for="regular-form-4" class="form-label">Zalo:</label>
                            <input id="regular-form-4" type="text" class="form-control" placeholder="Password" name="zalo" value="{{config('website.contact.zalo')}}">
                        </div>
                    </div>

                <div class="preview">
                    <div>
                        <label for="regular-form-1" class="form-label">Hotline:</label>
                        <input id="regular-form-1" type="text" class="form-control" placeholder="Input text" name="hotline" value="{{config('website.contact.hotline')}}">
                    </div>
                    <div class="mt-3">
                        <label for="regular-form-1" class="form-label">Email</label>
                        <input id="regular-form-1" type="text" class="form-control" placeholder="Input text" name="email" value="{{config('website.contact.email')}}">
                    </div >
                    <div class="mt-3">
                        <label for="regular-form-1" class="form-label">Facebook</label>
                        <input id="regular-form-1" type="text" class="form-control" placeholder="Input text" name="facebook" value="{{config('website.social_links.facebook')}}">
                    </div>
                    <div class="mt-3">
                        <label for="regular-form-1" class="form-label">Twitter</label>
                        <input id="regular-form-1" type="text" class="form-control" placeholder="Input text" name="twitter" value="{{config('website.social_links.twitter')}}">
                    </div>
                    <div class="mt-3">
                        <label for="regular-form-1" class="form-label">Instagram</label>
                        <input id="regular-form-1" type="text" class="form-control" placeholder="Input text" name="instagram" value="{{config('website.social_links.instagram')}}">
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end flex-col md:flex-row gap-2 mt-5">
            <button type="submit" class="btn py-3 btn-primary w-full md:w-52">Save</button>
        </div>
    </form>
@endsection

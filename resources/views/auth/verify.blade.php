@extends('auth.layouts.guest')
@section('content')
@if (session('message'))
<script>
    swal({
        title: "Thành công!",
        text: "{{ session('message') }}",
        icon: "success",
        button: "OK",
            });
          //confim xem co muon ve trang chu khong
            swal({
                title: "Xác nhận",
                text: "Bạn có muốn chuyển đến trang email không?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                window.location.href = "https://mail.google.com/mail/";
                } else {
                swal("OK! Bạn có thể ở lại!");
                }
            });
            
   
</script>
@endif

<div class="mx-auto max-w-screen-2xl p-4 md:p-6 2xl:p-10">
    <div class="rounded-sm border border-stroke bg-white shadow-default dark:border-strokedark dark:bg-boxdark">
        <div class="flex flex-wrap items-center">
            <div class="hidden w-full xl:block xl:w-1/2" style="background-color: rgb(109, 40, 217);">
                <div class="py-17.5 px-26 text-center">
                    <a href="{{ route('home') }}" class="mb-5.5 inline-block">
                        <img class="hidden dark:block" src="{{ asset('img/logo1.svg') }}" alt="Logo" />
                        <img class="dark:hidden" src="{{ asset('img/logo1.svg') }}" alt="Logo" />
                    </a>
                    <p class="font-medium text-white text-2xl">
                        Chào mừng đến với Study Space!
                    </p>

                    <span class="mt-15 inline-block">
                        <img src="{{ asset('images/img1.png') }}" alt="illustration" />
                    </span>
                </div>
            </div>

            <div class="w-full bg-white dark:bg-boxdark border-stroke dark:border-strokedark xl:w-1/2 xl:border-l-2">
                <div class="w-full p-4 sm:p-12.5 xl:p-17.5">
                    <h2 class="mb-9 text-2xl font-bold text-black dark:text-white sm:text-title-xl2">
                        Xác thực Email của bạn
                    </h2>

                    <div class="card-body">
                        <h4 class="text-xl text-black dark:text-white">Liên kết xác minh đã được gửi tới Email <b>[{{
                                auth()->user()->email }}]</b>. Nếu bạn không nhận được email, nhấn nút bên dưới để gửi
                            yêu cầu khác.</h4>
                        <form id="verifi__email" class="mt-6" method="POST" action="{{ route('verification.send') }}"
                            data-redirect="{{ route('home') }}">
                            @csrf
                            <button type="submit"
                                class="w-full cursor-pointer rounded-lg border border-primary bg-primary p-4 font-medium text-white transition hover:bg-opacity-90">{{
                                __('Gửi yêu cầu khác') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
      
    $('#verifi__email').submit(function (event) {
            var url = $(this).attr('action');
            var redirect = $(this).data('redirect');
            var formData = new FormData(this);
            var submitBtn =  $(this).find('button[type="submit"]');

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function () {
                        submitBtn.attr('disabled', true);
                        submitBtn.html('Đang xử lý...');
                        swal.fire({
                            title: 'Đang xử lý...',
                            text: 'Vui lòng chờ trong giây lát!',
                            imageUrl: 'https://i.gifer.com/ZZ5H.gif',
                            imageWidth: 150,
                            imageHeight: 150,
                            imageAlt: 'Custom image',
                            showConfirmButton: false,
                            allowOutsideClick: false
                        });
                swal("OK", "Đã gửi yêu cầu xác thực email!", "success");

                    },
                    success: function () {
                        submitBtn.attr('disabled', false);
                        submitBtn.html('Gửi yêu cầu khác');
                    },
                    error: function (xhr, status, error) {
                        if (xhr.status === 422) {
                            var response = JSON.parse(xhr.responseText);
                            checkAndShowError('error', 'Lỗi!', response.message);
                        } else {
                            checkAndShowError('error', 'Lỗi!', 'Có lỗi xảy ra: ' + error);
                        }
                    }
                });
        })
    })
</script>
@endsection

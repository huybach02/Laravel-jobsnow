<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <link rel="manifest" href="manifest.json" crossorigin>
    <meta name="msapplication-config" content="browserconfig.xml">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('frontend.layouts.head')

</head>

<body>

    {{-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center"><img src="{{ asset('frontend/assets/imgs/template/loading.gif') }}"
                        alt="joblist"></div>
            </div>
        </div>
    </div> --}}

    <div class="preloader_demo d-none">
        <div class="img">
            <img src="{{ asset('frontend/assets/loading.gif') }}" alt="joblist">
        </div>
    </div>

    @include('frontend.layouts.header')

    <main class="main">

        @yield('content')

    </main>

    <section class="section-box subscription_box">
        <div class="container">
            <div class="box-newsletter">
                <div class="newsletter_textarea">
                    <div class="row">
                        <div class="col-lg-6">
                            <h2 class="text-md-newsletter">Subscribe our newsletter</h2>
                        </div>
                        <div class="col-lg-6">
                            <div class="box-form-newsletter">
                                <form class="form-newsletter">
                                    <input class="input-newsletter" type="text" value=""
                                        placeholder="Enter your email here">
                                    <button class="btn btn-default font-heading">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.layouts.footer')

    @include('frontend.layouts.script')

    <script>
        function showPreloader() {
            $('.preloader_demo').removeClass('d-none')
        }

        function hidePreloader() {
            $('.preloader_demo').addClass('d-none')
        }
    </script>

    @stack('scripts')

    <script>
        tinymce.init({
            selector: '.editor',
            min_width: 500,
            height: 500,
            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'prewiew', 'anchor', 'pagebreak',
                'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
                'table', 'emoticons', 'template', 'codesample'
            ],
            toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify |' +
                'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                'forecolor backcolor emoticons',
            menu: {
                favs: {
                    title: 'Menu',
                    items: 'code visualaid | searchreplace | emoticons'
                }
            },
            menubar: 'favs file edit view insert format tools table',
            content_style: 'body{font-family:Helvetica,Arial,sans-serif; font-size:16px}',
            images_upload_url: "{{ route('upload') }}",
            images_upload_credentials: true,
            images_reuse_filename: true,
            images_upload_handler: function(blobInfo, progress) {
                return new Promise((resolve, reject) => {
                    var xhr, formData;
                    xhr = new XMLHttpRequest();
                    xhr.withCredentials = false;
                    xhr.open('POST', '{{ route('upload') }}');

                    xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));

                    xhr.upload.onprogress = function(e) {
                        progress(e.loaded / e.total * 100);
                    };

                    xhr.onload = function() {
                        var json;
                        if (xhr.status !== 200) {
                            reject('HTTP Error: ' + xhr.status);
                            return;
                        }
                        json = JSON.parse(xhr.responseText);
                        if (!json || typeof json.location != 'string') {
                            reject('Invalid JSON: ' + xhr.responseText);
                            return;
                        }
                        resolve(json.location);
                    };

                    xhr.onerror = function() {
                        reject('Image upload failed due to a XHR Transport error. Code: ' + xhr
                            .status);
                    };

                    formData = new FormData();
                    formData.append('file', blobInfo.blob(), blobInfo.filename());

                    xhr.send(formData);
                });
            },
            // Add these options to prevent URL rewriting
            remove_script_host: false,
            convert_urls: false
        });
    </script>


    <script>
        $("body").on("click", ".delete-btn", function(e) {
            e.preventDefault();
            Swal.fire({
                title: "Bạn có chắc chắn muốn xoá?",
                text: "Dữ liệu không thể khôi phục sau khi xoá",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Xác nhận xoá",
                cancelButtonText: "Hủy"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: "DELETE",
                        url: $(this).attr('href'),
                        data: {
                            _token: "{{ csrf_token() }}"
                        },

                        success: function(data) {

                            if (data.success) {
                                Swal.fire({
                                    title: "Đã xoá thành công!",
                                    text: "Dữ liệu đã được xoá thành công!",
                                    icon: "success"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload();
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: "Có lỗi xảy ra!",
                                    text: "Có lỗi xảy ra trong quá trình xoá dữ liệu. Vui lòng thử lại!",
                                    icon: "error"
                                })
                            }

                        },

                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    })
                }

            });
        })
    </script>

    <script>
        new DataTable('#example', {
            "order": [
                [1, "desc"]
            ],
            columnDefs: [{
                    targets: 1,
                    visible: false
                } // Ẩn cột id
            ],
            language: {
                "search": "Tìm kiếm",
                "lengthMenu": "_MENU_ Dữ liệu/Trang ",
                "info": "Hiển thị từ _START_ đến _END_ trong tổng số _TOTAL_ mục",
                "infoEmpty": "Hiển thị 0 đến 0 trong tổng số 0 mục",
                "infoFiltered": "(được lọc từ _MAX_ mục)",
                "zeroRecords": "Không tìm thấy kết quả phù hợp"
            }
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".province").on("change", function() {
                let province_code = $(this).val();

                $(".district").html('<option value="">-- Chọn quận/huyện --</option>');
                $(".ward").html('<option value="">-- Chọn xã/phường --</option>');

                let html = ""

                $.ajax({
                    method: "GET",
                    url: "{{ route('get-districts', ':province_code') }}".replace(':province_code',
                        province_code),
                    success: function(data) {

                        data.forEach(element => {
                            html +=
                                `<option value="${element.code}">${element.name}</option>`
                        });

                        $(".district").append(html);
                    }
                })
            })

            $(".district").on("change", function() {
                let district_code = $(this).val();

                $(".ward").html('<option value="">-- Chọn xã/phường --</option>');

                let html = ""

                $.ajax({
                    method: "GET",
                    url: "{{ route('get-wards', ':district_code') }}".replace(':district_code',
                        district_code),
                    success: function(data) {

                        data.forEach(element => {
                            html +=
                                `<option value="${element.code}">${element.name}</option>`
                        });

                        $(".ward").append(html);
                    }
                })
            })

        })
    </script>

    <script>
        $(".delete-btn").click(function(e) {
            e.preventDefault();
            Swal.fire({
                title: "Bạn có chắc chắn muốn xoá?",
                text: "Dữ liệu không thể khôi phục sau khi xoá",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Xác nhận xoá",
                cancelButtonText: "Hủy"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        method: "DELETE",
                        url: $(this).attr('href'),
                        data: {
                            _token: "{{ csrf_token() }}"
                        },

                        success: function(data) {

                            if (data.success) {
                                Swal.fire({
                                    title: "Đã xoá thành công!",
                                    text: "Dữ liệu đã được xoá thành công!",
                                    icon: "success"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.reload();
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: "Có lỗi xảy ra!",
                                    text: "Có lỗi xảy ra trong quá trình xoá dữ liệu. Vui lòng thử lại!",
                                    icon: "error"
                                })
                            }

                        },

                        error: function(xhr, status, error) {
                            console.log(error);
                        }
                    })
                }

            });
        })
    </script>

    <script>
        $(document).ready(function() {
            $("body").on('click', ".change-status", function() {
                let isChecked = $(this).is(":checked")
                let id = $(this).data('id')
                let url = $(this).data('url')

                $.ajax({
                    url: url,
                    method: "PUT",
                    data: {
                        id: id,
                        status: isChecked,
                        _token: "{{ csrf_token() }}"
                    },
                    success: function(data) {
                        if (data.success) {
                            flasher.success(data.message, "Thành công")
                        } else {
                            sessionStorage.setItem('flasherMessage', data.message);
                            sessionStorage.setItem('flasherType', 'error');
                            window.location.reload();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })

            let flasherMessage = sessionStorage.getItem('flasherMessage');
            let flasherType = sessionStorage.getItem('flasherType');

            if (flasherMessage) {
                flasher[flasherType](flasherMessage, "Cảnh báo");
                sessionStorage.removeItem('flasherMessage');
                sessionStorage.removeItem('flasherType');
            }
        })
    </script>

    <script>
        $("#rangeSlider").ionRangeSlider({
            min: 100000,
            step: 1000000,
            max: 100000000,
            from: 550,
        });
    </script>

    <script>
        $(document).ready(function() {
            $("body").on('click', '.job-bookmark', function(event) {
                let id = $(this).data('id')

                $.ajax({
                    url: "{{ route('candidate.my-bookmarks.store', ':id') }}".replace(':id', id),
                    method: "GET",
                    success: function(data) {
                        if (data.success) {
                            flasher.success(data.message, "Thành công")
                        } else {
                            flasher.error(data.message, "Thất bại")
                        }
                    },

                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                })
            })
        })
    </script>
</body>

</html>

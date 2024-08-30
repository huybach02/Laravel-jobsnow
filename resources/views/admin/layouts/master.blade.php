<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>JobsNOW - Quản Trị</title>

    @include('admin.layouts.head')

</head>

<body class="theme-blue light">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
            <p>Đang tải dữ liệu...</p>
        </div>
    </div>

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>

    <!-- Search  -->
    <div class="search-bar">
        <div class="search-icon"> <i class="material-icons">search</i> </div>
        <input type="text" placeholder="Explor adminX...">
        <div class="close-search"> <i class="material-icons">close</i> </div>
    </div>

    <!-- Top Bar -->
    @include('admin.layouts.navbar')
    <!-- #Top Bar -->

    <!--Side menu and right menu -->
    <!-- Left Sidebar -->
    @include('admin.layouts.left-sidebar')
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    @include('admin.layouts.right-sidebar')
    <!-- #END# Right Sidebar -->

    <!-- main content -->
    <section class="content home">
        <div class="container-fluid">
            @yield('content')
        </div>
    </section>

    @include('admin.layouts.script')

    @stack('scripts')

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

            $("body").on('change', ".change-blocked", function() {
                let id = $(this).data('id')
                let url = $(this).data('url')
                let value = $(this).val()

                $.ajax({
                    url: url,
                    method: "PUT",
                    data: {
                        id: id,
                        value: value,
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

</body>

</html>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
                        flasher.success(data.message, "Thành công")
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

<div class="tab-pane fade {{ session()->has('type_tab') ? (session()->get('type_tab') == 'education-work' ? 'show active' : '') : '' }}"
    id="education-work" role="tabpanel" aria-labelledby="profile-tab">
    <div class="col-12">
        <div class="form-group row">
            <label class="font-sm color-text-mutted font-bold mb-10">Học vấn/bằng cấp
                *</label>
            <div class="col-lg-3">
                <button type="button" class="btn btn-success rounded btn-create-education" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop-1">+ Thêm học vấn/bằng cấp </button>
            </div>
            <div class="col-12 mt-3">
                <table class="table">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên học vấn/bằng cấp</th>
                            <th scope="col">Đơn vị đào tạo</th>
                            <th scope="col">Thời gian đào tạo</th>
                            <th scope="col">Xếp loại</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody class="education-table">
                        @forelse ($educations as $key => $education)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td style="max-width: 250px;">{{ $education?->name_education }}</td>
                                <td style="max-width: 250px;">{{ $education?->training_unit }}</td>
                                <td>Từ {{ $education?->start_date }} đến {{ $education?->end_date }}
                                </td>
                                <td>{{ $education?->rating }}</td>
                                <td class="d-flex flex-column gap-1 mx-auto">
                                    <a href="{{ route('candidate.profile.edit-education', $education?->id) }}"
                                        class="btn btn-primary btn-sm rounded edit-education"
                                        style="padding: 6px 8px;font-size: 12px" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop-1">
                                        Sửa
                                    </a>

                                    <a href="{{ route('candidate.profile.delete-education', $education?->id) }}"
                                        class="btn btn-danger btn-sm rounded delete-btn" data-type="confirm"
                                        style="padding: 6px 8px;font-size: 12px">
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Chưa có dữ liệu</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-12">
        <div class="form-group w-100 d-flex flex-column">
            <label class="font-sm color-text-mutted font-bold mb-10">Quá trình làm việc
                *</label>
            <div class="col-lg-3">
                <button type="button" class="btn btn-success rounded btn-create-work" data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop-2">+ Thêm quá trình làm việc </button>
            </div>
            <div class="col-12 mt-3">
                <table class="table ">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên công ty/doanh nghiệp</th>
                            <th scope="col">Chức danh/vị trí làm việc</th>
                            <th scope="col">Thời gian làm việc</th>
                            <th scope="col">Chi tiết công việc</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody class="work-table">
                        @forelse ($works as $key => $work)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td style="max-width: 250px;">{{ $work?->name_company }}</td>
                                <td style="max-width: 200px;">{{ $work?->position }}</td>
                                <td>Từ {{ $work?->start_date }}
                                    {{ !$work?->current_working ? 'đến ' . $work?->end_date : '' }}
                                    {{ $work?->current_working ? '(Công việc hiện tại)' : '' }}
                                </td>
                                <td style="max-width: 400px;">{{ $work?->description }}</td>
                                <td class="d-flex flex-column gap-1 mx-auto">
                                    <a href="{{ route('candidate.profile.edit-work', $work?->id) }}"
                                        class="btn btn-primary btn-sm rounded edit-work"
                                        style="padding: 6px 8px;font-size: 12px" data-bs-toggle="modal"
                                        data-bs-target="#staticBackdrop-2">
                                        Sửa
                                    </a>

                                    <a href="{{ route('candidate.profile.delete-work', $work?->id) }}"
                                        class="btn btn-danger btn-sm rounded delete-btn" data-type="confirm"
                                        style="padding: 6px 8px;font-size: 12px">
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Chưa có dữ liệu</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="staticBackdrop-1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 education-modal-title" id="staticBackdropLabel">Thêm mới học vấn/bằng
                        cấp</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('candidate.profile.create-education') }}" method="POST" id="educationForm">
                        @csrf

                        <div class="form-group">
                            <label class="font-sm color-text-mutted font-bold mb-10">Tên học vấn/bằng cấp
                                *</label>
                            <input class="form-control" type="text" value="{{ old('name_education') }}"
                                name="name_education" required>
                            @if ($errors->has('name_education'))
                                <small class="text-danger">{{ $errors->first('name_education') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="font-sm color-text-mutted font-bold mb-10">Đơn vị đào tạo
                                *</label>
                            <input class="form-control" type="text" value="{{ old('training_unit') }}"
                                name="training_unit" required>
                            @if ($errors->has('training_unit'))
                                <small class="text-danger">{{ $errors->first('training_unit') }}</small>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted font-bold mb-10">Thời gian bắt đầu
                                        *</label>
                                    <input class="form-control" type="month" value="{{ old('start_date') }}"
                                        name="start_date" required>
                                    @if ($errors->has('start_date'))
                                        <small class="text-danger">{{ $errors->first('start_date') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted font-bold mb-10">Thời gian kết thúc
                                        *</label>
                                    <input class="form-control" type="month" value="{{ old('end_date') }}"
                                        name="end_date" required>
                                    @if ($errors->has('end_date'))
                                        <small class="text-danger">{{ $errors->first('end_date') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="font-sm color-text-mutted font-bold mb-10">Xếp loại
                                *</label>
                            <select class="form-control" name="rating" required>
                                <option value="">-- Chọn xếp loại --</option>
                                <option value="Xuất sắc">Xuất sắc</option>
                                <option value="Giỏi">Giỏi</option>
                                <option value="Khá">Khá</option>
                                <option value="Trung bình khá">Trung bình khá</option>
                                <option value="Trung bình">Trung bình</option>
                            </select>
                            @if ($errors->has('rating'))
                                <small class="text-danger">{{ $errors->first('rating') }}</small>
                            @endif
                        </div>
                        <div class="d-flex justify-content-end gap-2 mt-30">
                            <button type="button" class="btn btn-secondary rounded"
                                data-bs-dismiss="modal">Huỷ</button>
                            <button type="button" onclick="$('#educationForm').submit()"
                                class="btn btn-primary rounded">Xác nhận</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="staticBackdrop-2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 work-modal-title" id="staticBackdropLabel">Thêm mới quá trình làm
                        việc</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('candidate.profile.create-work') }}" method="POST" id="workForm">
                        @csrf

                        <div class="form-group">
                            <label class="font-sm color-text-mutted font-bold mb-10">Tên công ty/doanh nghiệp
                                *</label>
                            <input class="form-control" type="text" value="{{ old('name_company') }}"
                                name="name_company" required>
                            @if ($errors->has('name_company'))
                                <small class="text-danger">{{ $errors->first('name_company') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="font-sm color-text-mutted font-bold mb-10">Vị trí việc làm/chức vụ
                                *</label>
                            <input class="form-control" type="text" value="{{ old('position') }}"
                                name="position" required>
                            @if ($errors->has('position'))
                                <small class="text-danger">{{ $errors->first('position') }}</small>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted font-bold mb-10">Thời gian bắt đầu
                                        *</label>
                                    <input class="form-control" type="month" value="{{ old('start_date') }}"
                                        name="start_date" required>
                                    @if ($errors->has('start_date'))
                                        <small class="text-danger">{{ $errors->first('start_date') }}</small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="font-sm color-text-mutted font-bold mb-10">Thời gian kết thúc
                                        *</label>
                                    <input class="form-control" type="month" value="{{ old('end_date') }}"
                                        name="end_date" required>
                                    @if ($errors->has('end_date'))
                                        <small class="text-danger">{{ $errors->first('end_date') }}</small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" name="current_working" type="checkbox"
                                id="flexCheckDefault" style="padding: 10px; margin-right: 10px">
                            <label class="form-check-label mt-1 font-bold" for="flexCheckDefault">
                                Công việc hiện tại
                            </label>
                            @if ($errors->has('current_working'))
                                <small class="text-danger">{{ $errors->first('current_working') }}</small>
                            @endif
                        </div>
                        <div class="form-group">
                            <label class="font-sm color-text-mutted font-bold mb-10">Mô tả chi tiết công việc
                                *</label>
                            <textarea name="description" id="" cols="30" rows="3">{{ old('description') }}</textarea>
                            @if ($errors->has('description'))
                                <small class="text-danger">{{ $errors->first('description') }}</small>
                            @endif
                        </div>
                        <div class="d-flex justify-content-end gap-2 mt-30">
                            <button type="button" class="btn btn-secondary rounded"
                                data-bs-dismiss="modal">Huỷ</button>
                            <button type="button" onclick="$('#workForm').submit()"
                                class="btn btn-primary rounded">Xác nhận</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {

            var editId = ""
            var editMode = false

            function fetchEducation() {
                $.ajax({
                    url: "{{ route('candidate.profile.get-education') }}",
                    type: "GET",
                    beforeSend: function() {
                        showPreloader()
                    },
                    success: function(response) {
                        $(".education-table").html(response)
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    },
                    complete: function() {
                        hidePreloader()
                    }
                })
            }

            function fetchWork() {
                $.ajax({
                    url: "{{ route('candidate.profile.get-work') }}",
                    type: "GET",
                    beforeSend: function() {
                        showPreloader()
                    },
                    success: function(response) {
                        $(".work-table").html(response)
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    },
                    complete: function() {
                        hidePreloader()
                    }
                })
            }

            $(".btn-create-education").on('click', function(e) {

                $(".education-modal-title").text('Thêm mới học vấn/bằng cấp');

                $("#educationForm").trigger('reset');
                editMode = false
                editId = ""
            })

            $("#educationForm").on('submit', function(e) {
                e.preventDefault();
                const formData = $(this).serialize();

                if (editMode) {
                    $.ajax({
                        url: "{{ route('candidate.profile.update-education', ':id') }}".replace(
                            ':id', editId),
                        type: "POST",
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        beforeSend: function() {
                            showPreloader()
                        },
                        success: function(response) {
                            if (response.success) {
                                // window.location.reload();
                                flasher.success(response.message);
                                fetchEducation()
                                editMode = false
                                editId = ""
                                $('#staticBackdrop-1').modal('hide');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        },
                        complete: function() {
                            hidePreloader()
                        }
                    })
                } else {
                    $.ajax({
                        url: "{{ route('candidate.profile.create-education') }}",
                        type: "POST",
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        beforeSend: function() {
                            showPreloader()
                        },
                        success: function(response) {
                            if (response.success) {
                                // window.location.reload();
                                flasher.success(response.message);
                                fetchEducation()
                                editMode = false
                                editId = ""
                                $('#staticBackdrop-1').modal('hide');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        },
                        complete: function() {
                            hidePreloader()
                        }
                    })
                }


            })

            $("body").on('click', ".edit-education", function(e) {

                $(".education-modal-title").text('Chỉnh sửa học vấn/bằng cấp');

                $("#educationForm").trigger('reset');

                let url = $(this).attr('href');

                $.ajax({
                    url: url,
                    type: "GET",
                    beforeSend: function() {
                        showPreloader()
                    },
                    success: function(response) {
                        editId = response.data.id
                        editMode = true

                        if (response.success) {
                            $.each(response.data, function(key, value) {
                                $("input[name=" + key + "]").val(value);
                                $("select[name=" + key + "]").val(value);
                            })
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    },
                    complete: function() {
                        hidePreloader()
                    }
                })
            })

            $(".btn-create-work").on('click', function(e) {

                $(".work-modal-title").text('Thêm mới học vấn/bằng cấp');

                $("#workForm").trigger('reset');
                editMode = false
                editId = ""
            })

            $("#workForm").on('submit', function(e) {
                e.preventDefault();
                const formData = $(this).serialize();

                if (editMode) {
                    $.ajax({
                        url: "{{ route('candidate.profile.update-work', ':id') }}".replace(
                            ':id', editId),
                        type: "POST",
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        beforeSend: function() {
                            showPreloader()
                        },
                        success: function(response) {
                            if (response.success) {
                                // window.location.reload();
                                flasher.success(response.message);
                                fetchWork()
                                editMode = false
                                editId = ""
                                $('#staticBackdrop-2').modal('hide');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        },
                        complete: function() {
                            hidePreloader()
                        }
                    })
                } else {
                    $.ajax({
                        url: "{{ route('candidate.profile.create-work') }}",
                        type: "POST",
                        data: formData,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        beforeSend: function() {
                            showPreloader()
                        },
                        success: function(response) {
                            if (response.success) {
                                // window.location.reload();
                                flasher.success(response.message);
                                fetchWork()
                                editMode = false
                                editId = ""
                                $('#staticBackdrop-2').modal('hide');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log(error);
                        },
                        complete: function() {
                            hidePreloader()
                        }
                    })
                }
            })

            $("body").on('click', ".edit-work", function(e) {

                $(".work-modal-title").text('Chỉnh sửa quá trình làm việc');

                $("#workForm").trigger('reset');

                let url = $(this).attr('href');

                $.ajax({
                    url: url,
                    type: "GET",
                    beforeSend: function() {
                        showPreloader()
                    },
                    success: function(response) {
                        editId = response.data.id
                        editMode = true

                        if (response.success) {
                            $.each(response.data, function(key, value) {
                                $("input[name=" + key + "]").val(value);
                                $("textarea[name=" + key + "]").val(value);
                                $("input[name=" + key + "]").prop('checked', value ==
                                    1 ? true : false);
                            })
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(error);
                    },
                    complete: function() {
                        hidePreloader()
                    }
                })
            })
        });
    </script>
@endpush

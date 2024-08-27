<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">
            Thông tin ứng tuyển
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-7">
                <h6>Ảnh đại diện</h6>
                <div class="image-profile mb-20"><img
                        src="{{ @$candidate ? asset($candidate?->image) : 'https://cdn.viettablet.com/images/news/30/image-1536378713-nokia-9-penta-lens-render-by-benjamin-geskin_1200x800-800-resize.jpg' }}"
                        alt="joblist">
                </div>
            </div>
            <div class="col-5">
                <a href="{{ route('candidate-info.show', $candidate->slug) }}" target="_blank"><button type="button"
                        class="btn btn-primary">
                        Chi tiết ứng viên
                    </button></a>

            </div>
        </div>
        <div class="d-flex gap-2 align-items-end mb-5">
            <h6 for="" class="font-bold">Họ và tên:</h6>
            <p style="font-size: 15px">{{ $candidate?->full_name }}</p>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="d-flex gap-2 align-items-end mb-5">
                    <h6 for="" class="font-bold">Ngày sinh:</h6>
                    <p style="font-size: 15px">
                        {{ date('d-m-Y', strtotime($candidate?->birthday)) }}</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex gap-2 align-items-end mb-5">
                    <h6 for="" class="font-bold">Giới tính:</h6>
                    <p style="font-size: 15px">{{ $candidate?->gender == 'male' ? 'Nam' : 'Nữ' }}
                    </p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="d-flex gap-2 align-items-end mb-5">
                    <h6 for="" class="font-bold">Lĩnh vực nghề ngiệp:</h6>
                    <p style="font-size: 15px">{{ $candidate?->profession->name }}</p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="d-flex gap-2 align-items-end mb-5">
                    <h6 for="" class="font-bold">Kinh nghiệm làm việc:</h6>
                    <p style="font-size: 15px">{{ $candidate?->experience->name }}</p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="d-flex gap-2 align-items-end mb-5">
                    <h6 for="" class="font-bold">CV bản thân:</h6>
                    <a href="{{ asset($candidate?->cv_link) }}" target="_blank" class="text-primary"
                        style="font-size: 15px">Nhấn vào đây để xem CV</a>
                </div>
            </div>
            <div class="col-md-12">
                <div class="d-flex gap-2 align-items-end mb-5">
                    <h6 for="" class="font-bold">Email liên hệ:</h6>
                    <p style="font-size: 15px">{{ $candidate?->email }}</p>
                </div>
            </div>
            <div class="col-md-12">
                <div class="d-flex gap-2 align-items-end mb-5">
                    <h6 for="" class="font-bold">Số điện thoại liên hệ:</h6>
                    <p style="font-size: 15px">{{ $candidate?->phone }}</p>
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group select-style">
                    <h6 for="" class="font-bold mb-10">Nội dung tự giới thiệu bản thân:</h6>
                    <textarea name="message" id="" cols="30" rows="5" disabled>{{ $myJob->message }}</textarea>
                </div>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
    </div>
</div>

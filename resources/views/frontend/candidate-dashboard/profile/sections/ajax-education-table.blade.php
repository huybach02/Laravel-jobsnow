@forelse ($educations as $key => $education)
    <tr>
        <th scope="row">{{ $key + 1 }}</th>
        <td>{{ $education?->name_education }}</td>
        <td>{{ $education?->training_unit }}</td>
        <td>Từ {{ $education?->start_date }} đến {{ $education?->end_date }}
        </td>
        <td>{{ $education?->rating }}</td>
        <td>
            <a href="{{ route('candidate.profile.edit-education', $education?->id) }}"
                class="btn btn-primary btn-sm rounded edit-education" style="padding: 6px 8px;font-size: 12px"
                data-bs-toggle="modal" data-bs-target="#staticBackdrop-1">
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

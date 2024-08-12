@forelse ($works as $key => $work)
    <tr>
        <th scope="row">{{ $key + 1 }}</th>
        <td>{{ $work?->name_company }}</td>
        <td>{{ $work?->position }}</td>
        <td>Từ {{ $work?->start_date }}
            {{ !$work?->current_working ? 'đến ' . $work?->end_date : '' }}
            {{ $work?->current_working ? '(Công việc hiện tại)' : '' }}
        </td>
        <td>{{ $work?->description }}</td>
        <td>
            <a href="{{ route('candidate.profile.edit-work', $work?->id) }}"
                class="btn btn-primary btn-sm rounded edit-work" style="padding: 6px 8px;font-size: 12px"
                data-bs-toggle="modal" data-bs-target="#staticBackdrop-2">
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

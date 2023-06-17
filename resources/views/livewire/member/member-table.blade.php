<tbody class="text-gray-600 fw-bold">
    @foreach ($members as $i => $item)
        <tr>
            <td> {{ ++$i }}</td>
            <td>{{ $item->name }}</td>
            <td> {{ $item->phone_no }}</td>
            <td> {{ Helper::convertDateFullIndo(date('d/m/Y', strtotime($item->created_at))) }}</td>
            <td class="text-end">
                <button class="btn btn-icon btn-light-primary btn-sm me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Reset Password" onclick="resetPassword({{ $item->id }})">
                    <i class="las la-sync fs-3"></i>
                </button>
            </td>
        </tr>
    @endforeach
</tbody>

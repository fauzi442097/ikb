<tbody class="text-gray-600 fw-bold">
    @foreach ($categories as $i => $category)
    <tr>
        <td> {{ ++$i }}</td>
        <td>{{ $category->name }}</td>
        <td class="text-end">
            <button class="btn btn-icon btn-light-primary btn-sm me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubah data" wire:click="showCategory({{ $category->id }})"><i class="far fa-edit"></i></button>
            <button class="btn btn-icon btn-light-danger btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus data" onclick="deleteCategory('{{ $category->id }}')"><i class="la la-trash-alt fs-2"></i></button>
        </td>
    </tr>
    @endforeach
</tbody>

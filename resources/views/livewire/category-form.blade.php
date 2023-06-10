<form wire:submit.prevent="storeCategory" id="form-create-category">
    @csrf
    <div class="modal-body">
        <label class="form-label"> Nama Kategori </label>
        <x-forms.input type="hidden" name="category_id" wire:model="categoryId"/>
        <x-forms.input wire:model.lazy="categoryName" name="category_name"/>

        @error('categoryName')
            <div class="fv-plugins-message-container invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        @error('exceptionError')
            <div class="alert alert-danger d-flex align-items-center p-5 mb-7 mt-7">
                <i class="ki-duotone ki-shield-tick fs-2hx text-danger me-4"><span class="path1"></span><span class="path2"></span></i><div class="d-flex flex-column">
                    <h4 class="mb-1 text-danger">Error</h4>
                    <span>{{ $message }}</span>
                </div>
            </div>
        @enderror
    </div>

    <div class="modal-footer">
        <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary btn-sm">Save changes</button>
    </div>
</form>

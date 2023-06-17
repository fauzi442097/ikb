<form wire:submit.prevent="updatePassword" id="form-upload-category">
    @csrf

    @error('exceptionError')
        <div class="alert alert-danger d-flex align-items-center p-5">
            <i class="ki-duotone ki-shield-tick fs-2hx text-danger me-4"><span class="path1"></span><span class="path2"></span></i><div class="d-flex flex-column">
                <h4 class="mb-1 text-danger">Error</h4>
                <span>{{ $message }}</span>
            </div>
        </div>
    @enderror


    <div class="fv-row mb-6">
        <label class="form-label fw-bold text-dark fs-6">Password Lama</label>
        <x-forms.input-password class="form-control-solid" wire:model.lazy="oldPassword" />
        @error('oldPassword')
            <x-alert-invalid-input> {{  $message }} </x-alert-invalid-input>
        @enderror
    </div>

    <div class="fv-row mb-6">
        <label class="form-label fw-bold text-dark fs-6">Password Baru</label>
        <x-forms.input-password class="form-control-solid" wire:model.lazy="newPassword" />
        @error('newPassword')
            <x-alert-invalid-input> {{  $message }} </x-alert-invalid-input>
        @enderror
    </div>

    <div class="fv-row mb-6">
        <label class="form-label fw-bold text-dark fs-6">Konfirmasi Password Baru</label>
        <x-forms.input-password class="form-control-solid" wire:model.lazy="confirmNewPassword" />
        @error('confirmNewPassword')
            <x-alert-invalid-input> {{  $message }} </x-alert-invalid-input>
        @enderror
    </div>

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-custom-primary flex-grow-1" wire:loading.attr="disabled">
            <span wire:loading.class="d-none" class="indicator-label">Simpan</span>
            <div wire:loading>
                <span> Processing...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </div>
        </button>
    </div>
</form>

<form wire:submit.prevent="storeMember" id="form-upload-category">
    @csrf

    <div class="mb-4">
        <p class="text-muted fs-6">Silakan lengkapi data Anda</p>
    </div>

    @error('exceptionError')
        <div class="alert alert-danger d-flex align-items-center p-5">
            <i class="ki-duotone ki-shield-tick fs-2hx text-danger me-4"><span class="path1"></span><span class="path2"></span></i><div class="d-flex flex-column">
                <h4 class="mb-1 text-danger">Error</h4>
                <span>{{ $message }}</span>
            </div>
        </div>
    @enderror

    <div class="fv-row mb-6 mb-lg-10">
        <label class="form-label text-dark fs-6">NIK</label>
        <x-forms.input wire:model.lazy="nik" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" name="nik" autocomplete="off" class="form-control-solid" maxLength="16" />
        @error('nik')
            <x-alert-invalid-input> {{  $message }} </x-alert-invalid-input>
        @enderror
    </div>

    <div class="fv-row mb-6 mb-lg-10">
        <label class="form-label text-dark fs-6">Nama Lengkap</label>
    <x-forms.input name="name" wire:model.lazy="name" autocomplete="off" class="form-control-solid" />
        @error('name')
            <x-alert-invalid-input> {{  $message }} </x-alert-invalid-input>
        @enderror
    </div>
    <div class="fv-row mb-6 mb-lg-10">
        <label class="form-label text-dark fs-6">Tempat Lahir</label>
        <x-forms.input name="birthPlace" wire:model.lazy="birthPlace" autocomplete="off" class="form-control-solid" />
        @error('birthPlace')
            <x-alert-invalid-input> {{  $message }} </x-alert-invalid-input>
        @enderror
    </div>

    <div class="fv-row mb-6 mb-lg-10">
        <label class="form-label text-dark fs-6">Tanggal Lahir</label>
        <x-forms.input-date name="birthDate" placeholder="dd/mm/yyyy" wire:model.lazy="birthDate" autocomplete="off" class="form-control-solid" />
        @error('birthDate')
            <x-alert-invalid-input> {{  $message }} </x-alert-invalid-input>
        @enderror
    </div>

    <div class="fv-row mb-6 mb-lg-10">
        <label class="form-label text-dark fs-6">No HP</label>
        <x-forms.input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="15" minLength="10" name="phone_no" wire:model.lazy="phoneNo" autocomplete="off" class="form-control-solid" />
        @error('phoneNo')
            <x-alert-invalid-input> {{  $message }} </x-alert-invalid-input>
        @enderror
    </div>
    <div class="fv-row mb-6 mb-lg-10">
        <label class="form-label text-dark fs-6">Alamat</label>
        <x-forms.textarea name="address" wire:model.lazy="address" class="form-control-solid" />
        @error('address')
            <x-alert-invalid-input> {{  $message }} </x-alert-invalid-input>
        @enderror
    </div>
    <div class="fv-row mb-6 mb-lg-10">
        <label class="form-label text-dark fs-6">Email <span class="text-muted fs-7"> (Opsional) </span></label>
        <x-forms.input name="email" wire:model.lazy="email" class="form-control-solid" />
        @error('email')
            <x-alert-invalid-input> {{  $message }} </x-alert-invalid-input>
        @enderror
    </div>
    <div class="fv-row mb-6 mb-lg-10">
        <label class="form-label text-dark fs-6">Username </label>
        <x-forms.input name="username" wire:model.lazy="username" class="form-control-solid" minLength="3" maxLength="30" />
        @error('username')
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

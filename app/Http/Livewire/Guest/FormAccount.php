<?php

namespace App\Http\Livewire\Guest;

use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use App\Models\User;
use DB, Log;


class FormAccount extends Component
{

    public $oldPassword;
    public $newPassword;
    public $confirmNewPassword;

    public function formRules()
    {
        return [
            'oldPassword' => ['required', 'min:5', 'max:30', 'current_password'],
            'newPassword' => ['required', 'min:5', 'max:30', 'different:oldPassword'],
            'confirmNewPassword' => ['required', 'min:5', 'max:30', 'same:newPassword'],
        ];
    }

    public function formValidationMessage()
    {
        return [
            'current_password' => 'Password lama salah',
            'min' => 'Minimal diisi :min karakter',
            'max' => 'Maksimal diisi :max karakter',
            'required' => 'Wajib diisi',
            'same' => 'Konfirmasi password harus sama dengan password baru',
            'different' => 'Password baru tidak boleh sama dengan password lama'
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, $this->formRules(), $this->formValidationMessage());
    }

    public function render()
    {
        return view('livewire.guest.form-account');
    }

    public function updatePassword()
    {
        $validatedData = $this->validate($this->formRules(), $this->formValidationMessage());
        DB::beginTransaction();
        try {

            User::where('id', auth()->user()->id)
                ->update([
                    'password' => bcrypt($validatedData['confirmNewPassword'])
                ]);

            DB::commit();
            $nextRoute = route('guest.profile');
            $this->emit('password_updated', 'Password berhasil diubah', $nextRoute);
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollback();
            $this->addError('exceptionError', 'Terjadi kesalahan pada server');
        }
    }
}

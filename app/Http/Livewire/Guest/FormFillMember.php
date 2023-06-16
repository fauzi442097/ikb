<?php

namespace App\Http\Livewire\Guest;

use App\Models\Member;
use App\Models\User;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use DB, Log;

class FormFillMember extends Component
{
    public $nik;
    public $name;
    public $birthPlace;
    public $birthDate;
    public $phoneNo;
    public $address;
    public $email;
    public $type;

    public function formRules()
    {
        return [
            'nik' => 'required|digits:16',
            'name' => 'required|max:100',
            'birthPlace' => 'required|max:100',
            'birthDate' => 'required|date_format:d/m/Y',
            'phoneNo' => 'required|digits_between:10,15',
            'address' => 'required',
            'email' => ['nullable', 'email', Rule::unique('users')->ignore(auth()->user()->id)]
        ];
    }

    public function formValidationMessage()
    {
        return [
            'digits' => 'NIK hanya boleh diisi :digits angka',
            'date_format' => 'Format tanggal lahir tidak sesuai dengan ketentuan (dd/mm/yyyy)',
            'phoneNo.digits_between' => 'No HP minimal diisi 10 sampai 15 digit Angka',
            'required' => 'Wajib diisi',
            'numeric' => 'Hanya boleh diisi angka',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah digunakan',
        ];
    }

    public function updated($propertyName)
    {
        $this->emit('re_render_form');
        $this->validateOnly($propertyName, $this->formRules(), $this->formValidationMessage());
    }

    public function getDataMember()
    {
        return Member::leftJoin('users', 'users.id', 'members.user_id')
            ->where('users.id', auth()->user()->id)
            ->first();
    }

    public function mount()
    {
        $dataMember = $this->getDataMember();
        if ( empty($dataMember)) {
            $this->name = auth()->user()->name;
            $this->email = auth()->user()->email;
        } else {
            $this->nik = $dataMember->nik;
            $this->name = $dataMember->name;
            $this->birthPlace = $dataMember->birth_place;
            $this->birthDate = date('d/m/Y', strtotime($dataMember->birth_date));
            $this->phoneNo = $dataMember->phone_no;
            $this->address = $dataMember->address;
            $this->email = $dataMember->email;
        }
    }

    public function render()
    {
        return view('livewire.guest.form-fill-member');
    }

    public function storeMember()
    {
        $validatedData = $this->validate($this->formRules(), $this->formValidationMessage());
        DB::beginTransaction();
        try {

            $birthDateFormatted = join('-', array_reverse(explode('/', $validatedData['birthDate'])));
            User::where('id', auth()->user()->id)
                     ->update([
                        'name' => $validatedData['name'],
                        'email' => $validatedData['email'],
                    ]);

            Member::where('user_id', auth()->user()->id)
                ->update([
                    'nik' => $validatedData['nik'],
                    'name' => $validatedData['name'],
                    'birth_place' => $validatedData['birthPlace'],
                    'birth_date' => $birthDateFormatted,
                    'phone_no' => $validatedData['phoneNo'],
                    'address' => $validatedData['address'],
                    'user_upd_id' => auth()->user()->id,
                    'data_complete' => true
                ]);

            DB::commit();

            $nextRoute = route('guest.home');
            $message = 'Data berhasil disimpan <br> Terima kasih telah melengkapi data';
            if ( !is_null($this->type)) {
                $nextRoute = route('guest.profile');
                $message = 'Data berhasil disimpan';
            }

            $this->emit('data_member_updated', $message, $nextRoute);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e);
            $this->addError('exceptionError', 'Terjadi kesalahan pada server');
        }
    }
}

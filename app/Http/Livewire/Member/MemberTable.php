<?php

namespace App\Http\Livewire\Member;

use Livewire\Component;
use App\Models\Member;
use App\Models\User;

class MemberTable extends Component
{
    public $members;

    protected $listeners = [
        'resetPassword' => 'resetPassword',
        'renderTableMember' => 'getMember'
    ];

    public function getMember()
    {
        $this->members = Member::orderBy('id', 'DESC')->get();
    }

    public function mount()
    {
        $this->getMember();
    }

    public function resetPassword(Member $member)
    {
        try {
            User::where('id', $member->user_id)->update(['password' => bcrypt('IKB@2023')]);
            $this->emit('renderTableMember', 'success', 'Password berhasil direset');
        } catch (\Exception $e) {
            Log::error($e);
            $this->emit('renderTableMember', 'error', 'Terjadi kesalahan pada server');
        }
    }

    public function render()
    {
        return view('livewire.member.member-table');
    }
}

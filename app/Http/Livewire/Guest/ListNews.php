<?php

namespace App\Http\Livewire\Guest;

use Livewire\Component;
use App\Models\News;
use Livewire\WithPagination;

class ListNews extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function getNews()
    {
        return News::withCount('comments')->with('category')->orderBy('id', 'DESC')->paginate(5);
    }

    public function render()
    {
        return view('livewire.guest.list-news', ['news' => $this->getNews()]);
    }
}

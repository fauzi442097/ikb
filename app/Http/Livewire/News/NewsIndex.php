<?php

namespace App\Http\Livewire\News;

use Livewire\Component;
use App\Models\News;
use Livewire\WithPagination;
use Log;


class NewsIndex extends Component
{
    // public $news;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'deleteNews' => 'deleteNews',
        'renderNews' => 'getNews'
    ];

    public function deleteNews(News $news)
    {
        try {
            $news->delete();
            $this->emit('renderNews', 'success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            Log::error($e);
            $this->emit('renderNews', 'error', 'Terjadi kesalahan pada server');
        }
    }

    public function getNews()
    {
        return News::withCount('comments')->with('category')->orderBy('id', 'DESC')->paginate(8);
    }

    public function render()
    {
        return view('livewire.news.news-index', ['news' => $this->getNews()]);
    }

}

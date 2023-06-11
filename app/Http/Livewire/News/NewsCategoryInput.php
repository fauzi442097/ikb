<?php

namespace App\Http\Livewire\News;

use Livewire\Component;
use App\Models\Category;

class NewsCategoryInput extends Component
{
    public $categories;

    protected $listeners = ['renderCategories' => 'getCategories'];

    public function getCategories() {
        $this->categories = Category::OrderNewestId()->get();
    }

    public function updating()
    {
        $this->getCategories();
    }

    public function mount()
    {
        $this->getCategories();
    }

    public function render()
    {
        return view('livewire.news.news-category-input');
    }
}

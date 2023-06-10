<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Log;


class CategoryTable extends Component
{
    public $categories;
    public $categoryId;

    protected $listeners = [
        'renderTableCategory' => 'getCategories',
        'deleteCategory' => 'deleteCategory'
    ];

    public function getCategories()
    {
        $this->categories = Category::OrderNewestId()->get();
    }

    public function showCategory($categoryId)
    {
        $this->emit('setCategory', $categoryId);
    }

    public function deleteCategory(Category $category)
    {
        try {
            $category->delete();
            $this->emit('renderTableCategory', 'success', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            Log::error($e);
            if ( $e->getCode() == '23503' ) return $this->emit('renderTableCategory', 'warning', 'Tidak dapat dihapus <br> Kategori ini sedang digunakan');
            $this->emit('renderTableCategory', 'error', 'Terjadi kesalahan pada server');
        }
    }

    public function mount()
    {
        $this->getCategories();
    }

    public function render()
    {
        return view('livewire.category-table');
    }

}

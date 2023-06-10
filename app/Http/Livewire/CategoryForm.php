<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Log;

class CategoryForm extends Component
{
    public $categoryName;
    public $categoryId;


    protected $listeners = ['setCategory'];

    protected $rules = [
        'categoryName' => 'required|min:2',
        'categoryId' => 'nullable'
    ];

    protected $messages = [
        'required' => 'Wajib diisi',
        'min' => 'Minimal diisi :min karakter',
        'unique' => 'Nama kategori sudah tersedia'
    ];

    public function setCategory(Category $category)
    {
        $this->categoryName = $category->name;
        $this->categoryId = $category->id;
    }

    public function render()
    {
        return view('livewire.category-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function storeData($arrData)
    {
        if ( is_null($arrData['categoryId'])) {
            $model = new Category;
            $model->user_crt_id = auth()->user()->id;
            $model->created_at = date('Y-m-d H:i:s');
        } else {
            $model = Category::find($arrData['categoryId']);
            $model->user_upd_id = auth()->user()->id;
            $model->updated_at = date('Y-m-d H:i:s');
        }
        $model->name = trim($arrData['categoryName']);
        $model->save();
    }

    public function storeCategory()
    {
        $validatedData = $this->validate();
        try {
            $this->storeData($validatedData);
            $this->emit('categoryCreated');
        } catch (\Exception $e) {
            Log::error($e);
            if ( $e->getCode() == '23505') {
                return $this->addError('categoryName', 'Nama kategori sudah tersedia');
            }
            $this->addError('exceptionError', 'Terjadi kesalahan pada server');
        }
    }
}

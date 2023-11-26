<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductOption;
class Productoptions extends Component
{
    public function render()
    {
        return view('livewire.productoptions',['productoption'=>ProductOption::all()]);
    }
    public Product $product;
    public $options = [];

    protected $rules = [
        'options.*.name' => 'required',
        'options.*.quantity' => 'required|integer|min:0',
    ];

    public function mount(Product $product)
    {
        $this->product = $product;
        $this->loadOptions();
    }

    public function addOption()
    {
        $this->options[] = ['name' => '', 'quantity' => 0];
    }

    public function removeOption($index)
    {
        if (isset($this->options[$index]['id'])) {
            $option = $this->product->options()->find($this->options[$index]['id']);
            if ($option) {
                $option->delete();
            }
        }
        array_splice($this->options, $index, 1);
    }

    public function saveOptions()
    {
        $this->validate();

        foreach ($this->options as $optionData) {
            if (isset($optionData['id'])) {
                $option = $this->product->options()->find($optionData['id']);
                if ($option) {
                    $option->update($optionData);
                }
            } else {
                $this->product->options()->create($optionData);
            }
        }

        $this->loadOptions();
    }

    private function loadOptions()
    {
        $this->options = $this->product->options()->get()->toArray();
    }
}

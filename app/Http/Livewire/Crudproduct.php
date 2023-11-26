<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use App\Models\Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

class Crudproduct extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $q;
    public $queryString = [
        'q' => ['except' => ''],
        'sortBy' => ['except' => 'id'],
        'sortAsc' => ['except' => true]
    ];
    public $sortBy = 'id';
    public $sortAsc = true;
    public $currentToDelete = false;
    public $currentToAdd = false;
    public $currentToEdit = false;
    public $user_id;
    public $name, $slug, $description, $images, $price, $discount_price,$status ,$category_id;
    public $oldImages = [];

    protected $rules = [
        'name' => 'required',
        'slug' => 'required',
        'description' => 'required',
        'images.*' => 'nullable|image|mimes:jpeg,png,gif,svg|max:1024',
        'price' => 'required|numeric',
        'discount_price' => 'nullable|numeric',
        'status' => 'required|boolean',
        'category_id' => 'required|exists:categories,id',
    
    ];

    public function render()
    {
        $products = Product::with('category')
            ->when($this->q, function ($query) {
                $query->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->q . '%')
                        ->orWhere('description', 'like', '%' . $this->q . '%');
                });
            })
            ->orderBy($this->sortBy, $this->sortAsc ? 'ASC' : 'DESC')
            ->paginate(3);

        return view('livewire.crudproduct', ['products'=>$products,'categories'=>Category::all()]);
    }

    public function updatingActive()
    {
        $this->resetPage();
    }

    public function updatingQ()
    {
        $this->resetPage();
    }

    public function setCurrentToDelete($id)
    {
        $this->currentToDelete = $id;
    }

    public function productDeletion(Product $product)
    {
        Storage::delete($product->images);
        $product->delete();
        $this->currentToDelete = false;
    }

    public function setCurrentToAdd()
    {
        $this->reset();
        $this->currentToAdd = true;
    }

    public function setCurrentToEdit($id)
    {
        $this->reset();
        $this->currentToEdit = Product::findOrFail($id);
        $this->name = $this->currentToEdit->name;
        $this->slug = $this->currentToEdit->slug;
        $this->description = $this->currentToEdit->description;
        $this->price = $this->currentToEdit->price;
        $this->discount_price = $this->currentToEdit->discount_price;
        $this->discount_price = $this->currentToEdit->status;
        $this->category_id = $this->currentToEdit->category_id;
        $this->oldImages = $this->currentToEdit->images;
    }
    public function addProduct()
    {
        if ($this->currentToEdit) {
            $this->validate([
                'name' => 'required',
                'slug' => ['required', Rule::unique('products')->ignore($this->currentToEdit->id)],
                'description' => 'required',
                'images.*' => 'nullable|image|mimes:jpeg,png,gif,svg|max:1024',
                'price' => 'required|numeric',
                'discount_price' => 'nullable|numeric',
                'status' => 'required|boolean',
                'category_id' => 'required|exists:categories,id',
            ]);
    
            $this->currentToEdit->update([
                'name' => $this->name,
                'slug' => $this->slug,
                'description' => $this->description,
                'price' => $this->price,
                'discount_price' => $this->discount_price,
                'status' => $this->status ? true : false,
                'category_id' => $this->category_id,
                'user_id' => Auth::user()->id,
            ]);
    
            // Handle image updates
            if ($this->images) {
                foreach ($this->images as $index => $image) {
                    if ($image) {
                        if ($this->oldImages && isset($this->oldImages[$index])) {
                            Storage::delete($this->oldImages[$index]);
                        }
    
                        $imagePath = $image->store('public/product-images');
                        $this->currentToEdit->images()->updateOrCreate(['id' => $index + 1], [
                            'slug' => $imagePath,
                        ]);
                    }
                }
            }
    
            $this->currentToEdit->save();
            $this->reset();
        } else if ($this->currentToAdd) {
            $this->validate([
                'name' => 'required',
                'slug' => 'required|unique:products',
                'description' => 'required',
                'images.*' => 'required|image|mimes:jpeg,png,gif,svg|max:1024',
                'price' => 'required|numeric',
                'discount_price' => 'nullable|numeric',
                'status' => 'required|boolean',
                'category_id' => 'required|exists:categories,id',
            ]);
    
            $productData = [
                'name' => $this->name,
                'slug' => $this->slug,
                'description' => $this->description,
                'price' => $this->price,
                'discount_price' => $this->discount_price,
                'status' => $this->status ? true : false,
                'category_id' => $this->category_id,
                'user_id' => Auth::user()->id,
            ];
    
            $product = Product::create($productData);
    
            if ($this->images) {
                foreach ($this->images as $index => $image) {
                    if ($image) {
                        $imagePath = $image->store('public/product-images');
                        $product->images()->create([
                            'slug' => $imagePath,
                        ]);
                    }
                }
            }
    
            $product->save();
            $this->currentToAdd = false;
        }
    }
    
}

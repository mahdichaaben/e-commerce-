<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Crudcategory extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $q;
    public $queryString=["q"=>["except"=>''],
"sortBy"=>["except"=>"id"],
"sortAsc"=>["except"=>true]];
    public $sortBy="id";
    public $sortAsc=true;
    public $currentToDelete=false;
    public $currentToAdd=false;
    public $currentToEdit=false;
    public $name,$image,$parent_id;
    public $oldImage;
    public function render()
    {
        $categories=Category::when(
            $this->q,function($query){
                return $query->where(function($query){
                    $query->where('name','like','%'.$this->q.'%');
                });
            }
            
            )->orderBy($this->sortBy,$this->sortAsc?'ASC':'DESC');
            $categories=$categories->paginate(4);
        return view('livewire.crudcategory',['categories'=>$categories,'rootcategories'=>Category::all()->where('level',1)]);

       
    }
    public function updatingActive(){
        $this->resetPage();
    }
    public function updatingQ(){
        $this->resetPage();
    }
    // public function sortBy($field){
    //     if($field==$this->sortBy)
    //     $this->sortBy=$field;
    // }
    
    public function setCurrentTodelete($id){
$this->currentToDelete=$id;
    }

    public function categoryDeletion(Category $category){
        Storage::delete($category->image);
        $category->delete();
        $this->currentToDelete=false;

    }
    public function setCurrentToadd(){
        $this->reset();
        $this->currentToAdd=true;
    }
    public function setCurrentToedit($id){
        $this->reset();
        $this->currentToEdit=Category::where('id',$id)->first();
        $this->name=$this->currentToEdit->name;
        $this->oldImage=$this->currentToEdit->image;
        $this->parent_id=$this->currentToEdit->parent_id;

    }
    public function addCategory(){
        if($this->currentToEdit){
            
            $this->validate([
                'name' => ['required', Rule::unique('categories', 'name')->ignore($this->currentToEdit->id)],
               
                'image' => 'required|mimes:jpeg,png,gif,svg,ico|max:1024',
                'parent_id'=>'nullable|exists:categories,id',
            ]);
           $curimage=$this->currentToEdit->image;
           if($this->image){
            $curimage=$this->image->store('public/icons');
           $this->oldImage=false;
           }
           $this->currentToEdit->update([
            'name'=>$this->name,
            'image'=>$curimage,
             'parent_id'=>$this->parent_id
           ]
        
           );$this->reset();
    

        }else if($this->currentToAdd){
            
            $validateddata=$this->validate([
                'name' => 'required|unique:categories,name',
                'image' => 'required|mimes:jpeg,png,gif,svg,ico|max:1024',
                'parent_id'=>'nullable|exists:categories,id'
            ]);
            $store_icon=$this->image->store('public/icons');
            $validateddata['parent_id']=$this->parent_id;
            $validateddata['level']=$this->parent_id?Category::find($this->parent_id)->level+1:1;
            $validateddata['image']=$store_icon;
            $this->currentToAdd=false;
            Category::create($validateddata);
            
        }
        
    }
    
}

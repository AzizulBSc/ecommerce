<?php

namespace App\Http\Controllers;
use App\Models\Category;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function addCategory (Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $category = new Category;
            $category->name = $data['category_name'];
            $category->parent_id = $data['parent_id'];
            $category->url = $data['category_url'];
            $category->description = $data['category_description'];
            $category->save();
            
          Alert::success('Saved', ' Product has been Saved Successfully!!');
            return redirect('/admin/add-category')->with('flash_message_success','Category Added Successfully!!');
        }
        $levels = Category::where(['parent_id'=>0])->get();
        return view('admin.categories.addCategory')->with(compact('levels'));
    }
    
  public function viewCategory(){
    $category = Category::get();
   return view('admin.categories.viewCategories')->with(compact('category'));
 }

 public function editCategory(Request $request,$id = null){

    if($request->isMethod('post')){
        $data = $request->all();
        Category::where(['id'=>$id])->update([
        'name'=>$data['category_name'],
        'parent_id'=>$data['parent_id'],
        'description'=>$data['category_description'],
        'url'=>$data['category_url']]);
        Alert::success('Updated', ' Category has been Updated Successfully!!');
        return redirect('/admin/view-category');
    }
    $levels = Category::where(['parent_id'=>0])->get();
    $categoryDetails = Category::where(['id'=>$id])->first();
    return view('admin.categories.editCategory')->with(compact('levels','categoryDetails'));
}

public function deleteCategory($id = null)
{
  Category::where(['id' => $id])->delete();
  Alert::warning('Deleted', ' Category Deleted Successfully');
  return redirect('/admin/view-category');
}

}
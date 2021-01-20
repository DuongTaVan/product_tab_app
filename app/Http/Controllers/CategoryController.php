<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('category.index', compact('categories'));
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('uploads/categories/', $filename);
            $data['image'] = 'uploads/categories/' . $filename;
        }
        $category = Category::create($data);

        return redirect()->route('category.index')->with('message', 'add-success !');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.update', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $data = $request->all();
        //dd($data);
        $category = Category::findOrFail($id);
        if($request->hasfile('image'))
        {
            if ($category->image) {
                $old_image = $category->image;
                unlink($old_image);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension(); // getting image extension
            $filename =time().'.'.$extension;
            $file->move('uploads/categories/', $filename);
            $data['image'] = 'uploads/categories/' . $filename;
        }
        $category->update($data);
        return redirect()->route('category.index')->with('message', 'edit-success !');;
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('message', 'delete-success !');
    }
    public function ajax_modal(Request $request){
        if($request->ajax()){
            $html = view('component.modal_category')->render();
            return response([
                'html' => $html
            ]);
        }

    }
    public function ajax_edit_modal(Request $request, $id){
        $category = Category::findOrFail($id);
        if($request->ajax()){
            $html = view('component.modal_category_edit', compact('category'))->render();
            return response([
                'html' => $html
            ]);
        }
    }
}

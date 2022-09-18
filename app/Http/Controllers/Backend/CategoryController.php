<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Backend\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Traits\Backend\FileUpload\FileUploadTrait;

class CategoryController extends Controller
{
    use FileUploadTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private function getPrantCategoryId($category_id=null)
    {
        $parent_id='parent_id';
        if ($category_id) {
            $category=Category::find($category_id);
            if ($category->sub_sub_id) {
                $parent_id='sub_sub_sub_id';
            }else if ($category->sub_id) {
                $parent_id='sub_sub_id';
            }else if ($category->parent_id) {
                $parent_id='sub_id';
            }else  {
                $parent_id='parent_id';
            }
        }
        return $parent_id;
    }
    public function index()
    {
        $data['categories'] = Category::orderBy('custom_serial','ASC')
                                        ->orderBy('id','DESC')
                                        ->get();
        $data['maincategories'] = Category::where('main_cat',1)
                                ->orderBy('custom_serial','ASC')
                                ->orderBy('id','DESC')
                                ->get();
        return view('backend.category.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function slug(Request $request)
    {
        $slug =  Str::slug($request->name,'-');
        return response()->json(['slug' => $slug]);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->validate([
            'name'          => 'required|string|max:400|unique:categories,name',
            'slug'          => 'required|string|max:500|unique:categories,slug',
            'parent_id'     => $request->category_type == 2 ? 'required' : 'nullable',
            'description'   => '',
        ]);
        //$data[$this->getPrantCategoryId(request('category_id'))] = request('category_id');
        $data['status']         = 1;
        $data['created_by']     = auth()->user()->id;
        $data['custom_serial']  = $request->category_type == 1 ? $request->custom_serial : NULL;

        $data['main_cat']       = $request->category_type == 1  ? 1 : NULL;
        $data['parent_id']      = $request->category_type == 1  ? 0 : $request->parent_id;
       
        $category = Category::create($data);

        if(isset($request->photo))
        {
            $this->destination  = 'category';  //its mandatory
            $this->imageWidth   = 400;  //its mandatory
            $this->imageHeight  = 400;  //its nullable
            $this->requestFile  = $request->photo;  //its mandatory
            $category->photo    = $this->storeImage();
            $category->save();
        }
        return redirect()->route('admin.category.index')->with('success','Category added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Backend\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $data['maincategories'] = Category::where('main_cat',1)
                                ->orderBy('custom_serial','ASC')
                                ->orderBy('id','DESC')
                                ->get();
        $data['category']   = $category;
        $view =  view('backend.category.edit',$data)->render();
        return response()->json([
            'status' => true,
            'html' => $view
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backend\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $category=Category::find($id);

        $data=$request->validate([
            'name'          => 'required|string|max:400|unique:categories,name,'.$category->id,
            'slug'          => 'required|string|max:500|unique:categories,slug,'.$category->id,
            'parent_id'     => $request->category_type == 2 ? 'required' : 'nullable',
            'description'   => '',
        ]);

        $old_column=[
            'custom_serial' =>null,
            'main_cat'      =>null,
            'parent_id'     =>null,
        ];
        $category->update($old_column);

        //$data[$this->getPrantCategoryId(request('category_id'))]=request('category_id');

        $data['custom_serial']  = $request->category_type == 1 ? $request->custom_serial : NULL;
        $data['main_cat']       = $request->category_type == 1 ? 1 : NULL;
        $data['parent_id']      = $request->category_type == 1 ? 0 : $request->parent_id;
        $category->update($data);

        if(isset($request->cat_photo))
        {
            $this->destination  = 'category';  //its mandatory
            $this->imageWidth   = 400;  //its mandatory
            $this->imageHeight  = 400;  //its nullable
            $this->requestFile  = $request->cat_photo;  //its mandatory
            $this->dbImageField = $category->photo;  //its mandatory
            $category->photo    = $this->updateImage();
            $category->save();
        }
        return redirect()->route('admin.category.index')->with('success','Category Updated successfully');
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backend\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function delete(Category $category)
    {
        $data['category'] = $category;
        $view =  view('backend.category.delete',$data)->render();
        return response()->json([
            'status' => true,
            'html' => $view
        ]);
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        /* $category->deleted_at = date('Y/m/d h:i:s');
        $category->save(); */
        if($category->parentCategories()->count() > 0){
            return redirect()->back()->with('error','Please sub-category delete first');
        }
        if($category->categoryPosts()->count() > 0){
            return redirect()->back()->with('error','Please post delete first');
        }
      
        $category->delete();
        return redirect()->route('admin.category.index')->with('success','Category Deleted Successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Backend\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function bulkDestroy(Request $request)
    {
        ini_set('max_execution_time', 28800);
        /* Category::whereIn('id',$request->ids)->update([
            'deleted_at' => date('Y/m/d h:i:s')
        ]); */
        $cates = Category::whereIn('id',$request->ids)->get();
        $categoryFirst = 0;
        foreach($cates as $cat){
            if(($cat->categoryPosts()->count() > 0 ) 
                || ($cat->parentCategories()->count() > 0)
            )
            {
                $categoryFirst = 1;
            }
            else{
                $cat->delete();
            }
        }
        
        if($categoryFirst == 1)
        {
            return response()->json([
                'status' => true,
                'mess' => "Post delete first,some category or sub-category is deleted or not"
            ]);
        }else{
            return response()->json([
                'status' => true,
                'mess' => "Category Deleted Successfully"
            ]);
        }
        
    }



}

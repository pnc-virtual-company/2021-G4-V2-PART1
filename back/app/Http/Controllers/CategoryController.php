<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Category::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $category=new Category();
        $category->name=$request->name;
        $category->save();

        return response()->json("Category Create");
        return response()->json(["message"=> "Category created"], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Category::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $category=Category::findOrFail($id);
        $category->name=$request->name;
        $category->save();
        if($category){
            return response()->json(["message"=>"Category Updated"], 200);
        }
        else{
            return response()->json(["message"=>"Category not found"], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $isDeleted = Category::destroy($id);
        if($isDeleted){
            return response()->json(['message' => 'deleted'],200);
        }else{
            return response()->json(['message' => 'ID NOT FOUND'],404);
        }
    }
}

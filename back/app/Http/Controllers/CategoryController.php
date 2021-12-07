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
        return Category::join('users', 'categories.user_id', '=', 'users.id')->orderBy('categories.id', 'desc')->get(['users.firstname', 'categories.name', 'categories.user_id', 'categories.id']);
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
        $request->validate([
            'name' => 'required|unique:categories|min:3|max:30',
        ]);

        $category=new Category();
        $category->name=$request->name;
        $category->user_id=$request->user_id;
        $category->save();

        return response()->json(["message"=> "Category created", "data"=> $category], 201);
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
        $category->user_id=$request->user_id;
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return Category::where('name','like', '%'. $name . '%')->get();
    }

    // ___________________Join users and categories___________________ //

    // public function getUsername()
    // {
    //     $username = Category::join('users', 'categories.user_id', '=', 'users.id')->get(['users.firstname', 'categories.name', 'categories.id']);
    //     return $username;
    // }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Join;

class JoinController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $join = new Join();

        $join->user_id = $request->user_id;
        $join->event_id = $request->event_id;

        return response()->json(["message"=> "joined successfully"], 201);
    }


    /**
     * Get resource from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return Join::latest()->get();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDeleted = join::destroy($id);

        if($isDeleted){
            return response()->json(['message' => 'quit'],200);
        }else{
            return response()->json(['message' => 'ID NOT FOUND'],404);
        }
    }

}

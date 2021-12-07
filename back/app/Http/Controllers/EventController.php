<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Event::latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => "required|min:5",
            'description' => "required|min:50",
        ]);

        $Event = new Event();
        $Event->category_id = $request->category_id;
        $Event->user_id = $request->user_id;
        $Event->title = $request->title;
        $Event->description = $request->description;
        $Event->departureDate = $request->departureDate;
        $Event->arrivalDate = $request->arrivalDate;
        $Event->location = $request->location;
        $Event->categoryType = $request->categoryType;

        $Event->save();
        return response()->json(['message' => 'create'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Event::findOrFail($id);
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
        $request->validate([
            'title' => "required|min:5",
            'description' => "required|min:50",
        ]);
        
        $Event = Event::findOrFail($id);
        $Event->category_id = $request->category_id;
        $Event->user_id = $request->user_id;
        $Event->title = $request->title;
        $Event->description = $request->description;
        $Event->departureDate = $request->departureDate;
        $Event->arrivalDate = $request->arrivalDate;
        $Event->location = $request->location;
        $Event->categoryType = $request->categoryType;

        $Event->save();

        return response()->json(['message' => 'update'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Event::destroy($id);
        // return reponse()->json(['message'=>'ID NOT EXIST'], 404);
    }
}




<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
// use App\Http\Resources\EventResource;

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
        // return EventResource::collection(Event::all());
        // return Event::all();
        // return Event::join('users','users.id','=','events.user_id')->join('categories','categories.id','=','events.category_id')->select('events.*','users.firstname','categories.name')->latest()->get();
        // return Event::with('category:id,name','user:firstname,id','join:id,user_id,event_id,imageprofile')->latest()->get();
        return Event::with('category','user','join')->latest()->get();
        // return Event::all();
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
            'title' => "required",
            'description' => "required",
            'departureDate' => "required|before:arrivalDate",
            'arrivalDate' => "required|after:departureDate",
            'city' => "required",
            'country' => "required",
            'category_id' => 'required',
            'imagename'=>'nullable|image|mimes:jpg,jpeg,png|max:1999',
        ]);

        $request->file('imagename')->store('public/EventImages');

        $Event = new Event();
        $Event->category_id = $request->category_id;
        $Event->user_id = $request->user_id;
        $Event->title = $request->title;
        $Event->description = $request->description;
        $Event->departureDate = $request->departureDate;
        $Event->arrivalDate = $request->arrivalDate;
        $Event->city = $request->city;
        $Event->country = $request->country;
        $Event->imagename = $request->file('imagename')->hashName();

        $Event->save();
        return response()->json(['message' => 'create','data'=>$Event], 201);
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
            'title' => "required",
            'description' => "required",
            'departureDate' => "required|before:arrivalDate",
            'arrivalDate' => "required|after:departureDate"
        ]);

        $Event = Event::findOrFail($id);
        $Event->category_id = $request->category_id;
        $Event->user_id = $request->user_id;
        $Event->title = $request->title;
        $Event->description = $request->description;
        $Event->departureDate = $request->departureDate;
        $Event->arrivalDate = $request->arrivalDate;
        $Event->city = $request->city;
        $Event->country = $request->country;
        
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
    }


    /**
     * Search the specified resource from storage.
     *
     * @param  str  $title
     * @return \Illuminate\Http\Response
     */
    public function search($title)
    {
        return Event::where('title','like', '%'. $title . '%')->get();
    }
}
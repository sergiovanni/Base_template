<?php

namespace App\Http\Controllers\Event;

use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Models\Events;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Events/Index',[
            'filters' => Request::all('search'),
            'events'  => Events::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return Inertia::render('Events/Create',[]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // //
        Request::validate([
            'type_event' => ['required','string','max:255'],
            'name_event' => ['required','string','max:255'],
            'describe_event' => ['required','string','max:255'],
            'address' => ['nullable','string','max:255'],
            'date_event' => ['required','date','nullable'],
            'time_event' => ['required','date_format:H:i'],
            'nbr_ticket' => ['required','min:2|max:5'],
        ]);
        $events = Events::create(
            Request::only(
                'type_event', 
                'name_event',
                'describe_event',
                'address',
                'date_event',
                'time_event',
                'nbr_ticket',
            )
        );


        return Redirect::route('events.index')->with('success', 'Evènement créé avec succès.');
     
    }

    /**
     * Display the specified resource.http://127.0.0.1:8000/events/create
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Events $event)
    {
        //
        return Inertia::render('Events/Edit',[
            'events'    => $event
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Events $event)
    {
        //
        //dd(Request::get('number'));
        // dd($event);
        Request::validate([
            'type_event' => ['required','string','max:255',"min:5"],
            'name_event' => ['required','string','max:255'],
            'describe_event' => ['required','string','max:255'],
            'address' => ['nullable','string','max:255'],
            'date_event' => ['date'],
            'time_event' => ['date_format:H:i:s'],
            'nbr_personnes' => ['min:1'],
        ]);
        
        $event->update(
            Request::only(
                'type_event',
                'name_event',
                'describe_event',
                'address',
                'date_event',
                'time_event',
                'nbr_personnes',
            )
        );

        return Redirect::route('events.index')->with('success', 'Evènement modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Events $event)
    {
        //
        $event->delete();

        return Redirect::route('events.index')->with('success', 'Evènement supprimé avec succès.');

    }
}

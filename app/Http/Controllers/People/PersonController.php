<?php

namespace App\Http\Controllers\People;

use App\Rules\Email;
use Inertia\Inertia;
use App\Rules\PhoneNumber;
use App\Exports\PeopleExport;
use App\Models\People\Person;
use App\Rules\NationalRegistry;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('People/Index',[
            'filters' => Request::all('search'),
            'people'  => Person::filter(Request::only('search'))->paginate(50),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return Inertia::render('People/Create',[]);
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
            'first_name' => ['required','string','max:255'],
            'last_name' => ['required','string','max:255'],
            'phone' => ['required','integer'],
            'email' => ['nullable','string','max:255'],
        ]);

        $person = Person::create(
            Request::only(
                'first_name',
                'last_name',
                'phone_number',
                'email'
            )
        );

        $person->update([
            'phone_number' => Request::get('phone_number')
        ]);

        return Redirect::route('people.index')->with('success', 'Utilisateur créé avec succès.');

    }

    /**
     * Display the specified resource.http://127.0.0.1:8000/people/create
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
    public function edit(Person $person)
    {
        //
        return Inertia::render('People/Edit',[
            'person'    => $person
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Person $person)
    {
        //
        //dd(Request::get('number'));
        Request::validate([
            'first_name' => ['required','string','max:255'],
            'last_name' => ['required','string','max:255'],
            'phone' => ['required','integer'],
            'email' => ['nullable','string','max:255'],
        ]);

        $person->update(
            Request::only(
                'first_name',
                'last_name',
                'phone_number',
                'email'
            )
        );

        // $person->update([
        //     'phone' => Request::get('number')
        // ]);

        return Redirect::route('people.index')->with('success', 'Utilisateur modifié avec succès.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Person $person)
    {
        //
        $person->delete();

        return Redirect::route('people.index')->with('success', 'Utilisateur supprimé avec succès.');

    }
}

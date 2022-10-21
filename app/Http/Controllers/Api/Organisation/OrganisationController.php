<?php

namespace App\Http\Controllers\Api\Organisation;

use App\Http\Controllers\Controller;
use App\Models\Organisation;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;

class OrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request::all(), [
            'organisation_name' => ['required', 'string'],
            'organisation_email' => ['required', 'string'],
            'admin_last_name' => ['required', 'string'],
            'admin_first_name' => ['required', 'string'],
            'birthday' => ['required', 'date_format:Y-m-d H:i:s'],
            'contact' => ['required', 'integer'],
            'admin_email' => ['required', 'string'],
            'password' => ['required', 'string']
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        Organisation::create([
            'organisation_name' => Request::get('organisation_name'),
            'organisation_email' => Request::get('organisation_email'),
            'admin_last_name' => Request::get('admin_last_name'),
            'admin_first_name' => Request::get('admin_first_name'),
            'birthday' => Request::get('birthday'),
            'contact' => Request::get('contact'),
            'admin_email' => Request::get('admin_email'),
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Organisation created'
        ]);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }
}

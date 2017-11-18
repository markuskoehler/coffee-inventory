<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;
use Validator;
use Session;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get all the locations
        $locations = Location::all();

        // load the view and pass the locations
        return view('user.locations.index')
            ->with('locations', $locations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = [
            'name' => 'required',
            //'email' => 'required|email',
            //'nerd_level' => 'required|numeric|min:1'
        ];
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->to('locations/create')
                ->withErrors($validator)
                ->withInput($request->except('password'));
        } else {
            // store
            $location = new Location;
            $location->name = $request->get('name');
            $location->address = $request->get('address');
            $location->zip = $request->get('zip');
            $location->place = $request->get('place');
            $location->room = $request->get('room');
            $location->save();

            // redirect
            Session::flash('message', 'Successfully created location!');
            return redirect()->to('locations');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Location $location
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(Location $location)
    {
        // show the view and pass the location to it
        return view('user.locations.show')
            ->with('location', $location);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Location $location
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function edit(Location $location)
    {
        // show the edit form and pass the location
        return view('user.locations.edit')
            ->with('location', $location);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param \App\Models\Location $location
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function update(Request $request, Location $location)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            //'email'      => 'required|email',
            //'nerd_level' => 'required|numeric'
        );
        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect()->to('locations/' . $location->id . '/edit')
                ->withErrors($validator)
                ->withInput(request()->except('password'));
        } else {
            // store
            $location->name = $request->get('name');
            $location->address = $request->get('address');
            $location->zip = $request->get('zip');
            $location->place = $request->get('place');
            $location->room = $request->get('room');
            $location->save();

            // redirect
            Session::flash('message', 'Successfully updated location!');
            return redirect()->to('locations');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Location $location
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function destroy(Location $location)
    {
        // delete
        $location->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the location!');
        return redirect()->to('locations');
    }
}

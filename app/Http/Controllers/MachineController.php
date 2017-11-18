<?php

namespace App\Http\Controllers;

use App\Models\Machine;
use Illuminate\Http\Request;
use Session;
use Validator;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    // get all the machines
	    $machines = Machine::all();

	    // load the view and pass the locations
	    return view('user.machines.index')
		    ->with('machines', $machines);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    return view('user.machines.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    // validate
	    // read more on validation at http://laravel.com/docs/validation
	    $rules = [
		    //'name' => 'required',
		    //'email' => 'required|email',
		    //'nerd_level' => 'required|numeric|min:1'
	    ];
	    $validator = Validator::make($request->all(), $rules);

	    // process the login
	    if ($validator->fails()) {
		    return redirect()->to('machines/create')
		                     ->withErrors($validator)
		                     ->withInput($request->except('password'));
	    } else {
		    // store
		    $machine = new Machine;
		    $machine->vendor = $request->get('vendor');
		    $machine->brand = $request->get('brand');
		    $machine->model = $request->get('model');
		    $machine->type = $request->get('type');
		    $machine->bought_at = $request->get('bought_at');
		    $machine->location_id = $request->get('location');
		    $machine->save();

		    // redirect
		    Session::flash('message', 'Successfully created machine!');
		    return redirect()->to('machines');
	    }
    }

	/**
	 * Display the specified resource.
	 *
	 * @param Machine $machine
	 * @return \Illuminate\Http\Response
	 * @internal param int $id
	 */
    public function show(Machine $machine)
    {
	    // show the view and pass the machine to it
	    return view('user.machines.show')
		    ->with('machine', $machine);
    }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param Machine $machine
	 * @return \Illuminate\Http\Response
	 * @internal param int $id
	 */
    public function edit(Machine $machine)
    {
	    // show the edit form and pass the location
	    return view('user.machines.edit')
		    ->with('machine', $machine);
    }

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param Machine $machine
	 * @return \Illuminate\Http\Response
	 * @internal param int $id
	 */
    public function update(Request $request, Machine $machine)
    {
	    // validate
	    // read more on validation at http://laravel.com/docs/validation
	    $rules = array(
		    //'name'       => 'required',
		    //'email'      => 'required|email',
		    //'nerd_level' => 'required|numeric'
	    );
	    $validator = Validator::make($request->all(), $rules);

	    // process the login
	    if ($validator->fails()) {
		    return redirect()->to('machines/' . $machine->id . '/edit')
		                     ->withErrors($validator)
		                     ->withInput(request()->except('password'));
	    } else {
		    // store
		    $machine->vendor = $request->get('vendor');
		    $machine->brand = $request->get('brand');
		    $machine->model = $request->get('model');
		    $machine->type = $request->get('type');
		    $machine->bought_at = $request->get('bought_at');
		    $machine->location_id = $request->get('location');
		    $machine->save();

		    // redirect
		    Session::flash('message', 'Successfully updated machine!');
		    return redirect()->to('machines');
	    }
    }

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param Machine $machine
	 * @return \Illuminate\Http\Response
	 * @internal param int $id
	 */
    public function destroy(Machine $machine)
    {
	    // delete
	    $machine->delete();

	    // redirect
	    Session::flash('message', 'Successfully deleted the machine!');
	    return redirect()->to('machines');
    }
}

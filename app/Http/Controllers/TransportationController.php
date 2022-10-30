<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transportation;

class TransportationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transports = Transportation::getAllTransportation();
        // dd($transport);
        return view('backend.transportation.index')->with('transports', $transports);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.transportation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'police_number' => 'string|required',
            'name' => 'string|required',
            'type' => 'string|required',
            'min_capacity' => "required|numeric",
            'max_capacity' => "required|numeric",
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->all();

        $status = Transportation::create($data);
        if ($status) {
            request()->session()->flash('success', 'Transportation Successfully added');
        } else {
            request()->session()->flash('error', 'Please try again!!');
        }
        return redirect()->route('transportation.index');
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
        $transport = Transportation::findOrFail($id);
        return view('backend.transportation.edit')->with('transport', $transport);
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
        $transportation = Transportation::findOrFail($id);
        $this->validate($request, [
            'police_number' => 'string|required',
            'name' => 'string|required',
            'type' => 'string|required',
            'min_capacity' => "required|numeric",
            'max_capacity' => "required|numeric",
            'status' => 'required|in:active,inactive',
        ]);

        $data = $request->all();

        // return $data;
        $status = $transportation->fill($data)->save();
        if ($status) {
            request()->session()->flash('success', 'Transportation Successfully updated');
        } else {
            request()->session()->flash('error', 'Please try again!!');
        }
        return redirect()->route('transportation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transport = Transportation::findOrFail($id);
        $status = $transport->delete();

        if ($status) {
            request()->session()->flash('success', 'Transportation successfully deleted');
        } else {
            request()->session()->flash('error', 'Error while deleting transportation');
        }
        return redirect()->route('transportation.index');
    }
}

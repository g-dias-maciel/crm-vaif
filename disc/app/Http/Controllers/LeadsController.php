<?php

namespace App\Http\Controllers;

use App\Models\Leads;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LeadsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : view
    {
        return view('leads');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request) : view
    {
        
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        
       
        $leads = new Leads();
        $leads->name = $request->name;
        $leads->save();

        $response = 'test';

        redirect(route('leads.index'));

        return view('leads', [
            'status' => 'success',
            'action' => 'create_lead',
            'name' => $request->name
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
        ]);
 
        $request->leads()->create($validated);
 
        return redirect(route('leads.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Leads $leads)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Leads $leads)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Leads $leads)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Leads $leads)
    {
        //
    }
}

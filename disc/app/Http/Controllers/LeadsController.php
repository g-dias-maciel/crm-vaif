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
    public function create(Request $request) : Response
    {
            
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
        ]);
        
       
        $leads = new Leads();
        $leads->name = $request->name;
        $leads->email = $request->email;
        $leads->save();

        $response = [
            'success' => true,
            'message' => __('messages.success_lead_created')
        ];

        return response($response, 200)
                ->header('Content-type', 'application/json');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
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

    public function search(Request $request)
    {
        if($request->ajax())
        {   
           
            $output = '';
            
            $validated = $request->validate([
                'search' => 'required|string|max:255',
            ]);

            $leads = Leads::where('name','LIKE','%'.$request->search."%")
                        ->get();
           
            if (count($leads) > 0) 
            {   
                $output = '<ul class="list-group">';
                foreach ($leads as $lead) {
                    $output .= '<li class="list-group-item">' . $lead->name . '    |   ' . $lead->email . '</li>';
                }
                $output .= '</ul>';
            }else{
                $output .= '<li class="list-group-item">' . 'No results' . '</li>';
            }
            return Response($output);
        }
    }

}

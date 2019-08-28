<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Repositories\ContactAgentRepository;
use DB;
use App\{Agent, ContactAgents};
use Illuminate\Support\Facades\Gate;
class ContactAgentController extends Controller
{
    protected $model;
    public function __construct(ContactAgents $contacting)
    {
       // set the model
       $this->model = new ContactAgentRepository($contacting);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
        $this->validate($request, [
            'agent_id' =>'required|min:1|max:255',
            'name' =>'required|min:1|max:255|',
            'email' =>'required|min:1|max:255|',
            'phone_number' =>'required|min:1|max:255',
            'content' =>'required|min:1|max:255',
            
        ]);

        $data = ([
            "contacting" => new ContactAgents,
            "agent_id" => $request->input("agent_id"),
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "content" => $request->input("content"),
            "phone_number" => $request->input("phone_number"),
        ]);

        if($this->model->create($data)){
            
            return redirect()->back()->with([
                'success' => "You Have Contact The Agent Successfully, Please Kindly wait for a response from the agent",
            ]);
        }else{
            return redirect()->back()->with([
                'error' => "Unable to Contact The Agent at the moment, Please try again later",
            ]);
        }
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

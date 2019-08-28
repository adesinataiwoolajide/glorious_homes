<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Repositories\AgentRepository;
use DB;
use App\{Agent, AgentCategories, User, Properties};
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    protected $model;
    public function __construct(Agent $agent)
    {
       // set the model
       $this->model = new AgentRepository($agent);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function properties($email)
    {
        $agent = Agent::where('email', $email)->first();
            $agent_id = $agent->agent_id;
        if (Gate::allows('Administrator', auth()->user()) 
            OR (auth()->user()->hasRole('Admin')) 
            OR (auth()->user()->hasRole('Agent'))) 
        {
            

            $property = Properties::where([
                'agent_id' => $agent_id
            ])->orderBy('property_id', 'desc')->get();
            if(count($property) ==0){
                return redirect()->back()->with([
                    'error' => "No Property is Found for $agent->agent_name",
                ]);
            }else{
                return view("administrator.agents.properties")->with([
                    'agent' => $agent,
                    'property' => $property,
            
                ]);
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To View The Agents",
            ]);
        }
    }
    public function index()
    {
        if (Gate::allows('Administrator', auth()->user()) OR (auth()->user()->hasRole('Admin'))) {
        
            $agent = Agent::orderBy('agent_name', 'asc')->get();
            $agentCategory = AgentCategories::orderBy('agent_category_name', 'asc')->get();
            return view("administrator.agents.create")->with([
                'agent' => $agent,
                'agentCategory' => $agentCategory,
            ]);
        }elseif(auth()->user()->hasRole('Agent')){
            $email = auth()->user()->email;
            $agen = Agent::where('email', $email)->first();
            $agentCategory = AgentCategories::orderBy('agent_category_name', 'asc')->get();
            return view("administrator.agents.create")->with([
                'agen' => $agen,
                'agentCategory' => $agentCategory,
            ]);

        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To View The Agents",
            ]);
        }
    }

    public function bin()
    {
        $agent= Agent::onlyTrashed()->get();
        return view('administrator.agents.recyclebin')->with([
            'agent' => $agent,
        ]);
    }

    public function restore($agent_id)
    {
        
        if (Gate::allows('Administrator', auth()->user())) {
            // $agent = Agent::where('email', $email)->first();
            // $agent_id = $agent->agent_id;

            Agent::withTrashed()
            ->where('agent_id', $agent_id)
            ->restore();
            $categ= $this->model->show($agent_id);
            $name = $categ->agent_name;
            $email = $categ->email;
        
            activity()
                ->performedOn($categ)
                ->causedBy(auth()->user()->id)
                ->withProperties([
                    'property_type_name' => $name,
                    'email' => $email
                ])
            ->log('restored');
            return redirect()->back()->with([
                'success' => " You Have Restored". " ".$name. " " ." to The Agent List Successfully",
                
            ]);
        
        }else{
            return redirect()->back()->with("error", "You Dont Have Access To The Recycle Bin");
        } 
        
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
        if(auth()->user()->hasRole('Admin') OR (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'agent_name' =>'required|min:1|max:255',
                'email' =>'required|min:1|max:255|unique:agents',
                'phone_number' =>'required|min:1|max:255|unique:agents',
                'state' =>'required|min:1|max:255',
                'lga' =>'required|min:1|max:255',
                'passport' =>'file|required|mimes:jpeg,bmp,png,PNG,jpg,JPEG|max:1999',
                'agent_category_id' =>'required|min:1|max:255',
                'description' =>'required|min:1|max:255',
                
            ]);
            if(User::where("email", $request->input("email"))->exists()){
                return redirect()->back()->with("error", "The E-Mail is In Use By Another Agent");
             }

            if($request->hasFile('passport')){
                //Getting File Name With Extension
                $filenameWithExt = $request->file('passport')->getClientOriginalName();
                // Get Just File Name
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('passport')->getClientOriginalExtension();
                // file name to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //upload the image
                $path=$request->file('passport')->move('agent-passport', $fileNameToStore);
            }else{
                $fileNameToStore = 'no-image.png';
            }
            
            $data = ([
                "type" => new Agent,
                "agent_name" => $request->input("agent_name"),
                "email" => $request->input("email"),
                "phone_number" => $request->input("phone_number"),
                "state" => $request->input("state"),
                "lga" => $request->input("lga"),
                "passport" => $fileNameToStore,
                "agent_category_id" => $request->input("agent_category_id"),
                "description" => $request->input("description"),
            ]);

            $role = 'Agent';

            $use = new User([
                "email" => $request->input("email"),
                "name" => $request->input("agent_name"),
                "password" => Hash::make($request->input("email")),
                "role" => $role,
                "status" => 1,
            ]);
            

            if($this->model->create($data) AND ($use->save())){
                $addRoles = $use->assignRole($role);

                return redirect()->route("agent.create")->with("success", "You Have Added " 
                .$request->input("agent_name"). " To The Agent List Successfully");
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Create A Agent",
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($email)
    {
        $agent = Agent::where('email', $email)->first();
        $agent_id = $agent->agent_id;

        //if(auth()->u)
        $categ= $this->model->show($agent_id);
        $proper = Properties::where('agent_id', $agent_id)->orderBy('property_id', 'desc')->get();

        $agentCategory = AgentCategories::orderBy('agent_category_name', 'asc')->get();
        if(auth()->user()->hasPermissionTo('Edit Agent') OR 
            (Gate::allows('Administrator', auth()->user()))){
            
            $agent= Agent::orderBy('agent_name', 'asc')->get();
            return view('administrator.agents.my_profile')->with([
                'agent' => $agent,
                'categ' => $categ,
                'agentCategory' => $agentCategory,
                'proper' => $proper,
            ]);

        }elseif(auth()->user()->hasRole('Agent')){
            $email = auth()->user()->email;
            $age = Agent::where('email', $email)->first();
            return view('administrator.agents.my_profile')->with([
                'age' => $age,
                'categ' => $categ,
                'agentCategory' => $agentCategory,
                'proper' => $proper,
            ]);
        
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Edit An Agent Details",
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($email)
    {
        $agent = Agent::where('email', $email)->first();
        $agent_id = $agent->agent_id;

        if(auth()->user()->hasPermissionTo('Edit Agent') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $categ= $this->model->show($agent_id);
            $agentCategory = AgentCategories::orderBy('agent_category_name', 'asc')->get();
            $agent= Agent::orderBy('agent_name', 'asc')->get();
            return view('administrator.agents.edit')->with([
                'agent' => $agent,
                'categ' => $categ,
                'agentCategory' => $agentCategory,
            ]);

        }elseif(auth()->user()->hasRole('Agent')){
            
        
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Edit An Agent Details",
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $email)
    {
        $age = Agent::where('email', $email)->first();
        $agent_id = $age->agent_id;
   
        if(auth()->user()->hasPermissionTo('Update Agent') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'agent_name' =>'required|min:1|max:255',
                'email' =>'required|min:1|max:255',
                'phone_number' =>'required|min:1|max:255',
                'state' =>'required|min:1|max:255',
                'lga' =>'required|min:1|max:255',
                'passport' =>'file|mimes:jpeg,bmp,png,PNG,jpg,JPEG|max:1999',
                'agent_category_id' =>'required|min:1|max:255',
                'description' =>'required|min:1|max:255',
            ]);

            if($request->hasFile('passport')){
                //Getting File Name With Extension
                $filenameWithExt = $request->file('passport')->getClientOriginalName();
                // Get Just File Name
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('passport')->getClientOriginalExtension();
                // file name to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //upload the image
                $path=$request->file('passport')->move('agent-passport', $fileNameToStore);
            }

            $eve =  $this->model->show($agent_id);
            if(empty($request->hasFile('passport'))){
                $fileNameToStore = $eve->passport;
            }
           
            $data = ([
                "type" =>$this->model->show($agent_id),
                "agent_name" => $request->input("agent_name"),
                "email" => $request->input("email"),
                "phone_number" => $request->input("phone_number"),
                "state" => $request->input("state"),
                "lga" => $request->input("lga"),
                "passport" => $fileNameToStore,
                "agent_category_id" => $request->input("agent_category_id"),
                "description" => $request->input("description"),
            ]);

            $role = 'Agent';

            $deta = $this->model->show($agent_id);
            $email = $deta->email;

            $now = DB::table('users')->where([
                "email" => $email
            ])->first();

            $use = User::where('user_id', $now->user_id)
            ->update([
                "email" => $request->input("email"),
                "name" => $request->input("agent_name"),
                "password" => Hash::make($request->input("email")),
                "role" => 'Agent',
                "status" => 1,
            ]);
            if($this->model->update($data, $agent_id)){
                return redirect()->route("agent.create")->with("success", "You Have Updated The Agent Details Successfully");
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Update An Agent",
            ]);
        }
    }

    public function updateprofile(Request $request, $email)
    {
        $age = Agent::where('email', $email)->first();
        $agent_id = $age->agent_id;

        if(auth()->user()->hasPermissionTo('Update Agent') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'agent_name' =>'required|min:1|max:255',
                'email' =>'required|min:1|max:255',
                'phone_number' =>'required|min:1|max:255',
                'state' =>'required|min:1|max:255',
                'lga' =>'required|min:1|max:255',
                'passport' =>'file|mimes:jpeg,bmp,png,PNG,jpg,JPEG|max:1999',
                'agent_category_id' =>'required|min:1|max:255',
                'description' =>'required|min:1|max:255',
            ]);

            if($request->hasFile('passport')){
                //Getting File Name With Extension
                $filenameWithExt = $request->file('passport')->getClientOriginalName();
                // Get Just File Name
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('passport')->getClientOriginalExtension();
                // file name to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //upload the image
                $path=$request->file('passport')->move('agent-passport', $fileNameToStore);
            }

            $eve =  $this->model->show($agent_id);
            if(empty($request->hasFile('passport'))){
                $fileNameToStore = $eve->passport;
            }
           
            $data = ([
                "type" =>$this->model->show($agent_id),
                "agent_name" => $request->input("agent_name"),
                "email" => $request->input("email"),
                "phone_number" => $request->input("phone_number"),
                "state" => $request->input("state"),
                "lga" => $request->input("lga"),
                "passport" => $fileNameToStore,
                "agent_category_id" => $request->input("agent_category_id"),
                "description" => $request->input("description"),
            ]);

            $role = 'Agent';

            $deta = $this->model->show($agent_id);
            $email = $deta->email;

            $now = DB::table('users')->where([
                "email" => $email
            ])->first();

            $use = User::where('user_id', $now->user_id)
            ->update([
                "email" => $request->input("email"),
                "name" => $request->input("agent_name"),
                "password" => Hash::make($request->input("email")),
                "role" => 'Agent',
                "status" => 1,
            ]);
            if($this->model->update($data, $agent_id)){
                return redirect()->back()->with("success", "You Have Updated The Details Successfully");
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Update Details",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($email)
    {
        $agent = Agent::where('email', $email)->first();
        $agent_id = $agent->agent_id;

        if(auth()->user()->hasPermissionTo('Delete Agent') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $type =  $this->model->show($agent_id); 
            $details= $type->agent_name;  
            
            if (($type->delete($agent_id))AND ($type->trashed())) {
                return redirect()->back()->with([
                    'success' => "You Have Deleted $details From The Agent List Successfully",
                ]);
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Delete An Agent",
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;
use Socialite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\{User, Agent, AgentCategories, Properties, PropertyCategories, PropertyDetails, PropertyDocuments, 
    PropertyFacilities, PropertyImages, PropertyTypes, AgentSubscriptions};
use Spatie\Activitylog\Models\Activity;
use Illuminate\Support\Facades\Gate;

class AdministratorController extends Controller
{

    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('github')->user();

        // $user->token;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('Administrator', auth()->user()) 
            OR (auth()->user()->hasRole('Admin'))) {
            $agent = Agent::all();
            $user = User::all();
            $agentCategory = AgentCategories::all();
            $properties = Properties::all();
            $propertyCategory = PropertyCategories::all();
            $propertyDetails = PropertyDetails::all();
            $propertyDoc = PropertyDocuments::all();
            $propertyFac = PropertyFacilities::all();
            $propertyImage = PropertyImages::all();
            $propertyTypes = PropertyTypes::all();
            $log = Activity::all();
            $subscription = AgentSubscriptions::all();
            $booked = Properties::where('status', 2)->get();
            $sold = Properties::where('status', 0)->get();
            $available = Properties::where('status', 1)->get();

            return view("administrator.dashboard")->with([
                'agent' => $agent,
                'user' => $user,
                'agentCategory' => $agentCategory,
                'properties' => $properties,
                'subscription' => $subscription,
                'propertyTypes' => $propertyTypes,
                'propertyCategory' => $propertyCategory,
                'log' => $log,
                'propertyDoc' => $propertyDoc,
                'propertyFac' => $propertyFac,
                'sold' =>$sold,
                'available' => $available,
                'booked' => $booked,
                'propertyDetails' => $propertyDetails,
                
                'propertyImage' => $propertyImage,
                
            ]);

        }elseif(auth()->user()->hasRole('Agent')){
            $email = auth()->user()->email;
            $age = Agent::where('email', $email)->first();
            $properties = Properties::where('agent_id', $age->agent_id)->orderBy('property_id', 'desc')->get();
            $log = Activity::all();
            $subscription = AgentSubscriptions::where('agent_id', $age->agent_id)->orderBy('subscription_id', 'desc')->get();
            $booked = Properties::where([
                'agent_id' => $age->agent_id,
                'status' => 2 ])->orderBy('property_id', 'desc')->get();
            $sold = Properties::where([
                'agent_id' => $age->agent_id,
                'status' => 3 ])->orderBy('property_id', 'desc')->get();
            $available = Properties::where([
                'agent_id' => $age->agent_id,
                'status' => 1 ])->orderBy('property_id', 'desc')->get();
                return view("administrator.dashboard")->with([
                    
                    'properties' => $properties,
                    'subscription' => $subscription,
                    'log' => $log,
                    'sold' =>$sold,
                    'available' => $available,
                    'booked' => $booked,
                    
                ]);
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To View THe Dashboard",
            ]);
        }
        
       
       
    }
    
    public function userlogin(Request $request)
    {

        $data = [
            "email" => $request->input("email"),
            "password" => $request->input("password"),
        ];
        $user = User::where('user_id', 1)->first();
        $user->assignRole('Administrator');
        if(Auth::attempt($data)){
            $usertype = Auth::user()->role;
            switch ($usertype){
                case (auth()->user()->hasRole('Administrator') OR 
                    (auth()->user()->hasRole('Admin')));
                    if(auth()->user()->hasRole('Administrator')){
                        $message = "Administrator";
                    }else{
                        $message = "Admin";
                    }
                    auth()->user()->givePermissionTo([
                        
                    ]);
                break;
                
                case (auth()->user()->hasRole('Agent'));
                    $message = "Agent";
                    auth()->user()->givePermissionTo([
                        'Add Properties', 'Edit Property', 'Update Property', 'Delete Property',
                        'Edit Agent', 'Update Agent'
                    ]);
                break;
                
                default:
                $message = "un Authorised User";
            }
            
            if(!empty($usertype)){
                // $log = new ActivityLog([
                //     "operations" => "Logged In Successfully",
                //     "user_id" => Auth::user()->user_id,
                // ]);
                // $log->save();
                return redirect()->route("administrator.dashboard")->with([
                    "success" => Auth::user()->name. " ". "Welcome To $message  Dashboard"
                ]);
            }else{
               
                return redirect()->back()->with([
                    "error" => "Ooops!!! Invalid User Name or Password",
                ]);
            }
        }else{
            
            return redirect()->back()->with([
                "error" => "Ooops!! Your Account Does Not Exist",
            ]);
        }
    }

    public function logout(Request $request)
    {
        
        Auth::logout();
        return view("auth.login");
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
        //
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Repositories\AgentSubscriptionRepository;
use DB;
use App\{Agent, AgentSubscriptions};
use Illuminate\Support\Facades\Gate;
class AgentSuscriptionController extends Controller
{
    protected $model;
    public function __construct(AgentSubscriptions $subscription)
    {
       // set the model
       $this->model = new AgentSubscriptionRepository($subscription);
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
        
            $agent = Agent::orderBy('agent_name', 'asc')->get();
            $subscription = AgentSubscriptions::orderBy('year', 'desc')->get();
            return view("administrator.agent_subscription.create")->with([
                'agent' => $agent,
                'subscription' => $subscription,
            ]);

        }elseif(auth()->user()->hasRole('Agent')){
            $email = auth()->user()->email;
            $age = Agent::where('email', $email)->first();
            $subscription = AgentSubscriptions::where('agent_id', $age->agent_id)->orderBy('year', 'desc')->get();
            return view("administrator.agent_subscription.create")->with([
                'subscription' => $subscription,
                'age' => $age,
            ]);
       
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To View The Subscriptions",
            ]);
        }
    }

    public function bin()
    {
        $subscription= AgentSubscriptions::onlyTrashed()->get();
        return view('administrator.agent_subscription.recyclebin')->with([
            'subscription' => $subscription,
        ]);
    }

    public function restore($subscription_id)
    {
        
        if (Gate::allows('Administrator', auth()->user())) {
            
            AgentSubscriptions::withTrashed()
            ->where('subscription_id', $subscription_id)
            ->restore();
            $categ= $this->model->show($subscription_id);
            $agent_id = $categ->agent_id;
            $agent = Agent::where('agent_id', $agent_id)->first();
            $agent_name = $agent->agent_name;

            activity()
                ->performedOn($categ)
                ->causedBy(auth()->user()->id)
                ->withProperties([
                    'agent_name' => $agent_name,
                    'year' => $categ->year
                ])
            ->log('restored');
            return redirect()->back()->with([
                'success' => " You Have Restored". " ".$agent_name. " " ." to The Agent Subscription Successfully",
                
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
                'agent_id' =>'required|min:1|max:255',
                'type' =>'required|min:1|max:255|',
                'amount' =>'required|min:1|max:255|',
                'year' =>'required|min:1|max:255',
                
            ]);

            // $check = AgentSubscriptions::where([
            //     "agent_id" => $request->input('agent_id'), 
            //     "type" => $request->input('type'),
            // ])->get();
            
            // if(count($check)>0){
            //     return redirect()->back()->with([
            //         'error' => "You Have Assigned ". $distributor_name. " ". "To "." ". $outlet_name. " Before",
            //     ]);
            // }else{

            // }

            $type = $request->input('type');
            if($type == 'Monthly'){
                $month =1;
                $expire =date('Y-M',strtotime('first day of +1 month'));
                
            }elseif($type == 'Quarterly'){
                $month =3;
                $expire =date('Y-M',strtotime('first day of +3 month'));
            }elseif($type == 'Yearly'){
                $month =12;
                $expire =date('Y-M',strtotime('first day of +12 month'));
            }else{
                $month =6;
                $expire =date('Y-M',strtotime('first day of +6 month'));
            }



            $data = ([
                "subcription" => new AgentSubscriptions,
                "agent_id" => $request->input("agent_id"),
                "type" => $request->input("type"),
                "amount" => $request->input("amount"),
                "year" => $request->input("year"),
                "month" => $month,
                "expire_on" => $expire,
            ]);

            if($this->model->create($data)){
                
                return redirect()->route("subscription.create")->with("success", "You Have Added 
                The Subscription for the Agent  Successfully");
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Create A Subscription",
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
    public function edit($subscription_id)
    {
        if (Gate::allows('Administrator', auth()->user()) 
            OR (auth()->user()->hasRole('Admin'))) {
        
            $agent = Agent::orderBy('agent_name', 'asc')->get();
            $subscription = AgentSubscriptions::orderBy('year', 'desc')->get();
           
            $sub= $this->model->show($subscription_id);
            return view("administrator.agent_subscription.edit")->with([
                'agent' => $agent,
                'subscription' => $subscription,
                'sub' => $sub,
            ]);
       
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Edit The Subscriptions",
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
    public function update(Request $request, $subscription_id)
    {
        if(auth()->user()->hasRole('Admin') OR (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'agent_id' =>'required|min:1|max:255',
                'type' =>'required|min:1|max:255|',
                'amount' =>'required|min:1|max:255|',
                'year' =>'required|min:1|max:255',
                
            ]);

            $type = $request->input('type');
            if($type == 'Monthly'){
                $month =1;
                $expire =date('Y-M',strtotime('first day of +1 month'));
                
            }elseif($type == 'Quarterly'){
                $month =3;
                $expire =date('Y-M',strtotime('first day of +3 month'));
            }elseif($type == 'Yearly'){
                $month =12;
                $expire =date('Y-M',strtotime('first day of +12 month'));
            }else{
                $month =6;
                $expire =date('Y-M',strtotime('first day of +6 month'));
            }



            $data = ([
                "subscription" => $this->model->show($subscription_id),
                "agent_id" => $request->input("agent_id"),
                "type" => $request->input("type"),
                "amount" => $request->input("amount"),
                "year" => $request->input("year"),
                "month" => $month,
                "expire_on" => $expire,
            ]);

            if($this->model->update($data, $subscription_id)){
                
                return redirect()->route("subscription.create")->with("success", "You Have Updated 
                The Subscription Details Successfully");
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Create A Subscription",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($subscription_id)
    {
        if(auth()->user()->hasRole('Admin') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $subscription =  $this->model->show($subscription_id); 
            $details= $subscription->agent_name;  
            
            if (($subscription->delete($subscription_id))AND ($subscription->trashed())) {
                return redirect()->back()->with([
                    'success' => "You Have Deleted The Subscription Successfully",
                ]);
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Delete A Subscription",
            ]);
        }
    }
}

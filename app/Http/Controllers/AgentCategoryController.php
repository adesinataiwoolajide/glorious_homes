<?php

namespace App\Http\Controllers;
use Symfony\Component\Console\Helper\ProgressBar;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Repositories\AgentCategoryRepository;
use DB;
use App\{AgentCategories};
use Illuminate\Support\Facades\Gate;
class AgentCategoryController extends Controller
{
    protected $model;
    public function __construct(AgentCategories $category)
    {
       // set the model
       $this->model = new AgentCategoryRepository($category);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('Administrator', auth()->user())) {
            $agentCategory = AgentCategories::orderBy('agent_category_name', 'asc')->get();
            // $progress =  new ProgressBar($output, count($agentCategory));
            // $progress->start();
            return view("administrator.agent_categories.create")->with([
                'agentCategory' => $agentCategory,
                //'progress' => $progress,
            ]);
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To View The Agent Category",
            ]);
        }
    }

    public function bin()
    {
        $category= AgentCategories::onlyTrashed()->get();
        return view('administrator.agent_categories.recyclebin')->with([
            'category' => $category,
        ]);
    }

    public function restore($agent_category_id)
    {
        if (Gate::allows('Administrator', auth()->user())) {
            AgentCategories::withTrashed()
            ->where('agent_category_id', $agent_category_id)
            ->restore();
            $categ= $this->model->show($agent_category_id);
            $name = $categ->agent_category_name;
            $email = auth()->user()->email;
        
            activity()
                ->performedOn($categ)
                ->causedBy(auth()->user()->id)
                ->withProperties([
                    'agent_category_name' => $name,
                ])
            ->log('restored');
            return redirect()->back()->with([
                'success' => " You Have Restored". " ".$name. " " ." Successfully",
                
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
        if(auth()->user()->hasPermissionTo('Add Agent Category') OR (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'agent_category_name' =>'required|min:1|max:255|unique:agent_categories',
            ]);
            
            $data = ([
                "category" => new AgentCategories,
                "agent_category_name" => $request->input("agent_category_name"),
            ]);

            if($this->model->create($data)){
                return redirect()->route("agent.category.create")->with("success", "You Have Added " 
                .$request->input("agent_category_name"). " To The Agent Category List Successfully");
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Create An Agent Category",
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
    public function edit($agent_category_id)
    {
        if(auth()->user()->hasPermissionTo('Edit Agent Category') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $categ= $this->model->show($agent_category_id);
            $category= $this->model->all();
            return view('administrator.agent_categories.edit')->with([
                'category' => $category,
                'categ' => $categ,
            ]);
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Edit An Agent Category",
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
    public function update(Request $request, $agent_category_id)
    {
        if(auth()->user()->hasPermissionTo('Update Agent Category') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'agent_category_name' =>'required|min:1|max:255|',
            ]);
            
            $data = ([
                "category" => $this->model->show($agent_category_id),
                "agent_category_name" => $request->input("agent_category_name"),
            ]);

            if($this->model->update($data, $agent_category_id)){
                return redirect()->route("agent.category.create")->with("success", "You Have Changed The Category name From ". " ".
                $request->input('prev_name') ." ". " To " .$request->input("agent_category_name"). " ". "Successfully");
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Update An Agent Category",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($agent_category_id)
    {
        if(auth()->user()->hasPermissionTo('Delete Agent Category') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $category =  $this->model->show($agent_category_id); 
            $details= $category->agent_category_name;  
            
            if (($category->delete($agent_category_id))AND ($category->trashed())) {
                return redirect()->back()->with([
                    'success' => "You Have Deleted $details From The Agent Category Successfully",
                ]);
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Delete An Agent Category",
            ]);
        }
    }
}

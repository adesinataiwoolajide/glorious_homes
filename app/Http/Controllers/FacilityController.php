<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Repositories\PropertyFacilityRepository;
use DB;
use App\{Facilities, User};
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class FacilityController extends Controller
{
    protected $model;
    public function __construct(Facilities $facility)
    {
       // set the model
       $this->model = new PropertyFacilityRepository($facility);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('Administrator', auth()->user()) OR (auth()->user()->hasRole('Admin'))) {
        
            $facility = Facilities::orderBy('facility_name', 'asc')->get();
            return view("administrator.facilities.create")->with([
                'facility' => $facility,
            ]);
        
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To View The Property Facilities",
            ]);
        }
    }

    public function bin()

    {
        $facility= Facilities::onlyTrashed()->get();
        return view('administrator.facilities.recyclebin')->with([
            'facility' => $facility,
        ]);
    }

    public function restore($facility_id)
    {
        if (Gate::allows('Administrator', auth()->user())) {
            Facilities::withTrashed()
            ->where('facility_id', $facility_id)
            ->restore();
            $categ= $this->model->show($facility_id);
            $name = $categ->facility_name;
            $email = $categ->email;
        
            activity()
                ->performedOn($categ)
                ->causedBy(auth()->user()->id)
                ->withProperties([
                    'facility_name' => $name,
                    'email' => $email
                ])
            ->log('restored');
            return redirect()->back()->with([
                'success' => " You Have Restored". " ".$name. " " ." to The Facility List Successfully",
                
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
        if(auth()->user()->hasPermissionTo('Add Facility') OR 
            (auth()->user()->hasRole('Admin')) OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'facility_name' =>'required|min:1|max:255|unique:facilities',
            ]);
            
            $data = ([
                "category" => new Facilities,
                "facility_name" => $request->input("facility_name"),
            ]);

            if($this->model->create($data)){
                return redirect()->route("facility.create")->with("success", "You Have Added " 
                .$request->input("facility_name"). " To The Property Facility Successfully");
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Create A Property Facility",
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
    public function edit($facility_id)
    {
        if(auth()->user()->hasPermissionTo('Edit Facility') OR 
            (auth()->user()->hasRole('Admin')) OR 
            (Gate::allows('Administrator', auth()->user()))){
            $categ= $this->model->show($facility_id);
            $facility= $this->model->all();
            return view('administrator.facilities.edit')->with([
                'facility' => $facility,
                'categ' => $categ,
            ]);
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Edit A Property Facility",
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
    public function update(Request $request, $facility_id)
    {
        if(auth()->user()->hasPermissionTo('Update Facility') OR 
            (auth()->user()->hasRole('Admin')) OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'facility_name' =>'required|min:1|max:255|',
            ]);
            
            $data = ([
                "facility" => $this->model->show($facility_id),
                "facility_name" => $request->input("facility_name"),
            ]);

            if($this->model->update($data, $facility_id)){
                return redirect()->route("facility.create")->with("success", "You Have Changed The Facility name From ". " ".
                $request->input('prev_name') ." ". " To " .$request->input("facility_name"). " ". "Successfully");
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Update A Property Facility",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($facility_id)
    {
        if(auth()->user()->hasPermissionTo('Delete Facility') OR 
            (auth()->user()->hasRole('Admin')) OR 
            (Gate::allows('Administrator', auth()->user()))){
            $category =  $this->model->show($facility_id); 
            $details= $category->facility_name;  
            
            if (($category->delete($facility_id))AND ($category->trashed())) {
                return redirect()->back()->with([
                    'success' => "You Have Deleted $details From The Property Facility Successfully",
                ]);
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Delete A Property Facility",
            ]);
        }
    }
}

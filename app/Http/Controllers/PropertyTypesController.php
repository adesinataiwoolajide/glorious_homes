<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Repositories\PropertyTypeRepository;
use DB;
use App\{PropertyTypes, PropertyCategories};
use Illuminate\Support\Facades\Gate;

class PropertyTypesController extends Controller
{
    protected $model;
    public function __construct(PropertyTypes $type)
    {
       // set the model
       $this->model = new PropertyTypeRepository($type);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('Administrator', auth()->user())) {
            $propertyType = PropertyTypes::orderBy('property_type_name', 'asc')->get();
            $propertyCategory = PropertyCategories::orderBy('property_category_name', 'asc')->get();
            return view("administrator.property_types.create")->with([
                'propertyType' => $propertyType,
                'propertyCategory' => $propertyCategory,
            ]);
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To View The Property Type",
            ]);
        }
    }

    public function bin()
    {
        $type= PropertyTypes::onlyTrashed()->get();
        return view('administrator.property_types.recyclebin')->with([
            'type' => $type,
        ]);
    }

    public function restore($property_type_id)
    {
        
        if (Gate::allows('Administrator', auth()->user())) {
            PropertyTypes::withTrashed()
            ->where('property_type_id', $property_type_id)
            ->restore();
            $categ= $this->model->show($property_type_id);
            $name = $categ->property_type_name;
            $email = auth()->user()->email;
            $deed = PropertyCategories::where([
                'property_category_id' => $categ->property_category_id,
                
            ])->first();
            $category_name=$deed->property_category_name;
        
            activity()
                ->performedOn($categ)
                ->causedBy(auth()->user()->id)
                ->withProperties([
                    'property_type_name' => $name,
                    'property_category_name' => $category_name
                ])
            ->log('restored');
            return redirect()->back()->with([
                'success' => " You Have Restored". " ".$name. " " ."With $category_name Category Successfully",
                
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
        if(auth()->user()->hasPermissionTo('Add Property Type') OR (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'property_type_name' =>'required|min:1|max:255',
                'property_category_id' =>'required|min:1|max:255',
            ]);

            $check= PropertyTypes::where([
                'property_type_name' =>  $request->input("property_type_name"),
                'property_category_id' =>  $request->input("property_category_id"),
            ])->exists();

            $deed = PropertyCategories::where('property_category_id', $request->input("property_category_id"))->first();
            $category_name=$deed->property_category_name;

            if($check){
                return redirect()->back()->with([
                    'error' => "You Added $category_name To" . " ". 
                    $request->input("property_type_name"). " ". " Property Type Before",
                ]);
            }

            
            $data = ([
                "type" => new PropertyTypes,
                "property_type_name" => $request->input("property_type_name"),
                "property_category_id" => $request->input("property_category_id"),
            ]);

            if($this->model->create($data)){
                return redirect()->route("property.type.create")->with("success", "You Added" . " " 
                .$request->input("property_type_name").  " ". "With Category". " ". $category_name.
                 " "." To Property Type Successfully");
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Create A Property type",
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
    public function edit($property_type_id)
    {
        if(auth()->user()->hasPermissionTo('Edit Property Type') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $categ= $this->model->show($property_type_id);
            $propertyCategory = PropertyCategories::orderBy('property_category_name', 'asc')->get();
            $propertyType = PropertyTypes::orderBy('property_type_name', 'asc')->get();
            return view('administrator.property_types.edit')->with([
                'categ' => $categ,
                'propertyCategory' => $propertyCategory,
                'propertyType' => $propertyType,
            ]);
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Edit A Property Type",
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
    public function update(Request $request, $property_type_id)
    {
        if(auth()->user()->hasPermissionTo('Update Property Type') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'property_type_name' =>'required|min:1|max:255|',
                'property_category_id' =>'required|min:1|max:255',
            ]);
            
            $data = ([
                "type" => $this->model->show($property_type_id),
                "property_type_name" => $request->input("property_type_name"),
                'property_category_id' =>  $request->input("property_category_id"),
            ]);

            if($this->model->update($data, $property_type_id)){
                return redirect()->route("property.type.create")->with("success", "You Have Changed The Property Type name From ". " ".
                $request->input('prev_name') ." ". " To " .$request->input("property_type_name"). " ". "Successfully");
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Update An Property type",
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($property_type_id)
    {
        if(auth()->user()->hasPermissionTo('Delete Property Type') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $type =  $this->model->show($property_type_id); 
            $details= $type->property_type_name;  
            
            if (($type->delete($property_type_id))AND ($type->trashed())) {
                return redirect()->back()->with([
                    'success' => "You Have Deleted $details From The Property Yype Successfully",
                ]);
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Delete A Property Type",
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Repositories\PropertyCategoryRepository;
use DB;
use App\{PropertyCategories};
use Illuminate\Support\Facades\Gate;
class PropertyCategoryController extends Controller
{
    protected $model;
    public function __construct(PropertyCategories $category)
    {
       // set the model
       $this->model = new PropertyCategoryRepository($category);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('Administrator', auth()->user())) {
            $propertyCategory = PropertyCategories::orderBy('property_category_name', 'asc')->get();
            return view("administrator.property_categories.create")->with([
                'propertyCategory' => $propertyCategory,
            ]);
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To View The property Category",
            ]);
        }
    }

    public function bin()
    {
        $category= PropertyCategories::onlyTrashed()->get();
        return view('administrator.property_categories.recyclebin')->with([
            'category' => $category,
        ]);
    }

    public function restore($property_category_id)
    {
        if (Gate::allows('Administrator', auth()->user())) {
            PropertyCategories::withTrashed()
            ->where('property_category_id', $property_category_id)
            ->restore();
            $categ= $this->model->show($property_category_id);
            $name = $categ->property_category_name;
            $email = auth()->user()->email;
        
            activity()
                ->performedOn($categ)
                ->causedBy(auth()->user()->id)
                ->withProperties([
                    'property_category_name' => $name,
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
        if(auth()->user()->hasPermissionTo('Add Property Category') OR (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'property_category_name' =>'required|min:1|max:255|unique:property_categories',
            ]);
            
            $data = ([
                "category" => new PropertyCategories,
                "property_category_name" => $request->input("property_category_name"),
            ]);

            if($this->model->create($data)){
                return redirect()->route("property.category.create")->with("success", "You Have Added " 
                .$request->input("property_category_name"). " To The Property Category Successfully");
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Create A Property Category",
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
    public function edit($property_category_id)
    {
        if(auth()->user()->hasPermissionTo('Edit Property Category') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $categ= $this->model->show($property_category_id);
            $category= PropertyCategories::orderBy('property_category_name', 'asc')->get();
            return view('administrator.property_categories.edit')->with([
                'category' => $category,
                'categ' => $categ,
            ]);
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Edit A Property Category",
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
    public function update(Request $request, $property_category_id)
    {
        if(auth()->user()->hasPermissionTo('Update Property Category') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'property_category_name' =>'required|min:1|max:255|',
            ]);
            
            $data = ([
                "category" => $this->model->show($property_category_id),
                "property_category_name" => $request->input("property_category_name"),
            ]);

            if($this->model->update($data, $property_category_id)){
                return redirect()->route("property.category.create")->with("success", "You Have Changed The Property Category name From ". " ".
                $request->input('prev_name') ." ". " To " .$request->input("property_category_name"). " ". "Successfully");
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Update An Property Category",
            ]);
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($property_category_id)
    {
        if(auth()->user()->hasPermissionTo('Delete Property Category') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $category =  $this->model->show($property_category_id); 
            $details= $category->property_category_name;  
            
            if (($category->delete($property_category_id))AND ($category->trashed())) {
                return redirect()->back()->with([
                    'success' => "You Have Deleted $details From The Property Category Successfully",
                ]);
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Delete A Property Category",
            ]);
        }
    }
}

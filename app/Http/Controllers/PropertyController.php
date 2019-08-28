<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Repositories\PropertyRepository;
use DB;
use Illuminate\Support\Facades\Input;
use Response;
use Illuminate\Http\File;
use App\{Agent, AgentCategories, User, Properties, PropertyTypes, 
    PropertyDocuments, PropertyCategories, PropertyImages, Facilities};
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Storage;
use Illuminate\Http\UploadedFile;

class PropertyController extends Controller
{
    protected $model;
    public function __construct(Properties $property)
    {
       // set the model
       $this->model = new PropertyRepository($property);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if (Gate::allows('Administrator', auth()->user()) OR (auth()->user()->hasRole('Admin'))) {
            $agent = Agent::orderBy('agent_name', 'asc')->get();
            $agentCategory = AgentCategories::orderBy('agent_category_name', 'asc')->get();
            $property = Properties::orderBy('property_id', 'desc')->get();
            
            $category = PropertyCategories::orderBy('property_category_id', 'asc')->get();
            $document = PropertyDocuments::orderBy('document_name', 'asc')->get();
            return view("administrator.properties.index")->with([
                'agent' => $agent,
                'agentCategory' => $agentCategory,
                'property' => $property,
                'category' => $category,
                'document' => $document,
            ]);
        }elseif(auth()->user()->hasRole('Agent')){
            $email = auth()->user()->email;
            $agent = Agent::where('email', $email)->first();
            $agentCategory = AgentCategories::orderBy('agent_category_name', 'asc')->get();
            $proper = Properties::where('agent_id', $agent->agent_id)->orderBy('property_id', 'desc')->get();
            
            $category = PropertyCategories::orderBy('property_category_id', 'asc')->get();
            $document = PropertyDocuments::orderBy('document_name', 'asc')->get();
            return view("administrator.properties.index")->with([
                'agent' => $agent,
                'agentCategory' => $agentCategory,
                'proper' => $proper,
                'category' => $category,
                'document' => $document,
            ]);
        
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To View The Properties",
            ]);
        }
    
    }

    public function sold()
    {
        if (Gate::allows('Administrator', auth()->user()) OR (auth()->user()->hasRole('Admin'))) {
            $agent = Agent::orderBy('agent_name', 'asc')->get();
            $agentCategory = AgentCategories::orderBy('agent_category_name', 'asc')->get();
            $property = Properties::where('status', 3)->orderBy('property_id', 'desc')->get();
            
            $category = PropertyCategories::orderBy('property_category_id', 'asc')->get();
            $document = PropertyDocuments::orderBy('document_name', 'asc')->get();
            return view("administrator.properties.sold")->with([
                'agent' => $agent,
                'agentCategory' => $agentCategory,
                'property' => $property,
                'category' => $category,
                'document' => $document,
            ]);
        }elseif(auth()->user()->hasRole('Agent')){
            $email = auth()->user()->email;
            $agent = Agent::where('email', $email)->first();
            $agentCategory = AgentCategories::orderBy('agent_category_name', 'asc')->get();
            $proper = Properties::where([
                'agent_id' => $agent->agent_id,
                'status' => 3 ,

            ])->orderBy('property_id', 'desc')->get();
            
            $category = PropertyCategories::orderBy('property_category_id', 'asc')->get();
            $document = PropertyDocuments::orderBy('document_name', 'asc')->get();
            return view("administrator.properties.sold")->with([
                'agent' => $agent,
                'agentCategory' => $agentCategory,
                'proper' => $proper,
                'category' => $category,
                'document' => $document,
            ]);
        
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To View Sold Properties",
            ]);
        }
    }

    public function available()
    {
        if (Gate::allows('Administrator', auth()->user()) OR (auth()->user()->hasRole('Admin'))) {
            $agent = Agent::orderBy('agent_name', 'asc')->get();
            $agentCategory = AgentCategories::orderBy('agent_category_name', 'asc')->get();
            $property = Properties::where('status', 1)->orderBy('property_id', 'desc')->get();
            
            $category = PropertyCategories::orderBy('property_category_id', 'asc')->get();
            $document = PropertyDocuments::orderBy('document_name', 'asc')->get();
            return view("administrator.properties.available")->with([
                'agent' => $agent,
                'agentCategory' => $agentCategory,
                'property' => $property,
                'category' => $category,
                'document' => $document,
            ]);
        }elseif(auth()->user()->hasRole('Agent')){
            $email = auth()->user()->email;
            $agent = Agent::where('email', $email)->first();
            $agentCategory = AgentCategories::orderBy('agent_category_name', 'asc')->get();
            $proper = Properties::where([
                'agent_id' => $agent->agent_id,
                'status' => 1 ,

            ])->orderBy('property_id', 'desc')->get();
            
            $category = PropertyCategories::orderBy('property_category_id', 'asc')->get();
            $document = PropertyDocuments::orderBy('document_name', 'asc')->get();
            return view("administrator.properties.available")->with([
                'agent' => $agent,
                'agentCategory' => $agentCategory,
                'proper' => $proper,
                'category' => $category,
                'document' => $document,
            ]);
        
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To View Available Properties",
            ]);
        }
    }

    public function booked()
    {
        if (Gate::allows('Administrator', auth()->user()) OR (auth()->user()->hasRole('Admin'))) {
            $agent = Agent::orderBy('agent_name', 'asc')->get();
            $agentCategory = AgentCategories::orderBy('agent_category_name', 'asc')->get();
            $property = Properties::where('status', 2)->orderBy('property_id', 'desc')->get();
            
            $category = PropertyCategories::orderBy('property_category_id', 'asc')->get();
            $document = PropertyDocuments::orderBy('document_name', 'asc')->get();
            return view("administrator.properties.booked")->with([
                'agent' => $agent,
                'agentCategory' => $agentCategory,
                'property' => $property,
                'category' => $category,
                'document' => $document,
            ]);
        }elseif(auth()->user()->hasRole('Agent')){
            $email = auth()->user()->email;
            $agent = Agent::where('email', $email)->first();
            $agentCategory = AgentCategories::orderBy('agent_category_name', 'asc')->get();
            $proper = Properties::where([
                'agent_id' => $agent->agent_id,
                'status' => 2 ,

            ])->orderBy('property_id', 'desc')->get();
            
            $category = PropertyCategories::orderBy('property_category_id', 'asc')->get();
            $document = PropertyDocuments::orderBy('document_name', 'asc')->get();
            return view("administrator.properties.booked")->with([
                'agent' => $agent,
                'agentCategory' => $agentCategory,
                'proper' => $proper,
                'category' => $category,
                'document' => $document,
            ]);
        
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To View Booked Properties",
            ]);
        }
    }

    

    public function bin()
    {
        $property= Properties::onlyTrashed()->get();
        return view('administrator.properties.recyclebin')->with([
            'property' => $property,
        ]);
    }

    public function restore($property_number)
    {
        if (Gate::allows('Administrator', auth()->user())) {
            $property = Properties::where('property_number', $property_number)->first();
            
            Properties::withTrashed()->where('property_number', $property_number)->restore();
            //$property_id = $property->property_id;
             //$categ= $this->model->show($property->property_id);
            // $name = $categ->agent_name;
            // $email = $categ->email;
        
            // activity()
            //     ->performedOn($categ)
            //     ->causedBy(auth()->user()->id)
            //     ->withProperties([
            //         'property_name' => $property->property_name,
            //         'purpose' =>  $property->purpose,
            //         'property_number' => $property_number
            //     ])
            // ->log('restored');
            return redirect()->back()->with([
                'success' => " You Have Restored". " ".$property_number. " " ." to The Property List Successfully",
                
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
        $property = Properties::orderBy('property_id', 'desc')->get();
        $category = PropertyCategories::orderBy(
            'property_category_id', 'asc')->get();
        $document = PropertyDocuments::orderBy('document_name', 'asc')->get();
        $type = PropertyTypes::orderBy('property_type_name', 'asc')->get();
        $facility = Facilities::orderBy('facility_name', 'asc')->get();
        if(auth()->user()->hasRole('Admin')
            OR (Gate::allows('Administrator', auth()->user()))){
            $agent = Agent::orderBy('agent_name', 'asc')->get();
            

            return view("administrator.properties.create")->with([
                'agent' => $agent,
                'property' => $property,
                'category' => $category,
                'document' => $document,
                'type' => $type,
                'facility' => $facility
            ]);
        }elseif(auth()->user()->hasRole('Agent')){
            $email = auth()->user()->email;
            $age = Agent::where('email', $email)->first();

            return view("administrator.properties.create")->with([
                // 'agent' => $agent,
                'property' => $property,
                'category' => $category,
                'document' => $document,
                'type' => $type,
                'age' => $age,
                'facility' => $facility
            ]);
        
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Add A Property",
            ]);
        }
    }

    public function preloadSub($property_type_id){
        $input = Input::get('option');
        $cat = PropertyTypes::where('property_category_id', '=', $property_type_id)->get();
        return Response::json($cat, 200);
    }

    public function details($property_number){
        if(auth()->user()->hasPermissionTo('Edit Property') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $agent = Agent::orderBy('agent_name', 'asc')->get();
            $category = PropertyCategories::orderBy( 'property_category_id', 'asc')->get();
            $document = PropertyDocuments::orderBy('document_name', 'asc')->get();
            $type = PropertyTypes::orderBy('property_type_name', 'asc')->get();
            $property = Properties::where('property_number', $property_number)->first();
            $image = PropertyImages::where('property_number', $property_number)->orderBy('image_id', 'desc')->get();
            $facility = Facilities::orderBy('facility_name', 'asc')->get();
            return view("administrator.properties.details")->with([
                'agent' => $agent,
                'property' => $property,
                'category' => $category,
                'document' => $document,
                'type' => $type,
                'image' => $image,
                'facility' => $facility
               
            ]);
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To View Property Details",
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    
    {
        
        if(auth()->user()->hasPermissionTo('Add Properties') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'property_name' =>'required|min:1|max:255',
                'amount' =>'required|min:1|max:255',
                'property_category_id' =>'required|min:1|max:255',
                'size' =>'required|min:1|max:255',
                'document_id' =>'required|min:1|max:255',
                'agent_id' =>'required|min:1|max:255',
                'property_type_id' =>'required|min:1|max:255',
                'state' =>'required|min:1|max:255',
                'lga' =>'required|min:1|max:255',
                'address' =>'required|min:1|max:255',
                'description' =>'required|min:1|max:255',
                'purpose' =>'required|min:1|max:255',
                'property_condition' => 'required|min:1|max:255',
                'facility_id' => 'required|min:1|max:255',
                'cover_image' =>'file|required|mimes:jpeg,bmp,png,PNG,jpg,JPEG|max:1999',
            ]);

            function generateRandomHash($length)
            {
                return strtoupper(substr(md5(uniqid(rand())), 0, (-32 + $length)));
            }	
            $property_number = strtoupper(generateRandomHash(10));

            if($request->hasFile('cover_image')){
                //Getting File Name With Extension
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                // Get Just File Name
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                // file name to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //upload the image
                $path=$request->file('cover_image')->move('property_cover_images', $fileNameToStore);
            }else{
                $fileNameToStore = 'no-image.png';
            }
            

            $data = ([
                "properties" => new Properties,
                "property_name" => $request->input("property_name"),
                "amount" => $request->input("amount"),
                "property_category_id" => $request->input("property_category_id"),
                "size" => $request->input("size"),
                "document_id" => implode(",", $request->input("document_id")),
                "agent_id" => $request->input("agent_id"),
                "property_type_id" => $request->input("property_type_id"),
                "state" => $request->input("state"),
                "lga" => $request->input("lga"),
                "address" => $request->input("address"),
                "description" => $request->input("description"),
                "status" => 1,
                "property_number" => $property_number,
                "longitude" => 1111111,
                "latitude" => 222222,
                "cover_image" => $fileNameToStore,
                "purpose" => $request->input("purpose"),
                "property_condition"=> $request->input("property_condition"),
                "facility_id"=>  implode(",", $request->input("facility_id")),
            ]);
            

            if($this->model->create($data)){
                if($request->hasFile('image')) {
                    $pictures = $request->image;
                    foreach ($pictures as $photo) {
                        $filenameWithExt = $photo->getClientOriginalName();
                        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                        $extension = $photo->getClientOriginalExtension();
                        $fileNameToStore = $filename.'_'.time().'.'.$extension;
                        Storage::putFileAs('/public/property_images', new File($photo), $fileNameToStore);
                        //$path=$request->file('passport')->move('agent-passport', new File($photo), $fileNameToStore);
                        $save = new PropertyImages([
                            'property_number' => $property_number,
                            'image' => $fileNameToStore,
                        ]);
                        $save->save();
                    }
        
                }
                return redirect()->route("property.index")->with("success", "You Have Added Property $property_number 
                To The Property List Successfully");
            }
        }else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Add A Property",
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
    public function edit($property_number)
    {
        if(auth()->user()->hasPermissionTo('Edit Property') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $agent = Agent::orderBy('agent_name', 'asc')->get();
            $category = PropertyCategories::orderBy( 'property_category_id', 'asc')->get();
            $document = PropertyDocuments::orderBy('document_name', 'asc')->get();
            $type = PropertyTypes::orderBy('property_type_name', 'asc')->get();
            $property = Properties::where('property_number', $property_number)->first();
            $image = PropertyImages::where('property_number', $property_number)->get();

            $facility = Facilities::orderBy('facility_name', 'asc')->get();
            return view("administrator.properties.edit")->with([
                'agent' => $agent,
                'property' => $property,
                'category' => $category,
                'document' => $document,
                'type' => $type,
                'image' => $image,
                'facility' => $facility,
               
            ]);
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To View Property Details",
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
    public function update(Request $request, $property_number)
    {
        if(auth()->user()->hasPermissionTo('Update Property') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'property_name' =>'required|min:1|max:255',
                'amount' =>'required|min:1|max:255',
                'property_category_id' =>'required|min:1|max:255',
                'size' =>'required|min:1|max:255',
                'document_id' =>'required|min:1|max:255',
                'agent_id' =>'required|min:1|max:255',
                'property_type_id' =>'required|min:1|max:255',
                'state' =>'required|min:1|max:255',
                'lga' =>'required|min:1|max:255',
                'address' =>'required|min:1|max:255',
                'description' =>'required|min:1|max:255',
                'purpose' =>'required|min:1|max:255',
                'property_condition' => 'required|min:1|max:255',
                'facility_id' => 'required|min:1|max:255',
                'cover_image' =>'file|mimes:jpeg,bmp,png,PNG,jpg,JPEG|max:1999',
            ]);

            $property = Properties::where('property_number', $property_number)->first();
            $property_id = $property->property_id;
            $image = PropertyImages::where('property_number', $property_number)->get();

            if($request->hasFile('cover_image')){
                //Getting File Name With Extension
                $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
                // Get Just File Name
                $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension = $request->file('cover_image')->getClientOriginalExtension();
                // file name to store
                $fileNameToStore = $filename.'_'.time().'.'.$extension;
                //upload the image
                $path=$request->file('cover_image')->move('property_cover_images', $fileNameToStore);
            }

            $eve =  $this->model->show($property_id);
            if(empty($request->hasFile('cover_image'))){
                $fileNameToStore = $eve->cover_image;
            }
            
            $data = ([
                "properties" => $this->model->show($property_id),
                "property_name" => $request->input("property_name"),
                "amount" => $request->input("amount"),
                "property_category_id" => $request->input("property_category_id"),
                "size" => $request->input("size"),
                "document_id" => implode(",", $request->input("document_id")),
                "agent_id" => $request->input("agent_id"),
                "property_type_id" => $request->input("property_type_id"),
                "state" => $request->input("state"),
                "lga" => $request->input("lga"),
                "address" => $request->input("address"),
                "description" => $request->input("description"),
                "status" => 1,
                "property_number" => $property_number,
                "longitude" => $eve->longitude,
                "latitude" => $eve->latitude,
                "cover_image" => $fileNameToStore,
                "purpose" => $request->input("purpose"),
                "property_condition"=> $request->input("property_condition"),
                "facility_id"=>  implode(",", $request->input("facility_id")),
            ]);

            if($this->model->update($data, $property_id)){
                if(empty($request->hasFile('image'))){

                }else{

                
                    if($request->hasFile('image')) {
                        $pictures = $request->image;
                        foreach ($pictures as $photo) {
                            $filenameWithExt = $photo->getClientOriginalName();
                            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                            $extension = $photo->getClientOriginalExtension();
                            $fileNameToStore = $filename.'_'.time().'.'.$extension;
                            Storage::putFileAs('/public/property_images', new File($photo), $fileNameToStore);
                            //$path=$request->file('passport')->move('agent-passport', new File($photo), $fileNameToStore);
                            $save = new PropertyImages([
                                'property_number' => $property_number,
                                'image' => $fileNameToStore,
                            ]);
                            $save->save();
                        }
            
                    }
                }
                if($request->input("edit")){
                    return redirect()->route("property.index")->with("success", "You Have Updated Property $property_number 
                    Details Successfully");
                }else{
                    return redirect()->back()->with("success", "You Have Updated Property $property_number 
                    Details Successfully");
                }
                
            }
        }else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Edit A Property",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($property_number)
    {
        if(auth()->user()->hasPermissionTo('Delete Property') OR 
            auth()->user()->hasRole('Admin') OR
            (Gate::allows('Administrator', auth()->user()))){

            $property = Properties::where('property_number', $property_number)->first();
            $property_id = $property->property_id;
            $propert =  $this->model->show($property_id); 
            
            if (($propert->delete($property_id))AND ($propert->trashed())) {
                return redirect()->back()->with([
                    'success' => "You Have Deleted The Property Successfully",
                ]);
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Delete A Property",
            ]);
        }
    }

    
}

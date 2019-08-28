<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Repositories\ContactAgentRepository;
use DB;
use App\{PropertyRequest, PropertyDocuments, PropertyCategories, PropertyTypes};
use Illuminate\Support\Facades\Gate;

class PropertyRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = PropertyCategories::orderBy('property_category_id', 'asc')->get();
        $document = PropertyDocuments::orderBy('document_name', 'asc')->get();

        
        return view("website.request_property")->with([
            'category' => $category,
            'document' => $document,

        ]);
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
            'name' =>'required|min:1|max:255',
            'email' =>'required|min:1|max:255',
            'phone_number' =>'required|min:1|max:255',
            'state' =>'required|min:1|max:255',
            'lga' =>'required|min:1|max:255',
            'property_category_id' =>'required|min:1|max:255',
            'property_type_id' =>'required|min:1|max:255',
            'document_id' =>'required|min:1|max:255',
            'minimum_budget' =>'required|min:1|max:255',
            'maximun_budget' =>'required|min:1|max:255',
            'purpose' => 'required|min:1|max:255',
            'property_condition' => 'required|min:1|max:255',
            'facilities' => 'required|min:1|max:255',
            'other_description' => 'required|min:1|max:255',
        ]);


        $data = ([
            "request" => new PropertyRequests,
            "name" => $request->input("name"),
            "email" => $request->input("email"),
            "phone_number" => $request->input("phone_number"),
            "state" => $request->input("state"),
            "lga" => $request->input("lga"),
            "property_category_id" =>$request->input("property_category_id"),
            "property_type_id" => $request->input("property_type_id"),
            "document_id" => implode(",", $request->input("document_id")),
            "minimum_budget" => $request->input("minimum_budget"),
            "maximum_budget" => $request->input("maximum_budget"),
            "facilities" => $request->input("facilities"),
            "purpose" => $request->input("purpose"),
            "property_condition" => $request->input("property_condition"),
            "other_description" => $property_number,
            "facilities"=>  $request->input("facility_id"),
        ]);


        if($this->model->create($data)){
            return redirect()->back()->with([
                'error' => "You Have Requested For A Property Successfully",
            ]);
        }else{
            return redirect()->back()->with([
                'error' => "Ooops!!! Network Failure, Please Try Again Later",
            ]);
        }
    }

    public function getFetch(Request $request){

        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');

        $data = DB::table('property_types')->where($select, $value)
        ->groupBy($dependent)->get();
        $output = '<option value=""> Select '.ucfirst($dependent). '</option>';

        foreach($data as $row){
            $output .='<option value="'.$row->$dependent.'"> '.$row->dependent.'</option>';
        }

        echo $output  ;





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($property_category_id)
    {
        $data = DB::table('property_types')->where('property_category_id', $property_category_id)
        ->get();
        $output = '<option value=""> Select Property Type </option>';

        foreach($data as $row){
            $output .='<option value="'.$row->property_type_id.'"> '.$row->property_type_name.'</option>';
        }
        dd($output)  ;
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

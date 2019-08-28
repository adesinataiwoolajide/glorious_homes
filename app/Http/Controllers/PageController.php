<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User, Agent, AgentCategories, Properties, PropertyCategories, PropertyDetails, PropertyDocuments, 
    PropertyFacilities, PropertyImages, PropertyTypes, Facilities};
class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agent = Agent::orderBy('agent_name', 'asc')->get();
        $agentCategory = AgentCategories::orderBy('agent_category_name', 'asc')->get();
        $property = Properties::orderBy('property_id', 'desc')->get();
        $facility = Facilities::orderBy('facility_name', 'asc')->get();
        $category = PropertyCategories::orderBy('property_category_id', 'asc')->get();
        $document = PropertyDocuments::orderBy('document_name', 'asc')->get();
        return view('website.index')->with([
            // 'agent' => $agent,
            // 'agentCategory' => $agentCategory,
            'property' => $property,
            // 'category' => $category,
            // 'document' => $document,
            // 'facility' => $facility,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function agent()
    {
        $agents = Agent::orderBy('agent_name', 'asc') ->paginate(12);
        return view('website.agent')->with([
            'agents' => $agents,
        ]);
    }

    public function agentprofile($email)
    {
        $agen= Agent::where('email', $email)->first();
        $agent_id = $agen->agent_id;
       
        $property = Properties::orderBy('property_id', 'desc')->get();
        $proper = Properties::where('agent_id', $agent_id)->orderBy('property_id', 'desc')
        ->paginate(4);
       
        $agents= Agent::orderBy('agent_name', 'asc')->get();
        return view('website.agent_details')->with([
            'agen' => $agen,
            'agents' => $agents,
            'proper' => $proper,
            'property' => $property,
        ]);
   
    }

    public function properties()
    {
        $propert = Properties::orderBy('property_id', 'desc') ->paginate(12);
        return view('website.properties')->with([
            'propert' => $propert,
        ]);
    }

    public function details($property_number){
        
        $property = Properties::where('property_number', $property_number)->first();
        $proper = Properties::where('agent_id', $property->agent_id)->orderBy('property_id', 'desc')
        ->get();
        $agen= Agent::where('agent_id', $property->agent_id)->first();
        $prop = Properties::orderBy('property_id', 'desc')->get();
        $list =  Properties::orderBy('purpose', 'asc')->paginate(6);
        $image = PropertyImages::where('property_number', $property_number)->orderBy('image_id', 'desc')->get();
        return view("website.property_details")->with([
            'property' => $property,
            'image' => $image, 
            'proper' => $proper,
            'agen' => $agen,
            'prop' => $prop,
            'list' => $list,
        ]);
        
    }

    public function buy()
    {
        $buy = Properties::orderBy('purpose', 'Buy', 'desc')->get();
        return view('website.properties')->with([
            'buy ' => $buy,
        ]);
    }

    public function sell()
    {
        $propert = Properties::orderBy('purpose', 'Sell', 'desc')->get();
        return view('website.properties')->with([
            'propert' => $propert,
        ]);
    }

    public function login()
    {
        return view('website.login');
    }

    public function forgotpassword()
    {
        return view('website.forgot_password');
    }

    public function updatepassword()
    {
        return view('website.update_password');
    }

    public function agentFinder()
    {
        return view('website.agent_finder');
    }

    public function propertycategory($property_category_name)
    {
        $category= PropertyCategories::where('property_category_name', $property_category_name)->first();
        $properties = Properties::where('property_category_id', $category->property_category_id)
        ->orderBy('property_id', 'desc')->paginate(6);
        $list =  Properties::orderBy('purpose', 'asc')->paginate(6);
        $propert = Properties::orderBy('status', 'asc') ->paginate(6);
        return view('website.property_categories')->with([
            'category' => $category,
            'properties' => $properties,
            'list' => $list,
            'propert' => $propert,
        ]);
    }

    public function sellpropertycategory($property_category_name)
    {
        $category= PropertyCategories::where('property_category_name', $property_category_name)->first();
        $properties = Properties::where([
            'property_category_id' => $category->property_category_id,
            'purpose' => 'Sell',  
        ])->orderBy('property_id', 'desc')->paginate(6);
        $list =  Properties::orderBy('purpose', 'asc')->paginate(6);
        $propert = Properties::orderBy('status', 'asc') ->paginate(6);
        return view('website.property_categories')->with([
            'category' => $category,
            'properties' => $properties,
            'list' => $list,
            'propert' => $propert,
        ]);
    }

    public function buypropertycategory($property_category_name)
    {
        $category= PropertyCategories::where('property_category_name', $property_category_name)->first();
        $properties = Properties::where([
            'property_category_id' => $category->property_category_id,
            'purpose' => 'Buy',  
        ])->orderBy('property_id', 'desc')->paginate(6);
        $list =  Properties::orderBy('purpose', 'asc')->paginate(6);
        $propert = Properties::orderBy('status', 'asc') ->paginate(6);
        return view('website.property_categories')->with([
            'category' => $category,
            'properties' => $properties,
            'list' => $list,
            'propert' => $propert,
        ]);
    }

    public function rentpropertycategory($property_category_name)
    {
        $category= PropertyCategories::where('property_category_name', $property_category_name)->first();
        $properties = Properties::where([
            'property_category_id' => $category->property_category_id,
            'purpose' => 'Rent',  
        ])->orderBy('property_id', 'desc')->paginate(6);
        $list =  Properties::orderBy('purpose', 'asc')->paginate(6);
        $propert = Properties::orderBy('status', 'asc') ->paginate(6);
        return view('website.property_categories')->with([
            'category' => $category,
            'properties' => $properties,
            'list' => $list,
            'propert' => $propert,
        ]);
    }

    public function leasepropertycategory($property_category_name)
    {
        $category= PropertyCategories::where('property_category_name', $property_category_name)->first();
        $properties = Properties::where([
            'property_category_id' => $category->property_category_id,
            'purpose' => 'Lease',  
        ]) ->orderBy('property_id', 'desc')->paginate(6);
        $list =  Properties::orderBy('purpose', 'asc')->paginate(6);
        $propert = Properties::orderBy('status', 'asc') ->paginate(6);
        return view('website.property_categories')->with([
            'category' => $category,
            'properties' => $properties,
            'list' => $list,
            'propert' => $propert,
        ]);
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

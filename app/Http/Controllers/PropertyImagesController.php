<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Repositories\PropImageRepository;
use DB;
use App\{PropertyImages};
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class PropertyImagesController extends Controller
{
    protected $model;
    public function __construct(PropertyImages $image)
    {
       // set the model
       $this->model = new PropImageRepository($image);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function destroy($image_id)
    {
        if(auth()->user()->hasPermissionTo('Delete Property') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $type =  $this->model->show($image_id); 
            
            if (($type->delete($image_id))AND ($type->trashed())) {
                return redirect()->back()->with([
                    'success' => "You Have Deleted The Image Successfully",
                ]);
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Delete A Property Images",
            ]);
        }
    }
}

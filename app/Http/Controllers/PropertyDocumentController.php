<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;
use App\Repositories\PropertyDocRepository;
use DB;
use App\{PropertyDocuments};
use Illuminate\Support\Facades\Gate;

class PropertyDocumentController extends Controller
{
    protected $model;
    public function __construct(PropertyDocuments $document)
    {
       // set the model
       $this->model = new PropertyDocRepository($document);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth()->user()->hasPermissionTo('Add Document') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $document = PropertyDocuments::orderBy('document_name', 'asc')->get();
            return view("administrator.documents.create")->with([
                'document' => $document,
            ]);
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To View The Property Documents",
            ]);
        }
    }
    public function bin()
    {
        $document= PropertyDocuments::onlyTrashed()->get();
        return view('administrator.documents.recyclebin')->with([
            'document' => $document,
        ]);
    }

    public function restore($document_id)
    {
        if(auth()->user()->hasPermissionTo('Restore Document') OR 
            (Gate::allows('Administrator', auth()->user()))){
            PropertyDocuments::withTrashed()
            ->where('document_id', $document_id)
            ->restore();
            $categ= $this->model->show($document_id);
            $name = $categ->document_name;
            $email = auth()->user()->email;
        
            activity()
                ->performedOn($categ)
                ->causedBy(auth()->user()->id)
                ->withProperties([
                    'document_name' => $name,
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
        if(auth()->user()->hasPermissionTo('Add Document') OR (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'document_name' =>'required|min:1|max:255|unique:property_documents',
            ]);
            
            $data = ([
                "document" => new PropertyDocuments,
                "document_name" => $request->input("document_name"),
            ]);

            if($this->model->create($data)){
                return redirect()->route("document.create")->with("success", "You Have Added " 
                .$request->input("document_name"). " To The Document List Successfully");
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Create A Document",
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
    public function edit($document_id)
    {
        if(auth()->user()->hasPermissionTo('Edit Document') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $categ= $this->model->show($document_id);
            $document= $this->model->all();
            return view('administrator.documents.edit')->with([
                'document' => $document,
                'categ' => $categ,
            ]);
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Edit A Property Document",
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
    public function update(Request $request, $document_id)
    {
        if(auth()->user()->hasPermissionTo('Update Document') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $this->validate($request, [
                'document_name' =>'required|min:1|max:255|',
            ]);
            
            $data = ([
                "document" => $this->model->show($document_id),
                "document_name" => $request->input("document_name"),
            ]);

            if($this->model->update($data, $document_id)){
                return redirect()->route("document.create")->with("success", "You Have Changed The Document name From ". " ".
                $request->input('prev_name') ." ". " To " .$request->input("document_name"). " ". "Successfully");
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Update A Property Document",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($document_id)
    {
        if(auth()->user()->hasPermissionTo('Delete Document') OR 
            (Gate::allows('Administrator', auth()->user()))){
            $category =  $this->model->show($document_id); 
            $details= $category->document_name;  
            
            if (($category->delete($document_id))AND ($category->trashed())) {
                return redirect()->back()->with([
                    'success' => "You Have Deleted $details From The Property Document Successfully",
                ]);
            }
        } else{
            return redirect()->back()->with([
                'error' => "You Dont have Access To Delete A Property Document",
            ]);
        }
    }
}

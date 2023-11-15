<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contract\Storerequest;
use App\Http\Requests\Contract\Updaterequest;
use App\Models\Contractor;
use Illuminate\Http\Request;

class ContractorController extends Controller
{
    public function indexPage(){
        $contract = Contractor::orderBy('id', 'desc')->get();
        return view('admin.contractor.index', compact('contract'));
    }


    public function storeContract(Storerequest $request){
        if($request->createStore()){
            return redirect(route('admin.contract-page'))->with('notice', 'Created Successfully');
        }else{
            return back()->with('error', 'Failed to create');
        }
    }


    public function createPage(){
         return view('admin.contractor.create');
    }

    public function editPage($id){
        $contract = Contractor::find($id);
        return view('admin.contractor.edit', compact('contract'));
    }

    public function updatePage(Updaterequest $request,  $id){
         if($request->updateContract($id)){
             return redirect()->route('admin.contract-page')->with('notice', 'contract updated successfully');
         }else{
            return back()->with('error', 'An error occurred while updating');
         }
    }

    public function deletePage($id){
        $contract = Contractor::find($id);
        if($contract){
            $contract->delete();
            return back()->with('notice', 'Deleted Successfully');
        }else{
            return back()->with('error', 'Fail to delete');
        }
    }
}

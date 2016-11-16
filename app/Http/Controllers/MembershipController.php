<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\MembershipModel;

class MembershipController extends Controller
{
	public function FUNC_LIST(){
		$data = MembershipModel::get();
		return view('membership.list',compact('data'));
	}
	public function FUNC_ADD(){
		$data = MembershipModel::get();
		return view('membership.add',compact('data'));
	}
	public function FUNC_SAVE(Request $request){
		 $this->validate($request, [
                'name' => 'required',
                'email' => 'required|unique:membership',
                'password' => 'required|confirmed',
                'company' => 'required',
                'phone' => 'required',
                'status' => 'required',
            ]);
		$add = new MembershipModel();
		$add->name = $request['name'];
		$add->email = $request['email'];
		$add->password = bcrypt($request['password']);
		$add->company = $request['company'];
		$add->phone = $request['phone'];
		$add->status = $request['status'];
		$add->save();

		return redirect('listmembership')->with('success','data behasil disimpan');
	}
	public function FUNC_EDIT($id){
		$data = MembershipModel::where('id',$id)->first();
		return view('membership.edit',compact('data'));
	}
	public function FUNC_UPDATE(Request $request, $id){
		$this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'password' => 'confirmed',
                'company' => 'required',
                'phone' => 'required',
                'status' => 'required',
            ]);
		$update = MembershipModel::where('id',$id)->first();
		$update->name = $request['name'];
		$update->email = $request['email'];
		if(isset($request['password'])) {
			$update->password = bcrypt($request['password']);
		}
		$update->company = $request['company'];
		$update->phone = $request['phone'];
		$update->status = $request['status'];
		$update->save();
		return redirect('listmembership')->with('success','data behasil diedit');
	}
	public function FUNC_DELETE($id){
		$delete = MembershipModel::find($id);
        $delete->delete();

		return redirect('listmembership')->with('success','data behasil dihapus');
	}

}
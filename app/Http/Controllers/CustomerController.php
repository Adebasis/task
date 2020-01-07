<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Location;

class CustomerController extends Controller
{
    //
    // MiddleWare assignment to Whole Route
	public function __construct(){

		$this->middleware('auth');
	}

	//  Home page
	public function index(){

		$customerData=Customer::orderBy('created_at','DESC')->paginate(10);
		return view('admin.index-customer',compact('customerData'));

	}

// Create Customer

	public function create(){

		$locations=Location::all();

		return view("admin.create-customer",compact('locations'));
	}


	// Storing Customer

	public function store(){

		$Data=request()->validate([
		'location'=>'required',	
		'firstname'=>['required','string'],
		'lastname'=>['required','string']
		
		]);

		

		$countCustomer=Customer::where('firstName',request('firstname'))->Where('lastName',request('lastname'))->count();

		if($countCustomer < 1){

		Customer::create([

		'firstName'=>$Data['firstname'],
		'lastName'=>$Data['lastname'],
		'location_id'=>$Data['location']
		
		]);

		$customerData=Customer::orderBy('firstName','ASC')->paginate(10);
		return view('admin.index-customer',compact('customerData'));

	    }else{

	    	$locations=Location::all();

	    	 return view('admin.create-customer',compact('locations'))->with('message',"Customer Exist");
	    }


	}


	// Show Method for Edit.
	public function edit($customer){

        $locations=Location::all();
		$customerData=Customer::find($customer);
		return view('admin.edit-customer',compact('customerData','locations'));
	}


    // Upade Method
	public function update($id){

		$customerData=Location::find($id); //Getting Data from the Table for Specific Record.


		$Data=request()->validate([

		'location'=>'required',	
		'firstname'=>['required','string'],
		'lastname'=>['required','string']
		

		]);

	

	     $updateData=Customer::where('id',$id)->update([

        'firstName'=>$Data['firstname'],
		'lastName'=>$Data['lastname'],
		'location_id'=>$Data['location']

	    ]);

    $customerData=Customer::orderBy('firstName','ASC')->paginate(10);

	return view('admin.index-customer',compact('customerData'));

	}

	// To Delete the Customer
    public function destroy($customer){
         $deLocation=Customer::find($customer);
         $deLocation->delete();
         return redirect("/admin/customers");

    }
}

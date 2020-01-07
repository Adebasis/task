<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Location;
use App\Customer;

class LocationController extends Controller
{
    //
    // MiddleWare assignment to Whole Route
	public function __construct(){

		$this->middleware('auth');
	}

	//  Home page
	public function index(){

		$locationData=Location::orderBy('created_at','DESC')->paginate(10);
		return view('admin.index-location',compact('locationData'));

	}

// Create Location

	public function create(){

		return view("admin.create-location");
	}


	// Storing Location

	public function store(){

		$Data=request()->validate([
		'location'=>'required',
		
		]);

		

		$countLocation=Location::where('location',request('location'))->count();

		if($countLocation < 1){

		Location::create([
		'location'=>$Data['location']
		
		]);

		$locationData=Location::orderBy('created_at','DESC')->paginate(10);
		return view('admin.index-location',compact('locationData'));

	    }else{

	    	 return view('admin.create-location')->with('message',"Location Exist");
	    }


	}


	// Show Method for Edit.
	public function edit($location){

		$locationData=Location::find($location);
		return view('admin.edit-location',compact('locationData'));
	}


    // Upade Method
	public function update($id){

		$locationData=Location::find($id); //Getting Data from the Table for Specific Record.


		$Data=request()->validate([

		'location'=>'required',
		

		]);

	

	     $updateData=Location::where('id',$id)->update([

        'location'=>$Data['location'],

	    ]);

    $locationData=Location::orderBy('created_at','DESC')->paginate(10);

	return view('admin.index-location',compact('locationData'));

	}

	// To Delete the Location
    public function destroy($location){
         $countLocation=Customer::where('location_id',$location)->count();
         if($countLocation < 1){
         $deLocation=Location::find($location);
         $deLocation->delete();
         return redirect("/admin/locations");
     }else{

     	$locationData=Location::orderBy('created_at','DESC')->paginate(10);

	   return view('admin.index-location',compact('locationData'))->with('message',"Location Can't be Deleted!!! Users Exist in that Location. First Delete Users and Then Delete Location!!!");
     }

    }
}

@extends('layouts.appstop')

@section('content')
     
    <section class="main_content">
        <div class="container-fluid">
                <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default row">
                        <h4 class="mar_left_15">Edit Customer</h4>
                    </div>
                </div>
                </div>
                
               @if(isset($message))
                
                <div style="color:#900; text-align:center">{{ $message }}</div>
                @endif
                
                
                
                
                
                <div class="col-md-12">
                <div class="panel-body">
                    <form role="form" name="users" action="{{url('/admin/customers')}}/{{$customerData->id}}" method="post" onSubmit="return validateData();">
                        
                    @csrf
                    @method('PATCH')


                    <div class="form-group col-md-4">
                    <label class="control-label" for="website"><strong>Select Location</strong></label>
                    

                    <select class="form-control" id="location" name="location" required>
                      <option value="">Select Location</option>
                      @foreach($locations as $location)
                      <option value="{{$location->id}}" @if($customerData->location_id === $location->id ) {{"selected"}} @endif >{{$location->location}}</option>
                      @endforeach
                    </select>


                    @if($errors->has('location'))
                        
                            <strong>{{ $errors->first('location') }}</strong>
                        
                    @endif


                    </div>
                    
                    <div class="clear"></div>
                    <div class="form-group col-md-4">
                    <label class="control-label" for="firstname"><strong>First Name</strong></label>
                    <input class="form-control" id="firstname" name="firstname"  type="text" value="{{$customerData->firstName}}" required>

                    @if ($errors->has('firstname'))
                        
                            <strong>{{ $errors->first('firstname') }}</strong>
                        
                    @endif

                    </div>

                    <div class="clear"></div>
                    <div class="form-group col-md-4">
                    <label class="control-label" for="lastname"><strong>Last Name</strong></label>
                    <input class="form-control" id="lastname" name="lastname"  type="text" value="{{$customerData->lastName}}" required>

                    @if ($errors->has('lastname'))
                        
                            <strong>{{ $errors->first('lastname') }}</strong>
                        
                    @endif

                    </div>
                    
                    <div class="clear"></div>
                    
                    
                    
                    <div class="clear"></div>
                    <div class="form-group col-md-4">
                    <button type="submit" class="btn btn-danger">Update</button>
                    <button type="button" class="btn btn-success" onclick="urlDirect()">Close</button>
                    </div>
                    </form>
            
                </div>
                </div>
        </div>
    </div>
        
    </section>
    @endsection


<script>

    function urlDirect(){

        window.location="{{url('/admin/customers')}}";
    }
</script>

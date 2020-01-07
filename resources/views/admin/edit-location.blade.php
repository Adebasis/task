@extends('layouts.appstop')
   @section('content') 
	<section class="main_content">
        <div class="container-fluid">
            	<div class="row">
            	<div class="col-md-12">
                    <div class="panel panel-default row">
                    	<h4 class="mar_left_15">Edit Location</h4>
                    </div>
                </div>
              	</div>
				
                
                @if(isset($message))
                   
                    <div style="color:#900; text-align:center">{{ $message }}</div>

                 @endif
				
                <div class="col-md-12">
                <div class="panel-body">
                    <form role="form" name="location" action="{{url('/admin/locations')}}/{{$locationData->id}}" method="post" >
                    
                    @csrf
                    @method('PATCH')
					
					
                    <div class="form-group col-md-4">
                    <label class="control-label" for="website"><strong>Location Name</strong></label>
                    
                    <input type="text" id="location" name="location" class="form-control" value="{{$locationData->location}}">
                   

                   @if($errors->has('location'))
                        
                            <strong>{{ $errors->first('location') }}</strong>
                        
                    @endif


                    </div>
                    <div class="clear"></div>
                    <div class="form-group col-md-4">
                    <button type="submit" class="btn btn-danger">Save</button>
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

       window.location="{{url('/admin/locations')}}";
  }

</script>

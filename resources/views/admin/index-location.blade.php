@extends('layouts.appstop')

@section('content') 

<script>


 $(document).ready(function() {
    var table = $('#dt').DataTable( {
        responsive: true,     
        "bPaginate": false,
        "bInfo": false,  
        "stripeClasses": [ 'odd-row', 'even-row' ],
        "oLanguage": {
        "sSearch": '<b>'+"Quick Search:"+'</b>'
        },
        
});
});

 

</script>
    <section class="main_content">
    	
        <div class="container-fluid">
            <div class="row">
            	<div class="gray_cont_box clearfix">
            	<h4 class="col-lg-12">Location List
                	<div class="dropdown pull-right">
                    	
                        <a href="{{url('/admin/locations/create')}}" class="btn btn-primary" type="button"  >Add Location</a>
                    </div>
                </h4>
                
            </div>

                  @if(isset($message))
                   
                    <div style="color:#900; text-align:center">{{ $message }}</div>

                    @endif

                    
                    <div class="col-md-12">
                    <table class="table table-hover table-bordered" id="dt">
                        <thead>
                          <tr>
                            <th style="width:10%; text-align:center;">Location</th>
                            <th style="width:10%; text-align:center;">Action</th>
                            
                        </tr>
                        </thead>
                        <tbody>
						            
                       
                         @foreach($locationData as $location)
                          <tr>
                             <td align="center">{{$location->location}}</td>
                             
                             
                             <td align="center">
                             
                             <a href="{{url('/admin/locations')}}/{{($location->id)}}/edit"><img src="{{ asset('images/edit.png') }}" alt="Edit" title="Edit Location" /></a>&nbsp;
                            
                             
                             <a href="javascript:void(0);"><img src="{{ asset ('images/delete.png') }}" alt="Delete" onclick="deleteLocation('{{$location->id}}')" title="Delete Location" /></a>&nbsp;
                             
                             
                             </td>
                              <form role="form" name="frmDelete{{$location->id}}" id="frmDelete{{$location->id}}" method="post" action="{{url('/admin/locations')}}/{{$location->id}}" >
                              @method('DELETE')
                              @csrf
                       
                             </form>
                          </tr>
                         @endforeach
                         
                        </tbody>
                      </table>
                      </div>
                   
                      <div  align="center">{{ $locationData->links() }}</div>
                      
                    
              	</div>
            </div>
         </div>
    </section>
    
@endsection

<script>
  // Delete user Function.
  function deleteLocation(id)
  {
    
    
    var ask=confirm("Are you sure want to Delete this Location?");
    if(ask){
    
    document.getElementById('frmDelete'+id).submit()
  }
  }
   
 </script>
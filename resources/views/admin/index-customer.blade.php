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
            	<h4 class="col-lg-12">User's List
                	<div class="dropdown pull-right">
                    	
                        <a href="{{url('/admin/customers/create')}}" class="btn btn-primary" type="button"  >Add Customer</a>
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
                            <th style="width:10%; text-align:center;">First Name</th>
                            <th style="width:10%; text-align:center;">Last Name</th>
							              <th style="width:10%; text-align:center;">Location</th>
							              <th style="width:10%; text-align:center;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
						            
                       
                         @foreach($customerData as $customer)
                          <tr>
                             <td align="center">{{$customer->firstName}}</td>
                             <td align="center">{{$customer->lastName}}</td>
              							 <td align="center">{{$customer->location->location}}</td>
                             
                             <td align="center">
                             
                             <a href="{{url('/admin/customers')}}/{{($customer->id)}}/edit"><img src="{{ asset('images/edit.png') }}" alt="Edit" title="Edit Customer" /></a>&nbsp;
                            
                             
                             <a href="javascript:void(0);"><img src="{{ asset ('images/delete.png') }}" alt="Delete" onclick="deleteCustomer('{{$customer->id}}')" title="Delete Customer" /></a>&nbsp;
                             
                             
                             </td>
                              <form role="form" name="frmDelete{{$customer->id}}" id="frmDelete{{$customer->id}}" method="post" action="{{url('/admin/customers')}}/{{$customer->id}}" >
                              @method('DELETE')
                              @csrf
                       
                             </form>
                          </tr>
                         @endforeach
                         
                        </tbody>
                      </table>
                      </div>
                    <div  align="center">{{ $customerData->links() }}</div>
                      
                    
              	</div>
            </div>
         </div>
    </section>
    
@endsection

<script>
  // Delete user Function.
  function deleteCustomer(id)
  {
    
    
    var ask=confirm("Are you sure want to Delete this Customer?");
    if(ask){
    
    document.getElementById('frmDelete'+id).submit()
  }
  }
   
 </script>
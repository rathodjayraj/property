@extends('plugins/real-estate::account.layouts.skeleton')
@section('content')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

  <div class="dashboard crop-avatar">
    <div class="container">
      <div class="row">
			
			@include('sidebar')
         


        <div class="col-md-7">
          
          <div class="mb3">
            <table id="example" class="table table-striped table-bordered" >
        <thead>
            <tr>
                <th>Title</th>
                <th>PROPERTY TYPE</th>
                <th>TRANSACTION TYPE</th>
                <th>TOTAL PRICE</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
         
           @foreach($data as $user)
            <tr>
              <td>{{ $user->title }}</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->transaction_type }}</td>
              <td>{{ $user->total_price }}</td>
              <td style="text-align: center;"><a href="{{ route('detail', $user->id) }}"><i class="fa fa-edit" style="font-size: 22px; margin-right: 10px; color: #8dc541;" aria-hidden="true"></i></a>
                <a href="{{ route('requirements_delete', $user->id) }}"><i class="fa fa-trash" style="font-size: 22px; margin-right: 10px; color: #dc3545;" aria-hidden="true"></i></a>
              </td>
            
            </tr>
          @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th>Title</th>
                <th>PROPERTY TYPE</th>
                <th>TRANSACTION TYPE</th>
                <th>TOTAL PRICE</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
    </div>
 </div>
 </div>
 </div>

 
<script type="text/javascript" href="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" href="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" defer></script>
<script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery('#example').DataTable();
} );
</script>
@endsection

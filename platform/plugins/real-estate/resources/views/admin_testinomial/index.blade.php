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
            <form action="{{ route('testimonial.save') }}" method="post" >
              @csrf
             <textarea class="textarea" style="width:100%; height:200px;" placeholder="Enter testinomial here	" name="testimonials_description" >
</textarea>
            <center> <button type="submit" class="btn btn-success">submit</button></center>
            </form>
          </div>
        <br><hr><br>
		<h3> Testinomial List </h3>
		<table id="example" class="table table-striped table-bordered" >
        <thead>
            <tr>
                <th>Description</th>
                <th>status</th>
                <th>Added On</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
		@if(isset($result))
          @foreach($result as $testimonial)
            <tr>
              <td>{{ $testimonial->description }}</td>
              <td>
                @if($testimonial->status == 0)
                <span class="label label-danger">Approval Pending</span>
                @else
                <span class="label label-success">Approval</span>
                @endif
              </td>
              <td><?php $date =  date('d-M-Y',strtotime($testimonial->date));echo $date; ?></td>
              <td style="text-align: center;"><a href="{{ route('testimonial.delete', $testimonial->id) }}"><i class="fa fa-times" aria-hidden="true"></i></a></td>
            </tr>
          @endforeach
        @endif
		</tbody>
        <tfoot>
            <tr>
                <th>Description</th>
                <th>status</th>
                <th>Added On</th>
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
    </div>
 </div>
 </div>
 </div>

 
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script type="text/javascript" href="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" href="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" href="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
@endsection

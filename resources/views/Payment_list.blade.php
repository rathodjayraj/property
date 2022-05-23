@include('plugins/real-estate::account.layouts.skeleton')
@section('content')

<style>
.pv4-ns
{
	display: none;
}
</style>

<section class="nav" style="height:50px; margin-bottom: 10px;">
    <div class="container">
        <div class="row">
            <div class="page-title">
                <h2 class="font">Payment </h2>
            </div>
        </div>
    </div>
</section>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">

<script type="text/javascript" href="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" href="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js" defer></script>
  <div class="container">
      <div class="row">
       @include('sidebar') 
	<div class="col-md-8">
			 

			<table id="daTable" class = "table table-bordered">
			<thead>
			<tr> 
			<th> </th>
			<th> Amount </th>
			<th> Currency </th>
			<th> Charge id </th>
			<th> Payment Channel </th>
			<th> Create At </th>
			<th> Status </th>
			</tr> 

			</thead>
			<tbody>


			<?php $i=0;
			foreach($data as $value) { $i=$i+1; ?>
			<tr>
			<td>  <?php echo $i;  ?></td> 
			<td>  <?php echo $value->amount; ?></td> 
			<td> <?php echo $value->currency; ?> </td> 
			<td> <?php echo $value->charge_id; ?> </td> 
			<td> <?php echo $value->payment_channel; ?> </td> 
			<td> <?php echo $value->created_at; ?> </td> 
			<td> <?php echo $value->status; ?> </td> 
			</tr>
			<?php } ?>

			</tbody>
			</table>
	</div>
 </div> 
 </div>
     
<script>
$(document).ready(function() {
$('#daTable').DataTable();
} );
</script>
@extends('backendtemplate')

@section('content')
<h1>Category List</h1>
<a href="{{route('category.create')}}" class="btn btn-outline-success btn-sm my-3"><i class="fas fa-plus"></i></a>
<div class="row">
<table class="table">
	<thead>
		<tr>
			<th>No.</th>
			<th>Name</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php $i=0 ?>
		@foreach($categories as $row)
		<?php $i++ ?>
		<tr>
			<td>{{$i}}</td>
			<td>{{$row->name}}</td>
			<td>
				<a href="{{route('category.edit',$row->id)}}" class="btn btn-warning">Edit</a>
				<form action="{{route('category.destroy',$row->id)}}" method="post" class="d-inline-block" onsubmit="return confirm('Are u sure?')">
					@csrf
					@method('DELETE')
					<input type="submit" class="btn btn-danger" value="Delete">
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
</div>
@endsection

@extends('backendtemplate')

@section('content')
<form method="post" action="{{route('category.update',$category->id)}}">
	@csrf
	@method('PUT')
	<div class="form-row">
        <div class="form-group col-md-12 ">
            <label for="name"> Name </label>
            <input type="text" class="form-control" id="name" placeholder="Computer" name="name" value="{{$category->name}}">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
	<a href="{{route('category.index')}}" class="btn btn-success float-right">Back</a>	
</form>
@endsection
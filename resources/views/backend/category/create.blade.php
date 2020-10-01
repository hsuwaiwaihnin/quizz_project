@extends('backendtemplate')

@section('content')
<h1>Create Category</h1>

<form action="{{route('category.store')}}" method="post">
	@csrf
	<a href="{{ route('category.index') }}" class="btn btn-outline-success btn-sm my-3"> <i class="fas fa-backward"></i> </a>
	
	<div class="form-row">
        <div class="form-group col-md-12 ">
            <label for="name"> Name </label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
    </div>
    <button type="reset" class="btn btn-secondary text-uppercase mr-2"> 
    	<i class="fas fa-times mr-2"></i> Cancel 
    </button>
    <button type="submit" class="btn btn-primary text-uppercase"> 
    	<i class="fas fa-save mr-2"></i> Save 
    </button>

</form>
@endsection
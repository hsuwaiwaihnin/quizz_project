@extends('backendtemplate')

@section('content')
<h1>Create Subject</h1>

<form action="{{route('subject.store')}}" method="post" enctype="multipart/form-data">
	@csrf
	<a href="{{ route('subject.index') }}" class="btn btn-outline-success btn-sm my-3"> <i class="fas fa-backward"></i> </a>
	
	<div class="form-row">
        <div class="form-group col-md-12 ">
            <label for="name"> Name </label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group col-md-12">
            <label for="InputProfile">Photo</label>
            <input type="file" class="form-control-file" id="InputProfile" name="photo">
        </div>
        <div class="form-group col-md-12">
        <label for="InputCategory">Category:</label>
        <select name="category" class="form-control">
            <optgroup label="Choose Category">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </optgroup>
        </select>
    </div>
    </div>

    <button type="reset" class="btn btn-secondary text-uppercase mr-2"> 
    	<i class="fas fa-times mr-2"></i> Cancel 
    </button>
    <button type="submit" class="btn btn-primary text-uppercase"> 
    	<i class="fas fa-save mr-2"></i> Create
    </button>

</form>
@endsection
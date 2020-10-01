@extends('backendtemplate')

@section('content')
<form method="post" action="{{route('subject.update',$subject->id)}}" enctype="multipart/form-data">
	@csrf
	@method('PUT')
	<div class="form-row">
        <div class="form-group col-md-12 ">
            <label for="name"> Name </label>
            <input type="text" class="form-control" id="name" placeholder="Computer" name="name" value="{{$subject->name}}">
        </div>


        <label for="InputProfile">Photo</label>
        <input type="file" class="form-control-file" id="InputProfile" name="photo">
        <img src="{{asset($subject->photo)}}" alt="Profile" style="width: 100px;height: 100px;">
        <input type="hidden" name="oldphoto" value="{{$subject->photo}}">
        <div class="form-group col-md-12 ">
            <label for="InputProfile">Category</label>
        <select name="category">
            <option>---Select Category---</option>
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
	<a href="{{route('subject.index')}}" class="btn btn-success float-right">Back</a>	
</form>
@endsection
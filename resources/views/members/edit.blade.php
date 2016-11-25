@extends('members.layout')
@section('content')
@if (count($errors) > 0)
<div class="alert alert-danger errors-list">
   <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
   </ul>
</div>
@endif
<h3>Edit Member</h3>
<div class="col-md-6" style="padding-left:0px;">
   <form method="post" action="{{ url('/') }}/members/{{$member->id}}">
      <input name="_method" type="hidden" value="PATCH">
      {{ csrf_field() }}
      <div class="form-group">
         <label for="email">First Name</label>
         <input type="text" class="form-control" value="{{$member->first_name}}" name="first_name" id="email">
      </div>
      <div class="form-group">
         <label for="pwd">Last Name:</label>
         <input type="text"" name="last_name" value="{{$member->last_name}}" class="form-control" id="pwd">
      </div>
      <div class="form-group">
         <label for="pwd">Email:</label>
         <input type="text"" name="email" value="{{$member->email}}" class="form-control" id="pwd">
      </div>
      <div class="form-group">
         <label for="pwd">Age:</label>
         <input type="text"" name="age" value="{{$member->age}}" class="form-control" id="pwd">
      </div>

</div>
<div class="col-md-6" style="padding-right:0px;">
      <div class="form-group">
         <label for="email">Phone</label>
         <input type="text" class="form-control" value="{{$member->profile->phone}}" name="phone" id="phone">
      </div>
      <div class="form-group">
         <label for="email">Qualification</label>
         <input type="text" class="form-control" value="{{$member->profile->qualification}}" name="qualification" id="qualification">
      </div>
      <div class="form-group">
         <label for="email">Address</label>
         <input type="text" class="form-control" value="{{$member->profile->address}}" name="address" id="address">
      </div>      
      <div class="form-group">
         <label for="email">Notes</label>
         <input type="text" class="form-control" value="{{$member->profile->notes}}" name="notes" id="notes">
      </div>
</div>
      <button type="submit" class="btn btn-primary btn-update">Update</button>
</form>
   <form name="form2" method="post" action="{{ url('/') }}/members/{{$member->id}}">
      {{ csrf_field() }}
      <input name="_method" type="hidden" value="DELETE">
      <button type="submit" class="btn btn-danger btn-delete" onclick="return confirm('Do you really want to delete this member?')">Delete</button>
      </form>
@endsection
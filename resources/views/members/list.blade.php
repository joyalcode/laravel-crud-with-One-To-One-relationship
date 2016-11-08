@extends('members.layout')
@section('content')
<h3>Members</h3>
<div>
   <table class="table">
      <tr>
         <th>First name</th>
         <th>Last Name</th>
         <th>Email</th>
         <th>Age</th>
         <th></th>
      </tr>
      @foreach($members as $member)
      <tr>
         <td>{{$member->first_name}}</td>
         <td>{{$member->last_name}}</td>
         <td>{{$member->email}}</td>
         <td>{{$member->age}}</td>
         <td> <a href="members/{{$member->id}}/edit" class="btn btn-warning btn-xs">Edit</a> </td>
      </tr
      @endforeach
   </table>
</div>
@endsection
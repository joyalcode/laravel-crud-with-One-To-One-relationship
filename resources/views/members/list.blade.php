@extends('members.layout')
@section('content')
<h3>Members</h3>
<div>
   <table class="table">
      <tr>
         <th>First name</th>
         <th>Last Name</th>
         <th>Email</th>
         <th>phone</th>
         <th>Company</th>
         <th>Age</th>
         <th></th>
      </tr>
      @if (count($members) >= 1)
         @foreach($members as $member)
         <tr>
            <td>{{$member->first_name}}</td>
            <td>{{$member->last_name}}</td>
            <td>{{$member->email}}</td>
            <td>{{$member->profile->phone}}</td>
            <td>{{$member->profile->company}}</td>
            <td>{{$member->age}}</td>
            <td> <a href="members/{{$member->id}}/edit" class="btn btn-warning btn-xs">Edit</a> </td>
         </tr
         @endforeach
      @else
         <tr>
            <td colspan="7"><i class="help-block">No records found.</i></td>
         </tr>         
      @endif         
   </table>
</div>
@endsection
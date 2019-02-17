@extends('layouts.master')
@section('custom-css')
<style type="text/css">
  .table{
    text-align: left !important;
  }
</style>
@endsection
@section('content')
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">School</th>
      <th scope="col"># of Passers</th>      
    </tr>
  </thead>
  <tbody>
  @if($school_passers->isNotEmpty())
    @foreach($school_passers as $school)
        <tr>
            <th scope="row">{!! $school->school !!}</th>
            <td>{!! $school->total !!}</td>
        </tr>
    @endforeach
  @endif
  
  </tbody>
</table>
@if($school_passers->isNotEmpty())
    {!! $school_passers->links() !!}
@endif
@endsection
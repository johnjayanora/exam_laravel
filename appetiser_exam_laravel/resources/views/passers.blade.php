@extends('layouts.master')
@section('custom-css')
<style>
#search-div{
    padding:10px;
    margin-right:0px;
}
#add-record-modal{
    display:none;
}
.table{
    text-align: left !important;
  }
</style>
@endsection
@section('content')



<div  class="modal fade" id="add-record-modal"  tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Examinee</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      {!! Form::open(['route' => 'passers.add']) !!}
        <p>Examinee Name</p>
        <div class="form-row">
            <div class="col">
                <input type="text" class="form-control" name="first_name" placeholder="First name" required>
            </div>
            <div class="col">
                <input type="text" class="form-control" placeholder="Last name" name="last_name" required>
            </div>
        </div><br>
        <div class="form-group">
            <label for="campus_eligibility">Campus Eligibility</label>
            <input class="form-control" type="text" name="campus_eligibility" id="campus_eligibility" required>
        </div>
        <div class="form-group">
            <label for="school">School</label>
            <input class="form-control" type="text" name="school" id="school" required>
        </div>
        <div class="form-group">
            <label for="division">Division</label>
            <input class="form-control" type="text" name="division" id="division" required>
        </div>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>        
        <input type="submit" class="btn btn-primary" value="submit">
      </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>SUCCESS!</strong> Examinee record inserted.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif


{!! Form::open(['route' => 'passers.search']) !!}
<div id="search-div" class="row justify-content-between">
    <div class="col col-md-3">
        <button type="button" id="add-record" class="btn btn-sm btn-primary">Add Record</button>
    </div>
    <div class="col col-md-3 ">
        <div class="input-group mb-3">
            <input type="text" name="search_val" class="form-control" placeholder="search name,school,division ..etc" aria-label="search" aria-describedby="basic-addon2">
            <div class="input-group-append">
                
                <input type="submit" value="Search" class="btn btn-outline-secondary">
            </div>
        </div>
    </div>
</div>
{!! Form::close() !!}

<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">NAME OF EXAMINEE</th>
      <th scope="col">CAMPUS ELIGIBILITY</th>
      <th scope="col">SCHOOL</th>
      <th scope="col">DIVISION</th>
    </tr>
  </thead>
  <tbody>
  @if($passers->isNotEmpty())
    @foreach($passers as $passer)
        <tr>
            <th scope="row">{!! $passer->id !!}</th>
            <td>{!! $passer->name !!}</td>
            <td>{!! $passer->campus_eligibility !!}</td>
            <td>{!! $passer->school !!}</td>
            <td>{!! $passer->division !!}</td>
        </tr>
    @endforeach
  @endif
  
  </tbody>
</table>


@if($passers->isNotEmpty())
    {!! $passers->links() !!}
@endif
@endsection

@section('custom-js')
<script type="text/javascript">
$(document).ready(function(){
    $("#exampleModalCenter").on("hidden.bs.modal", function () {
    
});
$('body').on('click','#add-record', function(){
    $("#add-record-modal").modal('show');
});
$('#add-record-modal').modal({
    backdrop: 'static',
    keyboard: false,
    show:false
});
});

</script>
@endsection

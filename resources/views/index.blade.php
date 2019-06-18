<!DOCTYPE html>
<html>
<head>
      	<link rel="stylesheet" type="text/css" href="{{asset('bootstrap/css/bootstrap.min.css')}}">



	<title></title>
</head>
<body>

<div style="margin-top: 100px">
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Email</th>
      
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
 @php $i=0; @endphp
@foreach($users as $user)
@php $i++; @endphp
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$user->email}}</td>
      
      <td>
      	<form action="{{ route('send') }}" method="post">
      		{{csrf_field()}}
      		<input type="hidden" name="user_id" value="{{ $user->id}}">
      		<input type="submit"  value="Send Email">


      	</form>


      </td>
    </tr>
  @endforeach
  </tbody>
</table>	









</div>
@auth
<form id="contact-form" method="post" action="{{route('send_custom')}}" role="form">
{{csrf_field()}}
    <div class="messages"></div>

    <div class="controls">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="shipping_address">Shipping Address</label>
                    <input id="shipping_address" type="text" name="shipping_address" class="form-control"  required="required" data-error="Address is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="phone_number">Phone Number *</label>
                    <input id="phone_number" type="text" name="phone_number" class="form-control" required="required" data-error="Phone Number is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="user_id">User Id</label>
                    <input id="user_id" type="text" name="user_id" class="form-control"  required="required" data-error="User Id is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
           
            <div class="col-md-6">
                <div class="form-group">
                    <label for="price">Price</label>
                    <input id="price" type="text" name="price" class="form-control"  required="required" data-error="Price is required.">
                    <div class="help-block with-errors"></div>
                </div>
            </div> 
        </div>
        <div class="row">
           
            <div class="col-md-12">
                <input type="submit" class="btn btn-success btn-send" value="Confirm">
            </div>
        </div>
        
    </div>

</form>

@endauth




<script type="text/javascript" src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>

</body>



</html>
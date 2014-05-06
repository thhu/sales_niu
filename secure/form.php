<?php 
include_once('header.php');
?>

<div class="container">
<div class="row align-center">
  <!--<div class="col-md-12">
    <small><i></i>Add alerts if form ok... success, else error.</i></small>
	<div class="alert alert-success"><strong><span class="glyphicon glyphicon-send"></span> Success! Message sent. (If form ok!)</strong></div>	  
    <div class="alert alert-danger"><span class="glyphicon glyphicon-alert"></span><strong> Error! Please check the inputs. (If form error!)</strong></div>
  </div> -->
  <h2>We need your info!</h2>
  <form role="form" name="input_form" action="form_action.php" method="post">
    <div class="col-lg-6">
      <div class="well well-sm"><strong><i class="glyphicon glyphicon-ok form-control-feedback"></i> Required Field</strong></div>
      <div class="form-group">
        <label for="vendor_name">Vendor Name</label>
        <div class="input-group">
          <input type="text" class="form-control" name="vendor_name" id="vendor_name" placeholder="Enter Vendor Name" required>
          <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
      </div>
      <div class="form-group">
        <label for="booth_name">Booth Name</label>
        <div class="input-group">
          <input type="text" class="form-control" name="booth_name" id="booth_name" placeholder="Enter Booth Name">
          <span class="input-group-addon"><i class="glyphicon form-control-feedback"></i></span></div>
      </div>
      <div class="form-group">
        <label for="phone_number">Phone Number</label>
        <div class="input-group">
          <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Enter Phone Number"  required>
          <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
      </div>
      <div class="form-group">
        <label for="address_1">Address 1</label>
        <div class="input-group">
          <input type="text" class="form-control" name="address_1" id="address_1" placeholder="Enter Address" required>
          <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
      </div>
      <div class="form-group">
        <label for="address_2">Address 2</label>
        <div class="input-group">
          <input type="text" class="form-control" name="address_2" id="address_2" placeholder="Enter Address">
          <span class="input-group-addon"><i class="glyphicon form-control-feedback"></i></span></div>
      </div>
      <div class="form-group">
        <label for="city">City</label>
        <div class="input-group">
          <input type="text" class="form-control" name="city" id="city" placeholder="Enter City Name" required>
          <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
      </div>
      <div class="form-group">
        <label for="province">Province</label>
        <div class="input-group">
          <input type="text" class="form-control" name="province" id="province" placeholder="Enter Province Name" required>
          <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
      </div>
      <div class="form-group">
        <label for="postal_code">Postal Code</label>
        <div class="input-group">
          <input type="text" class="form-control" name="postal_code" id="postal_code" placeholder="Enter Postal Code" required>
          <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
      </div>
      <div class="form-group">
        <label for="email_address">Email Address</label>
        <div class="input-group">
          <input type="text" class="form-control" name="email_address" id="email_address" placeholder="Enter Email Address" required>
          <span class="input-group-addon"><i class="glyphicon glyphicon-ok form-control-feedback"></i></span></div>
      </div>
      <div class="form-group">
        <label for="prev_booth_name">Previous Booth Name</label>
        <div class="input-group">
          <input type="text" class="form-control" name="prev_booth_name" id="prev_booth_name" placeholder="Enter Previous Year's Booth Name">
          <span class="input-group-addon"><i class="glyphicon form-control-feedback"></i></span></div>
      </div>
      <input type="submit" name="submit" id="submit" value="Next" class="btn btn-info pull-right">
    </div>
  </form>
</div>
<div class="row">&nbsp;<br/></div>
<?php 
include_once('footer.php'); 
?>
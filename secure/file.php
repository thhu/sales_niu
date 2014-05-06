<?php 
include_once("header.php");
?>
<div class="container">
	<div class="row">
		  <div class="col-lg-6">
		  <h2>Got any files?</h2>
		  <p>Please upload any files you need to submit to us here, if your files are not ready it's okay. Just email them to us later.</p>
		  <form action="file_action.php" method="post"
				enctype="multipart/form-data">
				<label for="file">Filename:</label>
				<input type="file" name="file" id="file"><br>
				<input type="submit" name="submit" value="Submit">
		  </form>
		  </div>  
  </div>
</div>
  
<?php 
include_once("footer.php");
?>
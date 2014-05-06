<?php 
include_once("header.php");
include_once("../vendor/db.php");
$_db = new db();
$connection = $_db->get_connection(); 
?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<h1>Reserve your booth (you may reserve up to 2 booths only if you are planning to purchase 2 booths)</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<img src="img/NIU_Vendor_Map.png" />
		</div>
	</div>
	<form role="form" action="select_booth_action.php" method="post">
		<?php 
			if (isset($_GET['taken'])){
				$taken_booth = $_GET['taken'];
				echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"bg-danger warning\"><h3>Unfortunately booth $taken_booth is not available, please make another selection</h3></div><div><div>";
			}
			else if(isset($_GET['error']) && $_GET['error'] == 1){
				echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"bg-danger warning\"><h3>You have selected more than two booths, please select two or less booths</h3></div><div><div>";
			} 
			else if(isset($_GET['error']) && $_GET['error'] == 2){
				echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"bg-danger warning\"><h3>Please select at least one booth</h3></div><div><div>";
			}
			else if(isset($_GET['error']) && $_GET['error'] == 3){
				echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"bg-danger warning\"><h3>Invalid booth selection, you cannot select booths that are not adjacent opposite of each other.</h3></div><div><div>";
			}
			else if(isset($_GET['error']) && $_GET['error'] == 4){
				echo "<div class=\"row\"><div class=\"col-md-12\"><div class=\"bg-danger warning\"><h3>Information cannot be changed, please contact sales@power-unit.org for assistance if you want to update your information.</h3></div><div><div>";
			}
			if(isset($_POST['booth'])){
				header("location:select_booth.php");
			}
		?>
		<div class="row">
			<div class="col-md-3">
				<h2>SECTION A</h2>
			</div>
			<div class="col-md-3">
				<h2>SECTION B</h2>
			</div>
			<div class="col-md-3">
				<h2>SECTION C</h2>
			</div>
			<div class="col-md-3">
				<h2>SECTION D</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="" data-toggle="buttons">
				  <?php 
				  	$query = "SELECT section,booth_number FROM booth_info WHERE taken = 0 and booth_number <= 5 and section = 'A'";
					$result = $connection->query($query);
					while ($row = $result->fetch_assoc()){
						$section = $row['section'];
						$booth_number = $row['booth_number'];
						echo "<label class=\"btn btn-primary\"><input type=\"checkbox\" name=\"booth[]\" value=\"$section$booth_number\"> $section$booth_number</label>";
					} 
				  ?>
				</div>
			</div>
			<div class="col-md-3">
				<div class="" data-toggle="buttons">
				 <?php 
				  	$query = "SELECT section,booth_number FROM booth_info WHERE taken = 0 and booth_number <= 5 and section = 'B'";
					$result = $connection->query($query);
					while ($row = $result->fetch_assoc()){
						$section = $row['section'];
						$booth_number = $row['booth_number'];
						echo "<label class=\"btn btn-primary\"><input type=\"checkbox\" name=\"booth[]\" value=\"$section$booth_number\"> $section$booth_number</label>";
					} 
				  ?>
				</div>
			</div>
			<div class="col-md-3">
				<div class="" data-toggle="buttons">
				    <?php 
				  	$query = "SELECT section,booth_number FROM booth_info WHERE taken = 0 and booth_number <= 5 and section = 'C'";
					$result = $connection->query($query);
					while ($row = $result->fetch_assoc()){
						$section = $row['section'];
						$booth_number = $row['booth_number'];
						echo "<label class=\"btn btn-primary\"><input type=\"checkbox\" name=\"booth[]\" value=\"$section$booth_number\"> $section$booth_number</label>";
					} 
				  ?>
				</div>
			</div>
			<div class="col-md-3">
				<div class="" data-toggle="buttons">
				    <?php 
				  	$query = "SELECT section,booth_number FROM booth_info WHERE taken = 0 and booth_number <= 5 and section = 'D'";
					$result = $connection->query($query);
					while ($row = $result->fetch_assoc()){
						$section = $row['section'];
						$booth_number = $row['booth_number'];
						echo "<label class=\"btn btn-primary\"><input type=\"checkbox\" name=\"booth[]\" value=\"$section$booth_number\">$section$booth_number</label>";
					} 
				  ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="" data-toggle="buttons">
				    <?php 
				  	$query = "SELECT section,booth_number FROM booth_info WHERE taken = 0 and booth_number > 5 and section = 'A'";
					$result = $connection->query($query);
					while ($row = $result->fetch_assoc()){
						$section = $row['section'];
						$booth_number = $row['booth_number'];
						echo "<label class=\"btn btn-primary\"><input type=\"checkbox\" name=\"booth[]\" value=\"$section$booth_number\">$section$booth_number</label>";
					} 
				  ?>
				</div>
			</div>
			<div class="col-md-3">
				<div class="" data-toggle="buttons">
				    <?php 
				  	$query = "SELECT section,booth_number FROM booth_info WHERE taken = 0 and booth_number > 5 and section = 'B'";
					$result = $connection->query($query);
					while ($row = $result->fetch_assoc()){
						$section = $row['section'];
						$booth_number = $row['booth_number'];
						echo "<label class=\"btn btn-primary\"><input type=\"checkbox\" name=\"booth[]\" value=\"$section$booth_number\">$section$booth_number</label>";
					} 
				  ?>
				</div>
			</div>
			<div class="col-md-3">
				<div class="" data-toggle="buttons">
				    <?php 
				  	$query = "SELECT section,booth_number FROM booth_info WHERE taken = 0 and booth_number > 5  and section = 'C'";
					$result = $connection->query($query);
					while ($row = $result->fetch_assoc()){
						$section = $row['section'];
						$booth_number = $row['booth_number'];
						echo "<label class=\"btn btn-primary\"><input type=\"checkbox\" name=\"booth[]\" value=\"$section$booth_number\">$section$booth_number</label>";
					} 
				  ?>
				</div>
			</div>
			<div class="col-md-3">
				<div class="" data-toggle="buttons">
				    <?php 
				  	$query = "SELECT section,booth_number FROM booth_info WHERE taken = 0 and booth_number > 5 and section = 'D'";
					$result = $connection->query($query);
					while ($row = $result->fetch_assoc()){
						$section = $row['section'];
						$booth_number = $row['booth_number'];
						echo "<label class=\"btn btn-primary\"><input type=\"checkbox\" name=\"booth[]\" value=\"$section$booth_number\">$section$booth_number</label>";
					} 
				  ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<h2>SECTION E</h2>
			</div>
			<div class="col-md-3">
				<h2>SECTION F</h2>
			</div>
			<div class="col-md-3">
				<h2>SECTION G</h2>
			</div>
			<div class="col-md-3">
				<h2>SECTION H</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="" data-toggle="buttons">
				    <?php 
				  	$query = "SELECT section,booth_number FROM booth_info WHERE taken = 0 and booth_number <= 5 and section = 'E'";
					$result = $connection->query($query);
					while ($row = $result->fetch_assoc()){
						$section = $row['section'];
						$booth_number = $row['booth_number'];
						echo "<label class=\"btn btn-primary\"><input type=\"checkbox\" name=\"booth[]\" value=\"$section$booth_number\">$section$booth_number</label>";
					} 
				  ?>
				</div>
			</div>
			<div class="col-md-3">
				<div class="" data-toggle="buttons">
				    <?php 
				  	$query = "SELECT section,booth_number FROM booth_info WHERE taken = 0 and booth_number <= 5 and section = 'F'";
					$result = $connection->query($query);
					while ($row = $result->fetch_assoc()){
						$section = $row['section'];
						$booth_number = $row['booth_number'];
						echo "<label class=\"btn btn-primary\"><input type=\"checkbox\" name=\"booth[]\" value=\"$section$booth_number\">$section$booth_number</label>";
					} 
				  ?>
				</div>
			</div>
			<div class="col-md-3">
				<div class="" data-toggle="buttons">
				    <?php 
				  	$query = "SELECT section,booth_number FROM booth_info WHERE taken = 0 and booth_number <= 5 and section = 'G'";
					$result = $connection->query($query);
					while ($row = $result->fetch_assoc()){
						$section = $row['section'];
						$booth_number = $row['booth_number'];
						echo "<label class=\"btn btn-primary\"><input type=\"checkbox\" name=\"booth[]\" value=\"$section$booth_number\">$section$booth_number</label>";
					} 
				  ?>
				</div>
			</div>
			<div class="col-md-3">
				<div class="" data-toggle="buttons">
				    <?php 
				  	$query = "SELECT section,booth_number FROM booth_info WHERE taken = 0 and booth_number <= 5 and section = 'H'";
					$result = $connection->query($query);
					while ($row = $result->fetch_assoc()){
						$section = $row['section'];
						$booth_number = $row['booth_number'];
						echo "<label class=\"btn btn-primary\"><input type=\"checkbox\" name=\"booth[]\" value=\"$section$booth_number\">$section$booth_number</label>";
					} 
				  ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="" data-toggle="buttons">
				    <?php 
				  	$query = "SELECT section,booth_number FROM booth_info WHERE taken = 0 and booth_number > 5 and section = 'E'";
					$result = $connection->query($query);
					while ($row = $result->fetch_assoc()){
						$section = $row['section'];
						$booth_number = $row['booth_number'];
						echo "<label class=\"btn btn-primary\"><input type=\"checkbox\" name=\"booth[]\" value=\"$section$booth_number\">$section$booth_number</label>";
					} 
				  ?>
				</div>
			</div>
			<div class="col-md-3">
				<div class="" data-toggle="buttons">
				  <?php 
				  	$query = "SELECT section,booth_number FROM booth_info WHERE taken = 0 and booth_number > 5 and booth_number <= 10 and section = 'F'";
					$result = $connection->query($query);
					while ($row = $result->fetch_assoc()){
						$section = $row['section'];
						$booth_number = $row['booth_number'];
						echo "<label class=\"btn btn-primary\"><input type=\"checkbox\" name=\"booth[]\" value=\"$section$booth_number\">$section$booth_number</label>";
					} 
				  ?>
				</div>
			</div>
			<div class="col-md-3">
				<div class="" data-toggle="buttons">
				  <?php 
				  	$query = "SELECT section,booth_number FROM booth_info WHERE taken = 0 and booth_number > 5 and section = 'G'";
					$result = $connection->query($query);
					while ($row = $result->fetch_assoc()){
						$section = $row['section'];
						$booth_number = $row['booth_number'];
						echo "<label class=\"btn btn-primary\"><input type=\"checkbox\" name=\"booth[]\" value=\"$section$booth_number\">$section$booth_number</label>";
					} 
				  ?>
				</div>
			</div>
			<div class="col-md-3">
				<div class="" data-toggle="buttons">
				  <?php 
				  	$query = "SELECT section,booth_number FROM booth_info WHERE taken = 0 and booth_number > 5 and booth_number <= 10 and section = 'H'";
					$result = $connection->query($query);
					while ($row = $result->fetch_assoc()){
						$section = $row['section'];
						$booth_number = $row['booth_number'];
						echo "<label class=\"btn btn-primary\"><input type=\"checkbox\" name=\"booth[]\" value=\"$section$booth_number\">$section$booth_number</label>";
					} 
				  ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				&nbsp;
			</div>
			<div class="col-md-3">
				<div class="" data-toggle="buttons">
				  <?php 
				  	$query = "SELECT section,booth_number FROM booth_info WHERE taken = 0 and booth_number > 10 and section = 'F'";
					$result = $connection->query($query);
					while ($row = $result->fetch_assoc()){
						$section = $row['section'];
						$booth_number = $row['booth_number'];
						echo "<label class=\"btn btn-primary\"><input type=\"checkbox\" name=\"booth[]\" value=\"$section$booth_number\">$section$booth_number</label>";
					} 
				  ?>
				</div>
			</div>
			<div class="col-md-3">
				&nbsp;
			</div>
			<div class="col-md-3">
				<div class="" data-toggle="buttons">
				  <?php 
				  	$query = "SELECT section,booth_number FROM booth_info WHERE taken = 0 and booth_number > 10 and section = 'H'";
					$result = $connection->query($query);
					while ($row = $result->fetch_assoc()){
						$section = $row['section'];
						$booth_number = $row['booth_number'];
						echo "<label class=\"btn btn-primary\"><input type=\"checkbox\" name=\"booth[]\" value=\"$section$booth_number\">$section$booth_number</label>";
					} 
				  ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<h2>SECTION I</h2>
			</div>
			<div class="col-md-3">
				<h2>SECTION J</h2>
			</div>
			<div class="col-md-3">
				&nbsp;
			</div>
			<div class="col-md-3">
				&nbsp;
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="" data-toggle="buttons">
				  <?php 
				  	$query = "SELECT section,booth_number FROM booth_info WHERE taken = 0 and booth_number <= 5 and section = 'I'";
					$result = $connection->query($query);
					while ($row = $result->fetch_assoc()){
						$section = $row['section'];
						$booth_number = $row['booth_number'];
						echo "<label class=\"btn btn-primary\"><input type=\"checkbox\" name=\"booth[]\" value=\"$section$booth_number\">$section$booth_number</label>";
					} 
				  ?>
				</div>
			</div>
			<div class="col-md-3">
				<div class="" data-toggle="buttons">
				  <?php 
				  	$query = "SELECT section,booth_number FROM booth_info WHERE taken = 0 and booth_number <= 5 and section = 'J'";
					$result = $connection->query($query);
					while ($row = $result->fetch_assoc()){
						$section = $row['section'];
						$booth_number = $row['booth_number'];
						echo "<label class=\"btn btn-primary\"><input type=\"checkbox\" name=\"booth[]\" value=\"$section$booth_number\">$section$booth_number</label>";
					} 
				  ?>
				</div>
			</div>
			<div class="col-md-3">
				&nbsp;
			</div>
			<div class="col-md-3">
				&nbsp;
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="" data-toggle="buttons">
				  <?php 
				  	$query = "SELECT section,booth_number FROM booth_info WHERE taken = 0 and booth_number > 5 and booth_number <= 10 and section = 'I'";
					$result = $connection->query($query);
					while ($row = $result->fetch_assoc()){
						$section = $row['section'];
						$booth_number = $row['booth_number'];
						echo "<label class=\"btn btn-primary\"><input type=\"checkbox\" name=\"booth[]\" value=\"$section$booth_number\">$section$booth_number</label>";
					} 
				  ?>
				</div>
			</div>
			<div class="col-md-3">
				<div class="" data-toggle="buttons">
				  <?php 
				  	$query = "SELECT section,booth_number FROM booth_info WHERE taken = 0 and booth_number > 5 and section = 'J'";
					$result = $connection->query($query);
					while ($row = $result->fetch_assoc()){
						$section = $row['section'];
						$booth_number = $row['booth_number'];
						echo "<label class=\"btn btn-primary\"><input type=\"checkbox\" name=\"booth[]\" value=\"$section$booth_number\">$section$booth_number</label>";
					} 
				  ?>
				</div>
			</div>
			<div class="col-md-3">
				&nbsp;
			</div>
			<div class="col-md-3">
				&nbsp;
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="" data-toggle="buttons">
				  <?php 
				  	$query = "SELECT section,booth_number FROM booth_info WHERE taken = 0 and booth_number > 10 and section = 'I'";
					$result = $connection->query($query);
					while ($row = $result->fetch_assoc()){
						$section = $row['section'];
						$booth_number = $row['booth_number'];
						echo "<label class=\"btn btn-primary\"><input type=\"checkbox\" name=\"booth[]\" value=\"$section$booth_number\">$section$booth_number</label>";
					} 
				  ?>
				</div>
			</div>
			<div class="col-md-3">
				&nbsp;
			</div>
			<div class="col-md-3">
				&nbsp;
			</div>
			<div class="col-md-3">
				&nbsp;
			</div>
		</div>
		<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
	</form>
</div>
<?php

include_once("footer.php");
?>
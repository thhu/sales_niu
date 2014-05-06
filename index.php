<?php 
include_once('header.php');
session_start();
session_unset();
session_destroy();
?>
        <!-- Add your site or application content here -->
<div class="container">
    <div class="row">
    	<div class="col-md-3 color-white"><h1>Night It Up!<br/>Vendor Login</h1></div>
        <div class="col-md-4 col-md-offset-7">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-lock"></span> Login</div>
                <div class="panel-body">
                	<?php 
                		if(isset($_GET['error']) && $_GET['error'] == 1){
                			echo "<p class=\"warning\">Invalid username or password, please try again</p>";
                		}
						elseif(isset($_GET['error']) && $_GET['error'] == 2){
							echo "<p class=\"warning\">Session expired due to 30 minutes of inactivity, please log in again</p>";	
						}
						elseif(isset($_GET['error']) && $_GET['error'] == 3){
							echo "<p class=\"warning\">Form already completed, please email sales@power-unit.org if you want to update your information</p>";	
						}
						elseif(isset($_GET['error']) && $_GET['error'] == 4){
							echo "<p class=\"warning\">Form is available starting at 10:00 AM, please come back later.</p>";	
						}
						//echo date("g:ia"); 
                	?>
                    <form class="form-horizontal" role="form" method="post" action="login_action.php">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">
                            Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-3 control-label">
                            Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"/>
                                    Remember me
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group last">
                        <div class="col-sm-offset-3 col-sm-9">
                            <button type="submit" class="btn btn-success btn-sm">
                                Sign in</button>
                                 <button type="reset" class="btn btn-default btn-sm">
                                Reset</button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="panel-footer">
                    Not Registred? <a href="http://www.jquery2dotnet.com">Register here</a></div>
            </div>
        </div>
    </div>
</div>

<?php 
include_once('footer.php');
?>
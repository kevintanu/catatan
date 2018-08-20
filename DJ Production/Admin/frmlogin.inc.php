<style>
	.bshadow{
		background:#ffffff;
		margin-top:100px;
		padding:20px;
		border-radius: 5px;
		-webkit-border-radius: 5px;
		-moz-border-radius: 5px;
		-webkit-box-shadow: 3px 3px 31px 0px rgba(0,0,0,0.5);
		-moz-box-shadow: 3px 3px 31px 0px rgba(0,0,0,0.5);
		box-shadow: 3px 3px 31px 0px rgba(0,0,0,0.5);
	}
</style>
<div class="container">
	<?=pstrstatus($strstatus)?>
	<div class="row">
		<div class="col-md-4 col-md-offset-4 bshadow">
			<form role="form" name="frmlogin" method="post" action="index.php">
					<legend>Login <?=$webtitle?></legend>
					<div class="form-group">
						<div class="input-group">
						  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						  <input type="text" class="form-control" name="username" id="username" placeholder="Username">
						</div>
					</div>
					<div class="form-group">
						<div class="input-group">
						  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						  <input type="password" class="form-control" name="passwd" id="password" placeholder="Password">
						</div>
					</div>
					<div class="form-group">
						<input type=submit name="btnlogin" value="Login" class="btn btn-primary">
						<input type=reset  value="Reset" class="btn btn-default">
					</div>
					<div class="form-group">
						<a href="index.php?m=forget">Lupa password?</a>
					</div>
			</form>
		</div>
	</div>
</div>

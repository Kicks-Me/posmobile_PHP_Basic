<?php
	$qry = $conn->query("SELECT*FROM USERS WHERE U_ID='".$_COOKIE['usrid']."'");
	$rs = mysqli_fetch_object($qry);
?>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6" style="padding-top: 20px;">
		<center style="padding-bottom: .5rem;">
			<h1>Profile</h1>
		</center>
		<form action="profile_check.php" method="post" target="xData">
			<div style="border: 1px solid #DEDEDE; padding: 2rem 1.2rem; background-color: #E5FEF9;" class="shadow rounded">
				<table width="100%">
					<tr>
						<td width="30%">
							Name
						</td>
						<td>
							<input type="text" name="name" id="name" placeholder="Your name" required class="form-control" onfocus="getElementById('errtxt').innerHTML='';" value="<?php echo $rs->u_name; ?>">
						</td>
					</tr>
					<tr>
						<td>
							Username
						</td>
						<td>
							<input style="margin-top:.8rem;" type="text" name="username" id="username" placeholder="Username" required class="form-control" onfocus="getElementById('errtxt').innerHTML='';" value="<?php echo $rs->u_username ?>">
						</td>
					</tr>
					<tr>
						<td>
							New password
						</td>
						<td>
							<input style="margin-top:.8rem;" type="password" name="password" id="password" placeholder="Password" required class="form-control" onfocus="getElementById('errtxt').innerHTML='';">
						</td>
					</tr>
					<tr>
						<td>
							Confirm
						</td>
						<td>
							<input style="margin-top:.8rem;" type="password" name="repassword" id="repassword" placeholder="Confirm" required class="form-control" onfocus="getElementById('errtxt').innerHTML='';">
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<div class="d-flex justify-content-end">
								<input type="button" name="cancel" value="Back" onclick="window.location='?mode=profile';" class="btn btn-danger" style="margin-top: 2rem; margin-right: 1rem !important; padding-right: 1.5rem !important; padding-left: 1.5rem !important;" />
								<button class="btn btn-primary" style="margin-top: 2rem;padding-right: 1.5rem !important; padding-left: 1.5rem !important;">Change</button>
							</div>
						</td>
					</tr>
				</table>
			</div>
		</form>
	</div>
	<div class="col-md-3"></div>
</div> 
<div id="errtxt" align="center" style="color:#F00; margin-top:1.6rem;">
	
</div>

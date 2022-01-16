<?php 
	if($_COOKIE['usrtype'] != "Admin"){
		// alertDiv("This page for Admin only !","errtxt");
		echo "<h3 style=\"color:red\">This page for Admin only !</h3>";
		exit();
	}

	if($_GET['action'] == 'delete'){
		$conn->query("UPDATE users SET u_status = 0 WHERE u_id='".$_GET['uid']."'");

	}

?>

<div style="width: 100%; margin-top: 44px;">
	<div id="empinfo">
		<table width="100%" height="40">
			<tr>
				<td><h3>Employee Info</h3></td>
				<td></td>
			</tr>
		</table>
	</div>
			
	<a name="frm"></a><!-- this tag for redirect to the form -->
	<div style="padding-top: 40px; margin-bottom: 15px;">
		<div class="row" style="padding-top: 10px;">
			<div class="col-md-3"></div>
			<div class="col-md-6" style="padding-top: 2px;">
				<center style="padding-bottom: .5rem;">
					<h5>Employee Profile</h5>
					<?php 
						$userId = newuserId();
						$username = "user".rand_int(3);
						$pwd = rand_txt(6);
					?>
				</center>
				<?php
					if($_GET['id']){
						$id = $_GET['id'];
						$qry = $conn->query("SELECT*FROM USERS WHERE u_id = '".$id."'");
						$rs = mysqli_fetch_object($qry);
						alertDiv("hiiii",'errtxt');
						// send selected item to form text 
						$userId = $rs->u_name;
						$username = $rs->u_username;
						$pwd = base64_decode($rs->u_password);
					}
				?>	

				<form action="employee_check.php" method="post" target="xData">
					<input type="hidden" name="uid" id="uid" value="<?php echo $id; ?>">
					<div style="border: 1px solid #DEDEDE; padding: 2rem 1.2rem; background-color: #F2F2F2;" class="shadow rounded">
						<table width="100%">
							<tr>
								<td width="30%">
									Name
								</td>
								<td>
									<input type="text" name="name" id="name" placeholder="Your name" required class="form-control" onfocus="getElementById('errtxt').innerHTML='';" value="<?php echo $userId ?>">
								</td>
							</tr>
							<tr>
								<td>
									Username
								</td>
								<td>
									<input style="margin-top:.3rem;" type="text" name="username" id="username" placeholder="Username" required class="form-control" onfocus="getElementById('errtxt').innerHTML='';" value="<?php echo $username  ?>">
								</td>
							</tr>	
							<tr>
								<td>
									Password
								</td>
								<td>
									<input style="margin-top:.3rem;" type="text" name="password" id="password" placeholder="Password" required class="form-control" onfocus="getElementById('errtxt').innerHTML='';" value="<?php echo $pwd ?>">
								</td>
							</tr>							
							<tr>
								<td></td>
								<td>
									<div class="d-flex justify-content-end">
										<input type="button" name="cancel" value="Back" onclick="window.location='?mode=employee';" class="btn btn-danger" style="margin-top: 2rem; margin-right: 1rem !important; padding-right: 1.5rem !important; padding-left: 1.5rem !important;" />
										<button class="btn btn-primary" style="margin-top: 2rem;padding-right: 1.5rem !important; padding-left: 1.5rem !important;">Save</button>
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
		<div style="margin-top:1rem;">
			<center style="padding-bottom: .5rem;">
				<h5 style="border-bottom:1px solid #999; padding-bottom: 10px;">Employee List</h5>
			</center>
			<table width="100%">				
			<?php 
				$qry = $conn->query("SELECT*FROM USERS WHERE u_status = 1 AND u_type != 'Admin' ORDER BY u_id DESC");
				$i = 0;
			    while($rs = mysqli_fetch_object($qry)){
			    	$i ++;
			 ?>
				<tr style="border-bottom: 1px solid #e3e3e3;">
					<td valign="top" width="30"><?php echo $i; ?></td>
					<td style="padding:5px">
						<?php 
							echo "<b>".$rs->u_name."</b>"; 
							echo "<br/><b style='font-weight:normal; color: #AFAFAF'>Username:</b> <b style='color: blue; font-weight: normal;'>".$rs->u_username."</b>";
							echo "<br/><b style='font-weight:normal; color: #AFAFAF'>Password:</b> <b style='color: blue; font-weight: normal;'>".uiPassword($rs->u_password)."</b>";
						?>						
					</td>
					<td style="text-align: right;">
						<!-- <button class="btn btn-primary" style="padding: 5px; margin-right:.3rem;">Edit</button> -->
						<div class=" btn-group">
							<button class="btn btn-info" style="padding:0px;" onclick="window.location='?mode=employee&id=<?php echo $rs->u_id; ?>#frm';"><i class="fas fa-edit" style="margin: .4rem; cursor: pointer; color: #fff"></i></button>
							<button class="btn btn-danger" style="padding:0px;" onclick="if(confirm('Do you want to delete this item ?')) window.location='?mode=employee&uid=<?php echo $rs->u_id; ?>&action=delete';"><i class="fas fa-minus-circle"style="margin: .4rem; cursor: pointer; color: #fff;"></i></button>
						</div>
					</td>
				</tr>
		<?php } ?>
			</table>
		</div>
	</div>
</div>
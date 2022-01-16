<div class="row justify-content-center">
	<div class="col-md-4"></div>
	<div class="col-md-4" style="padding-top: 70px;">
		<center style="padding-bottom: 1rem;">
			<i class="fas fa-user-lock" style="font-size:5rem; color: #0FA8CA"></i>
		</center>
		<form action="login_check.php" method="post" target="xData">
			<div style="border: 1px solid #DEDEDE; padding: 2.5rem 1.2rem; background-color: #E5FEF9;" class="shadow rounded">
				<table width="100%">
					<tr>
						<td width="30%">
							Username
						</td>
						<td>
							<input type="text" name="username" id="username" placeholder="Username" required class="form-control" onfocus="getElementById('errtxt').innerHTML='';">
						</td>
					</tr>
					<tr>
						<td>
							Password
						</td>
						<td>
							<input style="margin-top:.8rem;" type="password" name="password" id="password" placeholder="Password" required class="form-control" onfocus="getElementById('errtxt').innerHTML='';">
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<div class="d-flex justify-content-between">
								<!-- <input type="button" name="cancel" value="Cancel" class="btn btn-danger" style="margin-top: 1rem;padding-right: 1.5rem !important; padding-left: 1.5rem !important;" /> -->
								<button class="btn btn-success" style="margin-top: 1rem;padding-right: 1.5rem !important; padding-left: 1.5rem !important; width:100%">Log In</button>
							</div>
						</td>
					</tr>
				</table>
			</div>
		</form>
	</div>
	<div class="col-md-4"></div>
</div> 
<div id="errtxt" align="center" style="color:#F00; margin-top:1.6rem;">
	
</div>
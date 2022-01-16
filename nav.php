<div style="height: 43px; width: 100%; background-color: #120055; color: #FFF; position: fixed; top: 0px; left: 0px; z-index: 9; padding: 0rem 1rem; display: flex;">
	<!-- <table width="100%" height="40">
		<tr>
			<td width="20%" align="center"><i class="fas fa-cart-plus" style="font-size: x-large;"></td>
			<td width="20%" align="center"><i class="fas fa-id-card" style="font-size: x-large;"></td>
			<td width="20%" align="center"><?php echo "<img src=\"".$web_icon."\" height=\"30\" >"; ?></td>
			<td width="20%" align="center"><i class="fas fa-boxes" style="font-size: x-large;"></td>
			<td width="20%" align="center"><i class="fas fa-cog" style="font-size: x-large;"></td>
		</tr>
	</table> -->
	<div class="d-flex justify-content-between item align-items-center w-100" style="padding-top:1px;">
		<div>
			<a href="?mode=withdraw"><i class="fas fa-cart-plus" style="font-size: x-large; color: white;"></i></a>
		</div>
		<div>
			<i class="fas fa-id-card" style="font-size: x-large; color: white;"></i>
		</div>
		<div>
			<a href='<?php echo $url; ?>'><?php echo "<img src=\"".$web_icon."\" height=\"30\" >"; ?></a>			
		</div>
		<div>
			<a href="?mode=incoming"><i class="fas fa-boxes" style="font-size: x-large; color:white;"></i></a>
		</div>
		<div class="dropdown" style="cursor: pointer;">
			<i class="fas fa-cog" style="font-size: x-large;" data-toggle="dropdown"></i>
			<?php if(isset($_COOKIE["usrid"]) && $_COOKIE["usrid"] > 0){ ?>
				<div class="dropdown-menu">
					<h5 class="dropdown-header font-weight-bold"><i class="fas fa-user-circle h6" style="padding-right: .3rem; color: #006BDE"></i><?php echo isset($_COOKIE["usrtype"]) && $_COOKIE["usrtype"] == "Admin" ? "System Admin" : "Officer" ?></h5>
					<?php if(isset($_COOKIE["usrtype"]) && $_COOKIE["usrtype"] == "Admin"){ ?>
						<a class="dropdown-item" href="?mode=employee"><i class="fas fa-users h6" style="padding-right: .3rem; color: #006BDE;"></i>Employees</a>
						<!-- <a class="dropdown-item"><i class="fas fa-user-shield h6" style="padding-right: .3rem; color: #006BDE;"></i>Manage Users</a> -->
						<a class="dropdown-item" href="?mode=category"><i class="far fa-folder-open h6" style="padding-right: .3rem; color: #006BDE;"></i>Categories</a>
						<a class="dropdown-item" href="?mode=products"><i class="fas fa-box h6" style="padding-right: .3rem; color: #006BDE;"></i>Products</a>
						<a class="dropdown-item" href="?mode=withdraw"><i class="fas fa-dolly-flatbed h6" style="padding-right: .3rem; color: #006BDE;"></i>Withdraw</a>
					<?php }else { ?>
						<a class="dropdown-item"><i class=" h6" style="padding-right: .3rem; color: #006BDE;"></i>User Link 2</a>
						<a class="dropdown-item"><i class=" h6" style="padding-right: .3rem; color: #006BDE;"></i>User Link 3</a>
						<a class="dropdown-item"><i class=" h6" style="padding-right: .3rem; color: #006BDE;"></i>User Link 4</a>
					<?php } ?>	

					<a class="dropdown-item" href="?mode=profile"><i class="far fa-id-badge h6" style="padding-right: .3rem; color: #006BDE;"></i>Edit profile</a>
					<!-- <h5 class="dropdown-header font-weight-bold">Switch Username</h5> -->
					<div style="margin-top: 8px; margin-bottom: 8px; border-top:1px solid #EEE9E9;"></div>
					<a class="dropdown-item" href=" logout.php"><i class="fas fa-power-off h6" style="padding-right: .3rem; color: #E90400;"></i>Logout</a>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
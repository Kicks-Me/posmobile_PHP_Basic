<div style="height: 20px;"></div>
<div class="alert alert-info">
	Sale Today:
	<?php 
		echo db2date($endate);
		$sd_sql = "doc_date ='".$endate."'";
	?>
	<div class="row">
		<div class="col-4"></div>
		<div class="col-8" style="background-color: #fff; color: blue; font-size: large; font-weight: bold; text-align: right; border-radius: 7px; padding: 7px 10px; margin-top: 7px;"><?php include('sale_summary.php'); ?> Kip</div>
	</div>
</div>
<div class="alert alert-success">
	Sale Week: <?php
		$w_start = date("Y-m-d", strtotime('Monday this week'));
		$w_end = date("Y-m-d", strtotime('Sunday this week'));
		echo db2date($w_start)." - ".db2date($w_end);
		$sd_sql = "doc_date between '".$w_start."' and '".$w_end."'";
	?>
	<div class="row">
		<div class="col-4"></div>
		<div class="col-8" style="background-color: #fff; color: blue; font-size: large; font-weight: bold; text-align: right; border-radius: 7px; padding: 7px 10px; margin-top: 7px;"><?php include('sale_summary.php'); ?> Kip</div>
	</div>
</div>
<div class="alert alert-danger">
	Sale Month: <?php
		$w_start = date("Y-m-d", strtotime('first day of this month'));
		$w_end = date("Y-m-d", strtotime('last day of this month'));
		echo db2date($w_start)." - ".db2date($w_end);
		$sd_sql = "doc_date between '".$w_start."' and '".$w_end."'";
	?>
	<div class="row">
		<div class="col-4"></div>
		<div class="col-8" style="background-color: #fff; color: blue; font-size: large; font-weight: bold; text-align: right; border-radius: 7px; padding: 7px 10px; margin-top: 7px;"><?php include('sale_summary.php'); ?> Kip</div>
	</div>
</div>
<div class="alert alert-primary">
	Sale For Date:
	<div style="display: flex; justify-content: flex-start; width: 100%; margin-top: .3rem;">
		<div style="width: 8.7rem; margin-right: 1rem;">
			<input type="date" name="w_start" id="w_start" value="<?php echo $w_start; ?>" class="form-control" style="width: 100%;  font-size: 12px; padding: 3px !important" onchange="ajax('sale_summary&d1='+this.value+'&d2='+document.getElementById('w_end').value,'showsalefordate');">
		</div>
		<div style="width: 8.7rem;">
			<input type="date" name="w_end" id="w_end" value="<?php echo $endate; ?>" class="form-control" style="width: 100%; font-size: 12px; padding: 3px !important;"onchange="ajax('sale_summary&d1='+document.getElementById('w_start').value+'&d2='+this.value,'showsalefordate');">
		</div>
	</div>
	<div class="row" id="showsale">
		<div class="col-4"></div>
		<?php 
			$sd_sql = "doc_date between '".$w_start."' and '".$endate."'";
		?>
		<div id="showsalefordate" class="col-8" style="background-color: #fff; color: blue; font-size: large; font-weight: bold; text-align: right; border-radius: 7px; padding: 7px 10px; margin-top: 7px;"><?php include('sale_summary.php'); ?> Kip</div>
	</div>
</div>
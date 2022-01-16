<?php
	$docdate = $endate;
	$btnname = "Create Doc";
    $btntype = "btn-dark";

	if($_REQUEST["docid"] > 0){
		$docid = $_REQUEST["docid"];
		$qry = $conn->query("SELECT*FROM docs WHERE doc_id = '".$docid."'");
		$rs = mysqli_fetch_object($qry);
		$docdate = $rs->doc_date;
		$btnname = "Update";
        $btntype = "btn-info";

	}
?>
<div class="row" style="padding-top: 10px;">
    <div class="col-sm-3"></div>
	    <div class="col-sm-6">
	        <form action="incoming_check.php" method="post" target="xData" enctype="multipart/form-data">
	        	<center style="padding-bottom: .5rem;">
					<h5>Incomming form</h5>
				</center>
                <input type="hidden" name="docid" id="docid" value="<?php echo $rs->doc_id; ?>">
                <div style="border: 1px solid #DEDEDE; padding: 2rem 1.2rem; background-color: #F2F2F2; width: 100%;" class="shadow rounded">
                    <table width="100%">
                        <tr>
                            <td align="left" width="30%">
                               Document Date
                            </td>
                            <td align="left" width="70%">
                                <input type="date" name="doc_date" id="doc_date" value="<?php echo $docdate; ?>" class="form-control">
                            </td>                                
                        </tr>
                        <tr>
                            <td align="left">
                                Document No
                            </td>
                            <td align="left" style="padding-top: 7px;">
                                <input type="text" name="doc_no" id="doc_no" placeholder="Document No" class="form-control" required style="padding-right: 5px;" value="<?php echo $rs->doc_no; ?>" onfocus="getElementById('errtxt').innerHTML='';" />
                            </td>                                
                        </tr>
                        <tr>
                            <td align="left">
                                Suplier
                            </td>
                            <td align="left" style="padding-top: 7px;">
                                <input type="text" name="doc_suplier" id="doc_suplier" placeholder="Supplier" class="form-control" required value="<?php echo $rs->doc_suplier; ?>" onfocus="getElementById('errtxt').innerHTML='';" />
                            </td>                                
                        </tr>
                        <!-- <tr>
                            <td align="left">
                                Total 
                            </td>
                            <td align="left" style="padding-top: 7px;">
                                <input type="text" name="doc_total" id="doc_total" placeholder="Total" class="form-control" required style="padding-right: 5px;" value="<?php echo $rs->doc_total; ?>" onfocus="getElementById('errtxt').innerHTML='';" />
                            </td>                                
                        </tr> -->
                        <tr>
                            <td></td>
                            <td style="padding-top: 1rem;">
                                <button type="submit" class="btn <?php echo $btntype ?>" style="width:100%;"><?php echo $btnname; ?></button>

                                <div id="errtxt" align="center" style="color:#F00; margin-top:1.3rem;">

                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
	        </form>
	    </div>
    <div class="col-sm-3"></div>
</div>
<div class="row" style="padding-top: 10px; height: calc(100% - 125px); overflow-y: scroll;">
    <div class="col-sm-3"></div>
	    <div id="showItem" class="col-sm-6" style="height: 100%">

            <div id="totalAmount" style="font-size: 18px; font-weight: bolder; color: #F00; padding:10px 20px;">
                
            </div>
	    	<?php 
	    		if($docid > 0){
	    			include("itemList.php"); 
	    		}
	    	?>
    	</div>
    </div>
</div>

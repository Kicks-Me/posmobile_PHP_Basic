<div class="row" style="padding-top: 10px;">
    <div style="margin-top:1rem; width: 100%; padding: 15px;">
        <center style="padding-bottom: .5rem;">
            <h5 style="border-bottom:1px solid #999; padding-bottom: 10px;">Incoming List</h5>
        </center>
        <table width="100%">  
        <tr style="padding: 7px; font-weight: bolder; border-bottom: 1px solid #ccc;">
                <td width="10%" style="font-size:18px; padding-right:10px;">
                    No     
                </td>

                <!-- <td width="15%" style="padding-right:5px;">
                    Type
                </td> -->

                <td style="padding-right:5px;">
                    Detail
                </td>

                <td width="10%" style="padding-right:5px;">
                    Total
                </td>

                <td width="10%" align="right">
                    Action
                </td>
            </tr>


        <?php 
            if($_REQUEST["del"] > 0){                
                // $conn->query("UPDATE docs SET doc_status = 0 WHERE doc_id='".$_REQUEST["del"]."'");
                $conn->query("DELETE FROM docs WHERE doc_id='".$_REQUEST["del"]."'");


                $sql = "select*from items a Join products b on a.pdid = b.pd_id where a.doc_id='".$_REQUEST["del"]."'";                
                $qry = $conn->query($sql);

                while($rs = mysqli_fetch_object($sql)){
                    $conn->query("DELETE FROM items WHERE id='".$rs->id."'");
                    cutStock($rs->pdid);
                }                
            }

            $qry = $conn->query("SELECT*FROM docs WHERE doc_status = 1 AND doc_type = 'IN' ORDER BY doc_suplier ASC, doc_id DESC");

            $i = 0;
            while ($rs = mysqli_fetch_object($qry)) {     
            $i ++;  
        ?>
            <tr style="border-bottom: 1px dotted #ccc;">
                <td style="font-size:18px; padding-right:10px;">
                    <?php echo $i ?>                
                </td>

                <!-- <td>
                    <?php echo $rs->doc_type; ?>
                </td> -->

                <td align="left" onclick="ajax('incoming_form&docid=<?php echo $rs->doc_id; ?>','showDetail')" style="cursor: pointer;">
                    <div>
                        <b><?php echo $rs->doc_suplier; ?> </b><br>
                        <span><?php echo $rs->doc_no; ?></span><br>
                        <span style="color: orange;"><?php echo db2date($rs->doc_date); ?></span>
                    </div>
                </td>

                <td>
                    <?php echo number_format($rs->doc_total); ?>
                </td>

                <td align="right">
                    <div class=" btn-group">
                        <button class="btn btn-danger" style="padding:0px;" onclick="if(confirm('Do you want to delete this item ?')) ajax('incoming_list&del=<?php echo $rs->doc_id; ?>','showDetail');"><i class="fas fa-minus-circle"style="margin: .4rem; cursor: pointer; color: #fff;"></i></button>
                    </div>
                </td>
            </tr>
        <?php } ?>
        </table>
    </div>
</div>
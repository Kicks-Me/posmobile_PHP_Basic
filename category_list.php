<?php if($_REQUEST['del'] > 0 ){
        $conn->query("DELETE FROM categories WHERE cat_id='".$_REQUEST['del']."'");
        
    }
?>

<div class="row" style="padding-top: 10px;">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <form action="category_check.php" method="post" target="xData">
                    <input type="hidden" name="uid" id="uid" value="<?php echo $id; ?>">
                    <div style="border: 1px solid #DEDEDE; padding: 2rem 1.2rem; background-color: #F2F2F2; width: 100%;" class="shadow rounded">
                        <table width="100%">
                            <tr>
                                <td align="left" width="20%">
                                    Name
                                </td>
                                <td align="left">
                                    <input type="text" name="newcat" id="newcat" placeholder="New category" class="form-control" required style="padding-right: 5px;" />
                                </td>
                                <td width="15%"><button type="submit" class="btn btn-dark" style="width:100%; margin-left: 5px;">Add</button></td>
                            </tr>
                           <!--  <tr>
                                <td>
                                    Username
                                </td>
                                <td>
                                    
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
                            </tr> -->
                        </table>
                    </div>
                </form>
    </div>
    <div class="col-sm-3"></div>
</div>
<div id="errtxt" align="center" style="color:#F00; margin-top:1.6rem;">

</div>
<div style="margin-top:1rem;">
    <center style="padding-bottom: .5rem;">
        <h5 style="border-bottom:1px solid #999; padding-bottom: 10px;">Category List</h5>
    </center>
    <table width="100%">       
    <?php 
        $qry = $conn->query("SELECT*from categories WHERE cat_sub_id = 0 ORDER BY cat_name");
        $i = 0;
        while ($rs = mysqli_fetch_object($qry)) {     
        $i ++;  
    ?>         
        <tr>
            <td style="font-size:18px; padding-right:10px;"><?php echo $i ?></td>
            <td>
                <input type="text" name="catname[]" id="catname[]" class="form-control" value="<?php echo $rs->cat_name; ?>" onblur="ajax('category_update&catid=<?php echo $rs->cat_id; ?>&txt='+this.value,'showhide');"/>
            </td>
            <td>
                <div class=" btn-group">
                    <button class="btn btn-danger" style="padding:3px; margin-top:4px; margin-left:5px;" onclick="if(confirm('Do you want to delete this item ?')) ajax('category_list&del=<?php echo $rs->cat_id; ?>','showdetail');"><i class="fas fa-minus-circle"style="margin: .4rem; cursor: pointer; color: #fff;"></i></button>
                </div>
            </td>
        </tr>
    <?php } ?>
    </table>
</div>
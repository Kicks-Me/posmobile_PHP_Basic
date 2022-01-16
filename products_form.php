<?php
    if($_REQUEST['pdid'] > 0){
        $qry = $conn->query("SELECT*FROM products WHERE pd_id='".$_REQUEST['pdid']."'");
        if(mysqli_num_rows($qry) < 1){
            alertDiv('Not found data for edit.','errtxt','W');
            exit();
        }
        $rs = mysqli_fetch_object($qry);
    }
?>
<div class="row" style="padding-top: 10px;">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <form action="products_check.php" method="post" target="xData" enctype="multipart/form-data">
                    <input type="hidden" name="pdid" id="pdid" value="<?php echo $rs->pd_id; ?>">
                    <div style="border: 1px solid #DEDEDE; padding: 2rem 1.2rem; background-color: #F2F2F2; width: 100%;" class="shadow rounded">
                        <table width="100%">
                            <tr>
                                <td align="left" width="30%">
                                    Categories
                                </td>
                                <td align="left" width="70%">
                                    <select class="form-control" name="pd_catid" id="pd_catid" onfocus="getElementById('errtxt').innerHTML='';">
                                        <?php
                                            $catqry = $conn->query("SELECT*FROM categories ORDER BY cat_name ASC");
                                            while ($catrs = mysqli_fetch_object($catqry)) {
                                                echo "<option value=\"$catrs->cat_id\"";
                                                    if($rs->pd_catid == $catrs->cat_id) echo "selected";
                                                echo ">".$catrs->cat_name."</option>";
                                            }
                                         ?>
                                    </select>
                                </td>                                
                            </tr>
                            <tr>
                                <td align="left">
                                    Code
                                </td>
                                <td align="left" style="padding-top: 7px;">
                                    <input type="text" name="pcode" id="pcode" placeholder="Product Code" class="form-control" required style="padding-right: 5px;" value="<?php echo $rs->pd_code; ?>" onfocus="getElementById('errtxt').innerHTML='';" />
                                </td>                                
                            </tr>
                            <tr>
                                <td align="left">
                                    Name
                                </td>
                                <td align="left" style="padding-top: 7px;">
                                    <input type="text" name="pname" id="pname" placeholder="Product Name" class="form-control" required value="<?php echo $rs->pd_name; ?>" onfocus="getElementById('errtxt').innerHTML='';" />
                                </td>                                
                            </tr>
                            <tr>
                                <td align="left">
                                    Price
                                </td>
                                <td align="left" style="padding-top: 7px;">
                                    <input type="text" name="pprice" id="pprice" placeholder="Price" class="form-control" required style="padding-right: 5px;" value="<?php echo $rs->pd_price; ?>" onfocus="getElementById('errtxt').innerHTML='';" />
                                </td>                                
                            </tr>
                            <tr>
                                <td align="left" >
                                    Image 
                                </td>
                                <td align="left" style="padding-top: 7px;">
                                    <?php 
                                        $pict = "<img id=\"output\" src=\"images/no-image.png\" style=\"border-radius: .6rem;\" >";

                                        if (is_file($rs->pd_image)) {
                                            $pict = "<img id=\"output\" src=\"".$rs->pd_image."\" style=\"border-radius: .6rem;\" width=\"100%\" />";
                                        }
                                    ?>
                                    <label for="pict" style="width:100%; cursor: pointer;">
                                        <div id="img" align="center" style="width: 100%; border: 1px solid #ccc; background-color: #f3f3f3; border-radius: .6rem;">
                                            <?php echo $pict; ?>
                                        </div>
                                        <input type="file" name="pict" id="pict" accept="image/*" style="display: none;" onchange="if(this.vlaue !='') loadFile(event)" onfocus="getElementById('errtxt').innerHTML='';">
                                    </label>
                                    <input type="hidden" name="old_pict" id="old_pict" value="<?php echo $rs->pd_image; ?>" onfocus="getElementById('errtxt').innerHTML='';">
                                </td>                                
                            </tr>


                            <tr>
                                <td></td>
                                <td style="padding-top: 1rem;">
                                    <div id="errtxt" align="center" style="color:#F00; margin-bottom:1rem;">

                                    </div>
                                    <button type="submit" class="btn btn-dark" style="width:100%;">Add</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </form>
    </div>
    <div class="col-sm-3"></div>
</div>

<div class="row">
    <div style="width: 100%; padding: 0 15px;">   
        <table width="100%">  
        <tr style="padding: 7px; font-weight: bolder; border-bottom: 1px solid #ccc;">
                <td width="5%" style="font-size:18px; padding-right:10px;">
                    No     
                </td>

                <td width="15%" style="padding-right:5px;">
                    Category
                </td>

                <td style="padding-right:5px;">
                    Product
                </td>

                <td width="10%" style="padding-right:5px;">
                    Stock
                </td>

                <td width="10%" align="right">
                    Action
                </td>
            </tr>


        <?php 
            if($_REQUEST["del"] > 0){
                $del = $conn->query("SELECT*FROM products WHERE pd_id='".$_REQUEST["del"]."'");
                $rsdel = mysqli_fetch_object($del);
                if(is_file($rsdel->pd_image)){
                    unlink($rsdel->pd_image);
                }
                
                $conn->query("DELETE FROM products WHERE pd_id='".$_REQUEST["del"]."'");
            }
            // else{
            //     echo "Del < 0";
            //     exit();
            // }

            $sql ="SELECT a.pd_id, b.cat_id, b.cat_name, a.pd_code,a.pd_name,a.pd_price, a.pd_stock,a.pd_image FROM products a JOIN categories b ON a.pd_catid = b.cat_id ";
                if(strlen($_REQUEST['txt']) > 2){
                    $txt = $_REQUEST['txt'];
                    $sql .= " WHERE a.pd_code LIKE '%".$txt."%' OR a.pd_name LIKE '%".$txt."%' OR b.cat_name LIKE '%".$txt."%' ";
                }

            $sql .= " ORDER BY a.pd_id, a.pd_catid";

            $qry = $conn->query($sql);

            // $qry = $conn->query("SELECT*from products ORDER BY pd_name");
            $i = 0;
            while ($rs = mysqli_fetch_object($qry)) {     
            $i ++;  
        ?>
            <tr style="border-bottom: 1px dotted #ccc;">
                <td style="font-size:18px; padding-right:10px;">
                    <?php echo $i ?>                
                </td>

                <td>
                    <?php echo $rs->cat_name; ?>
                </td>

                <td align="left" onclick="ajax('products_form&pdid=<?php echo $rs->pd_id; ?>','showProductDetail')" style="cursor: pointer;">
                    <div style="display: flex; align-items: center;">
                        <div style="display: flex; justify-content: center; align-content: center; width: 37px; height: 37px; border-radius: 50%; border: 1px solid #c2c2c2; margin-right: 5px; ">
                            <?php 
                                echo "<img src=\"".$rs->pd_image."\" width=\"37\" style=\"border-radius: 50%;\">";
                            ?>
                            
                        </div>
                        <div>
                            <span><?php echo $rs->pd_code; ?> </span>
                            <b><?php echo $rs->pd_name; ?></b><br>
                            <span style="color: orange;"><?php echo number_format($rs->pd_price,2)." Lak"; ?></span>
                        </div>
                    </div>
                </td>

                <td>
                    <?php echo $rs->pd_stock; ?>
                </td>

                <td align="right">
                    <div class=" btn-group">
                        <button class="btn btn-danger" style="padding:0px;" onclick="if(confirm('Do you want to delete this item ?')) ajax('products_list&del=<?php echo $rs->pd_id; ?>','showProductDetail');"><i class="fas fa-minus-circle"style="margin: .4rem; cursor: pointer; color: #fff;"></i></button>
                    </div>
                </td>
            </tr>
        <?php } ?>
        </table>
    </div>
</div>
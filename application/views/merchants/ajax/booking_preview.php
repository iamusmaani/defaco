<table class="table table-bordered">
    <tr>
        <td colspan="3"><h3>Customer Details</h3></td>
    </tr>
    <tr>
        <td>Name: <b><?php echo $customer['first_name'];?> <?php echo $customer['last_name'];?></b></td>
        <td>Phone: <b><?php echo $customer['phone'];?></b></td>
        <td>Email: <b><?php echo $customer['email'];?></b></td>
    </tr>
    <tr>
        <td>Date: <b><?php echo $appointment_schedule['date'];?></b></td>
        <td>From: <b><?php echo $appointment_schedule['start_time'];?></b></td>
        <td>To: <b><?php echo $appointment_schedule['end_time'];?></b></td>
    </tr>
</table>
<table class="table table-bordered">
    <?php
        $i=1;
        if(count($services) > 0){
            foreach($services as $k => $v){
    ?>
    <tr>
        <td><p>#<?php echo $i;?></p></td>
        <td>
            <?php
                if(count($media = get_service_media($v[0]->id)) > 0){
            ?>
            <img src="uploads/services/<?php print_r($v[0]->id);?>/<?php print_r($media[0]->media);?>" height="50">
            <?php
                } else {
            ?>
            <img src="uploads/services/default.png" height="50">
            <?php
                }
            ?>
        </td>
        <td>
            <p><?php print_r($v[0]->is_product == 0 ? "Service" : "Product");?></p>
        </td>
        <td>
            <h5><?php print_r($v[0]->name);?></h5>
            <p><?php print_r($v[0]->description);?></p>
            <table class="table table-bordered table-responsive">
                <?php
                    $attributes = get_service_attributes($v[0]->id);
                    $j=1;
                    foreach($attributes as $atr_k => $atr_v){
                ?>
                <tr>
                    <td>#<?php print_r($j);?></td>
                    <td><?php print_r($atr_v->is_product == 1 ? "Product" : "Service");?></td>
                    <td><?php print_r($atr_v->name);?></td>
                    <td>
                        Tax: 
                        <?php
                            $tax_amount = 0;
                            $taxes = get_merchant_tax($atr_v->tax);
                            if(count($taxes) == 0){
                                echo "$0";
                            } else {
                                foreach($taxes as $key => $val){
                                    if($val->is_percentage){
                                        $tax_amount = $tax_amount + ($val->amount / 100);
                                    } else {
                                        $tax_amount = $tax_amount + $val->amount;
                                    }
                                }
                                echo "$".$tax_amount;
                            }
                        ?>
                        <br>
                        Discount: 
                        <?php
                            $discount_amount = 0;
                            $discounts = get_merchant_discount($atr_v->discount);
                            if(count($discounts) == 0){
                                echo "$0";
                            } else {
                                foreach($discounts as $key => $val){
                                    if($val->is_percentage){
                                        $discount_amount = $discount_amount + ($val->amount / 100);
                                    } else {
                                        $discount_amount = $discount_amount + $val->amount;
                                    }
                                }
                                echo "$".$discount_amount;
                            }
                        ?>
                    <td>$<?php print_r($atr_v->price);?></td>
                </tr>
                <?php
                    $j++;  
                    }
                ?>
            </table>
        </td>
        <td class="text-left">
            <p><strong><?php echo $appointment_schedule['date']?><br><?php echo $appointment_schedule['start_time']?> - <?php echo $appointment_schedule['end_time']?></strong></p>
        </td>
        <td class="text-right">
            <p>
                Tax: 
                <?php
                    // get service tax
                    $total_service_tax = 0;
                    $taxes = get_service_tax($v[0]->id);
                    foreach($taxes as $key=>$val){
                        if($val->is_percentage){
                            $total_service_tax = $total_service_tax + ($val->amount / 100);
                        } else {
                            $total_service_tax = $total_service_tax + $val->amount;
                        }
                    }
                    echo "$".$total_service_tax;
                ?>
                <br/>
                Discount: 
                <?php
                    // get service tax
                    $total_service_discount = 0;
                    $discounts = get_service_discount($v[0]->id);
                    foreach($discounts as $key=>$val){
                        if($val->is_percentage){
                            $total_service_discount = $total_service_discount + ($val->amount / 100);
                        } else {
                            $total_service_discount = $total_service_discount + $val->amount;
                        }
                    }
                    echo "$".$total_service_discount;
                ?>
                <br/>
                <strong>Price: $<?php print_r($v[0]->price);?></strong>
            </p>
        </td>
    </tr>
    <?php
            $i++;
            }
        }
    ?>
    <tr>
        <td colspan="4" class="text-right">&nbsp;</td>
        <td colspan="1" class="text-right"><input class="form-control" onblur="" placeholder="Enter Promo Code" type="text" id="promo_code" name="promo_code"></td>
        <td colspan="1" class="text-right"><span onclick="" class="btn btn-info">Apply</span></td>
    </tr>
    <tr>
        <td colspan="5" class="text-right"><p>Grand total:</p></td>
        <td colspan="1" class="text-right"><h5>$105</h5></td>
    </tr>
</table>
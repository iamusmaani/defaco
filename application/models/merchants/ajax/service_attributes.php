<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <th>#</th>
            <th>Type</th>
            <th>Name</th>
            <th>Price ($)</th>
            <th>Duration (Minutes)</th>
            <th>Tax(s)</th>
            <th>Discount(s)</th>
            <th>Worth</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($attributes as $k=>$v){
        ?>
        <tr>
            <td><input onchange="add_appointment_service_addons(<?php echo $service_id;?>, this)" type="checkbox" value="<?php echo $v->id;?>" name="attribute_id[]"/></td>
            <td><?php echo $v->is_product == 1? "Product" : "Service";?></td>
            <td><?php echo $v->name;?></td>
            <td class="text-right">$<?php echo $v->price;?></td>
            <td class="text-right"><?php echo $v->duration;?></td>
            <td class="text-right">
                <?php
                    $tax_amount = 0;
                    $taxes = get_merchant_tax($v->tax);
                    if(count($taxes) == 0){
                        echo "No Tax";
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
            </td>
            <td class="text-right">
                <?php
                    $discount_amount = 0;
                    $discounts = get_merchant_discount($v->discount);
                    if(count($discounts) == 0){
                        echo "No Discount";
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
            </td>
            <td>
                <?php
                    $net_price = ($v->price + $tax_amount ) - $discount_amount;
                ?>
                <p class="text-right"><del>$<?php echo $v->price;?></del></p>
                <h4 class="text-right">$<?php echo $net_price;?></h4>
            </td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
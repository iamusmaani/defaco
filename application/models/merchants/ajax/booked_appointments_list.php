<?php
    if(count($appointments)){
        foreach($appointments as $k => $v){
?>
<div class="kt-widget2__item kt-widget2__item--danger">
    <div class="kt-widget2__checkbox">
    </div>
    <div class="kt-widget2__info">
        <a class="kt-widget2__title">
            <?php echo date('h:i A',strtotime($v->start_time));?> - <?php echo date('h:i A',strtotime($v->end_time));?>
        </a>
        <a class="kt-widget2__username">
            Booked
        </a>
    </div>
</div>
<?php
        } 
    }   else {
?>
    <h5 class="text-success"><strong>No Appointments for this date</strong></h5>
<?php
    }
?>
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <span class="kt-subheader__separator kt-hidden"></span>
            <div class="kt-subheader__breadcrumbs">
                <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                <?php
                    if(isset($breadcrumps)){
                        if(is_array($breadcrumps)){
                            for($i=0;$i<count($breadcrumps);$i++){
                ?>
                            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                            <a href="" class="kt-subheader__breadcrumbs-link"><?php echo $breadcrumps[$i]?></a>
                <?php
                            }
                        } else {
                ?>
                        <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                        <a href="" class="kt-subheader__breadcrumbs-link"><?php echo $breadcrumps;?></a>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</div>
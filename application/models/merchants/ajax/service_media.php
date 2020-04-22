<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center">#</th>
            <th class="text-center">Media</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $count = 1;
            foreach($medias as $k=>$v){
        ?>
        <tr>
            <td class="text-center"><?php echo $count;?></td>
            <td class="text-center">
                <a onclick="preview_service_media(<?php echo $service_id;?>, '<?php echo $v->media;?>')">
                    <img src="uploads/services/<?php echo $service_id;?>/<?php echo $v->media;?>" height="100">
                </a>
            </td>
        </tr>
        <?php
            $count++;
            }
        ?>
    </tbody>
</table>
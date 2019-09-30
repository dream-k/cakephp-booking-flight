<?php
function timeago($date1, $date2) {
    $date1_ts = strtotime($date1);
    $date2_ts = strtotime($date2);
    $diff = $date2_ts - $date1_ts;
    return round($diff / 86400);
}
function changeFormat($pri) {
    $dat = explode('.', $pri);
    $f = str_replace(',', '.', $dat[0]) . ',' . $dat[1];
    return $f;
}
$chk_in='';
    $chk_out='';
foreach(explode('&',urldecode( @$url_query_string)) as $url){
    
    if(explode('=',$url)[0] == 'hotel_check_in'){
        $chk_in=explode('=',$url)[1];
    }
    if(explode('=',$url)[0] == 'hotel_check_out'){
        $chk_out=explode('=',$url)[1];
    }
}
$dateDifference = timeago(date_format(date_create(str_replace('/', '-', $chk_in)), 'Y-m-d'), date_format(date_create(str_replace('/', '-', $chk_out)), 'Y-m-d'));
$x = $result_property; //->toArray();
if (@count(@$x) > 0) {
    foreach ($result_property as $list) {
        $htl_rm_pric = $this->User->getHotelprice($list->property_id, $guest);
        $htl_rm_pric_frea = $this->User->get_featured_fee($list->property_id);
        $getBetDetails = $this->User->propertyBedCount($list->property_id, $guest);
        $aminity = $this->User->propertyAmenities($list->property_id, $guest);
        ?>
        <div class="hotel-lsting">
            <div class="hotel-lsting-left">
                <?php if ($htl_rm_pric_frea > 0) { ?>
                    <span>Best Choice</span>
                <?php } ?>
                <div class="hotel-img">
                    <img src="<?= HTTP_ROOT; ?>img/pro_pic/<?= $this->User->getHotelImage($list->property_id); ?>" alt="img" style="width: 100%;">            
                </div>
            </div>
            <div class="hotel-lsting-middle" style="width: 48%;">
                <h3><?= $this->User->getProName($list->property_id); ?> 
                    <?php for ($i = 1; $i <= $this->User->propertyRating($list->property_id); $i++) { ?>
                        <i class="fa fa-star rating"></i>
                    <?php } ?>
                    <i class="fa fa-thumbs-up"></i>
                </h3>
                <p><?= $this->User->propertySize($list->property_id, $guest); ?> <?php echo __('sqm') ?> <br>
                    <i class="fas fa-users"></i> <?php
                    echo $this->User->propertyPeople($list->property_id, $guest);
                    if ($this->User->propertyPeople($list->property_id, $guest) <= 1) {
                        ?> <?php echo __('Guest') ?> <?php } else { ?> <?php echo __('Guests') ?> <?php } ?> <br>
                    <i class="fas fa-bed"></i> <?php echo $getBetDetails->num_bed; ?>x <?php echo __($getBetDetails->beds); ?>  <?php foreach ($getBetDetails->extranets_user_property_sub_beds as $bes) { ?> <?php echo " + " . $bes->num_beds ?>x <?php
                        echo __($bes->beds);
                    }
                    ?><br>
                    <?php
                    //pj($aminity);
                    $aminityx = [];
                    $geta = json_decode($aminity);
                    $i = 1;
                    foreach ($geta as $daee) {
                        $aminityx[] = __($daee);
                        if ($i++ == 3)
                            break;
                    }
                    echo implode(', ', $aminityx);
                    ?>
                </p>
                <?php if ($this->User->propertyRating($list->property_id) >= 4) { ?><h5 style="background-color:#8bc34a !important;font-size: 15px;width: 62%;margin-top: -3px;text-transform: capitalize;"><a href="#"><?php echo __('High Quality') ?></a></h5> 
                <?php } else if ($this->User->propertyRating($list->property_id) >= 3) { ?><h5 style="background-color: #ffc107 !important;font-size: 15px;width: 62%;margin-top: -3px;text-transform: capitalize;"><a href="#"><?php echo __('Medium Quality') ?></a></h5> 
        <?php } else if ($this->User->propertyRating($list->property_id) <= 2) { ?><h5 style="background-color: #f44336 !important;font-size: 15px;width: 62%;margin-top: -3px;text-transform: capitalize;"><a href="#"><?php echo __('Low Quality') ?></a></h5> <?php } ?>
            </div>
            <div class="hotel-lsting-right">
                <h6><?php echo $this->User->reviewCount($list->property_id); ?> <?php echo __('reviews') ?><span><?php echo is_nan($this->User->totalRating($list->property_id))?0:$this->User->totalRating($list->property_id); ?></span></h6>
                <h5 class="old-price">
                    <?php if ($htl_rm_pric_frea > 0) { ?>
                        <span>was</span><span>AOA <?= changeFormat(number_format($htl_rm_pric, 2)); ?>/<?php echo __('night') ?></span>
                        <?php
                    } else {
                        echo "&nbsp;&nbsp;";
                    }
                    ?>
                </h5>


                <h5><?php if ($htl_rm_pric_frea > 0) { ?>
                        <span>now</span>
                        AOA <?= changeFormat(number_format(($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100))), 2)); ?>/<?php echo __('night') ?></h5>
                    <h6 style="color:green;font-size: 15px;">AOA <?=
                        changeFormat(number_format($dateDifference * ($htl_rm_pric - ($htl_rm_pric * ($htl_rm_pric_frea / 100))), 2));

                        if ($dateDifference < 2) {
                             echo " ".__('for') ?> <?= $dateDifference; ?> <?php echo __('night'); 
                        }else{
                        echo " ".__('for') ?> <?= $dateDifference; ?> <?php echo __('nights'); } ?>
                    </h6>
                <?php } ?> 
                <?php if ($htl_rm_pric_frea > 0) { ?>
        <?php } else { ?>
                    AOA <?= changeFormat(number_format($htl_rm_pric, 2)); ?>/<?php echo __('night') ?></h5>
                    <h6 style="color:green;font-size: 15px;">AOA <?=
                        changeFormat(number_format($dateDifference * $htl_rm_pric, 2));

                        if ($dateDifference < 2) {
                            ?>
                            <?php echo " ".__('for') ?> <?= $dateDifference; ?> <?php echo __('night'); 
                        }else{ echo " ".__('for') ?> <?= $dateDifference; ?> <?php echo __('nights'); } ?>
                    </h6>
        <?php } ?>

                <div class="form-group" style="margin:0; float: right;">
                    <label>&nbsp;</label>
                    <a href="<?= HTTP_ROOT; ?>preview/<?= $list->property_id; ?>?<?= $url_query_string; ?>" target="_blank"><button type="button" class="btn btn-primary hvr-grow btn-fill"><?php echo __('Book') ?></button></a>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    ?>
    <div class='no-result' style=' width: 70%;'><div class='no-found-logo'><img src='<?= $this->Url->image('extranet/no-properties.svg'); ?> ' alt=''></div> <h2><?php echo __('No Properties Available') ?></h2><p><?php echo __('We could not find any properties according to your selected dates. Try searching again with different dates.'); ?></p> <a href='javascript:void(0)'><?php echo __('Change') ?></a></div>
            <?php
        }
        if (empty($result_property_count)) {
            $result_property_count = 0;
        }
        ?>
<script>
    $(document).ready(function () {
        $('#cnt').text('<?= $result_property_count; ?>');
    });
</script>
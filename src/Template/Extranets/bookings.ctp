<link rel="stylesheet" href="<?php echo HTTP_ROOT ?>css/extranet/bookings.css" type="text/css">
<?php
$protocol = "https://";
$currUrl = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
if (!empty($_GET['q'])) {
    ?>
    <script>
        $(function () {
            $('#sel').val('<?= $_GET['q']; ?>');
        });
    </script>
    <?php
}
?>
<script>
//update URL in js
    function UrlUpdate(uri, key, value) {
        var URL;
        var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
        var separator = uri.indexOf('?') !== -1 ? "&" : "?";
        if (uri.match(re)) {
            URL = uri.replace(re, '$1' + key + "=" + value + '$2');
        } else {
            URL = uri + separator + key + "=" + value;
        }
        window.location.href = URL;
    }
</script>
<div id="Bookings">
    <div class="container">
        <div class="row">
            <section class="earnings">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <h2>Bookings</h2>
                            <div class="all-earnings">
                                <select id="sel" onchange="UrlUpdate('<?= $currUrl; ?>', 'q', this.value)">
                                    <option value="all"><?=__("All Bookings");?></option>
                                    <option value="today"><?=__("Today");?></option>
                                    <option value="yesterday"><?=__("Yesterday");?></option>                                   
                                    <option value="monthly"><?=__("This Month");?></option>
                                    <option value="3month"><?=__("3 Months ago");?></option>
                                    <option value="6month"><?=__("6 Months ago");?></option>
                                    <option value="yearly"><?=__("This Year");?></option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="earnings-main">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <a href="booking_details.ctp"></a>
                            <div class="earnings-box">
                                <h3><?php if(@$getBookingOrder>1){ echo __("Orders"); }else{ echo __("Order"); } ?><span><?php echo number_format(@$getBookingOrder) . "<br>"; ?></span></h3>
                            </div>
                            <div class="earnings-box">
                                <h3><?php if(@$new>1){ echo __("Customers"); }else{ echo __("Customer"); } ?><span><?php echo number_format(@$new) . "<br>"; ?></span></h3>
                            </div>
                            <div class="earnings-box">
                                <h3><?= __("Alegro Earnings"); ?><span>
                                        <?php echo changeFormat(number_format($getBookingPrice * ($this->User->getSeviceFee() / 100), 2)); ?> AOA</span></h3>
                            </div>
                            <div class="earnings-box">
                                <h3><?= __("My Earnings"); ?><span> <?php echo changeFormat(number_format($getBookingPrice - ($getBookingPrice * ($this->User->getSeviceFee() / 100)), 2)); ?>  AOA</span></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" type="text/css" />-->

<!--<link href="<?= HTTP_ROOT; ?>backend/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />-->
<!--<script src="<?= HTTP_ROOT; ?>backend/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>-->
<!--<script src="<?= HTTP_ROOT; ?>backend/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>-->
<!--<script type="text/javascript">-->
            <!--$(function () {-->
            <!--$("#table1").dataTable();-->
            <!--});-->
            <!--</script>-->

            <section class="book-revse-part">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <h3>Booking Details</h3>
                        </div>
                    </div>
                </div>
            </section>


            <section class="sor-tb-ext">
                <div class="container">

                    <table id="table1" data-toggle="table"
                           data-search="true"
                           data-filter-control="true" 
                           data-show-export="true"
                           data-click-to-select="true"
                           data-toolbar="true"
                           data-pagination="true"
                           class="table-responsive">
                        <thead style="background: #f9d749;border: 1px solid #000;">
                            <tr>
                                <th data-field="Booking Number" data-filter-control="input" data-sortable="true">ID <i class="fa fa-fw fa-sort"></i></th>
                                <th data-field="Guest Name" data-filter-control="select" data-sortable="true">Lead Guest <i class="fa fa-fw fa-sort"></i></th>
                                <th data-field="Date" data-filter-control="select" data-sortable="true">Date <i class="fa fa-fw fa-sort"></i></th>
                                <th data-field="Check-In" data-sortable="true">Check-In <i class="fa fa-fw fa-sort"></i></th>
                                <th data-field="Check-Out" data-filter-control="select" data-sortable="true">Check-Out <i class="fa fa-fw fa-sort"></i></th>
                                <th data-field="Total Price" data-filter-control="select" data-sortable="true">Total <i class="fa fa-fw fa-sort"></i></th>
                                <th data-field="Commission" data-sortable="true">Commission <i class="fa fa-fw fa-sort"></i></th>
                                <th data-field="Action" data-filter-control="select" data-sortable="true">Action <i class="fa fa-fw fa-sort"></i></th>
                                <th data-field="Status" data-filter-control="select" data-sortable="true">Status <i class="fa fa-fw fa-sort"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($getBookingDetails as $list) { ?>
                                <tr>

                                    <td> <?php echo $list->booking_no; ?></td>
                                    <td><?php echo $list->user_firstname . " " . $list->user_lastname; ?></td>
                                    <td><?php echo date_format($list->booking_dt, 'd') . " " . __(date_format($list->booking_dt, 'M')) . " " . date_format($list->booking_dt, 'Y'); ?></td>
                                    <td><?php echo date_format($list->check_in, 'd') . " " . __(date_format($list->check_in, 'M')) . " " . date_format($list->check_in, 'Y'); ?></td>
                                    <td><?php echo date_format($list->check_out, 'd') . " " . __(date_format($list->check_out, 'M')) . " " . date_format($list->check_out, 'Y'); ?></td>
                                    <td>AOA <?php echo changeFormat(number_format(@$list->total_cost, '2')); ?></td>
                                    <td><?= $this->User->getSeviceFee(@$list->property_id); ?>%</td>
                                    <td> <?= '<a href="' . HTTP_ROOT; ?>extranets/booking_details/<?= $list->booking_no . '">'; ?>View<?= "</a>"; ?></td>
                                    <td><?php
                                        if ($list->payment_status == 1) {
                                            echo __("Pending");
                                        }if (($list->payment_status == 2) || ($list->payment_status == 4)) {
                                            echo __("Cancelled");
                                        }if ($list->payment_status == 3) {
                                            echo __("Paid");
                                        }
                                        ?></td>
                                </tr>
                            <?php
                            }

                            function changeFormat($pri) {
                                $dat = explode('.', $pri);
                                $f = str_replace(',', '.', $dat[0]) . ',' . $dat[1];
                                return $f;
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>
</div>
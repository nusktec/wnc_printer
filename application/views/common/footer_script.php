<?php
/**
 * Developer: RSC Byte Limted
 * Website: rscbyte.com
 * phone: 234-8164242320
 * email: nusktecsoft@gmail.com
 * ...................................
 * footer.php
 * 11:36 AM | 2019 | 12
 **/
?>

    <!-- jQuery  -->
    <script src="<? echo base_url() ?>assets/js/jquery.min.js?<? echo rand(111, 999); ?>"></script>
    <script src="<? echo base_url() ?>assets/js/bootstrap.bundle.min.js?<? echo rand(111, 999); ?>"></script>
    <script src="<? echo base_url() ?>assets/js/jquery.slimscroll.js?<? echo rand(111, 999); ?>"></script>
    <script src="<? echo base_url() ?>assets/js/waves.min.js?<? echo rand(111, 999); ?>"></script>

    <!-- Jquery-Ui -->
    <script src="<? echo base_url() ?>plugins/jquery-ui/jquery-ui.min.js?<? echo rand(111, 999); ?>"></script>
    <script src="<? echo base_url() ?>plugins/moment/moment.js?<? echo rand(111, 999); ?>"></script>
    <script src='<? echo base_url() ?>plugins/fullcalendar/js/fullcalendar.min.js?<? echo rand(111, 999); ?>'></script>
    <script src='<? echo base_url() ?>plugins/datatables/jquery.dataTables.min.js?<? echo rand(111, 999); ?>'></script>

    <!-- App js -->
    <script src="<? echo base_url() ?>assets/js/app.js?<? echo rand(111, 999); ?>"></script>

    <!--custom putter-->
<?
if (@$scripts) {
    //iterate scripts
    foreach ($scripts as $key => $v) {
        ?>
        <script src="<? echo base_url("scripts/") . "script_" . $v . ".js?no-cache" . rand(111, 999); ?>"
                type="text/javascript"></script>
        <?
    }
}
?>
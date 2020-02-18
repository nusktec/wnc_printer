<!DOCTYPE html>
<html lang="en">
<!--Header-->
<? include 'common/header_style.php'; ?>
<body>

<!-- Begin page -->
<!--<div class="error-bg"></div>-->
<div class="wrapper-page">
    <div class="card shadow-none" style="border-radius: 10px">

        <div class="card-body">
            <div class="m-4">
                <h3><a class="btn btn-outline-secondary" href="<? echo base_url('') ?>"><i class="fa fa-arrow-left"></i>
                        Home </a>
                    <img class="d-none"
                         src="<? echo base_url() ?>assets/images/wnc.jpg" width="50">
                </h3>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-hover" id="activities_table">
                            <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Copies</th>
                                <th scope="col">Description</th>
                                <th scope="col">Print Type</th>
                                <th scope="col">Doc. Ext</th>
                                <th scope="col" colspan="2">Date</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?
                            $sn = 0;
                            if (count(@$printer) > 0) {
                                $printer = array_reverse($printer);
                                foreach ($printer as $k => $v) {
                                    $sn++;
                                    ?>
                                    <tr>
                                        <td><? echo $sn; ?></td>
                                        <td><? echo $v['uname']; ?></td>
                                        <td>
                                            <span class="badge <? echo(($v['pstatus'] == 0) ? "badge-danger" : "badge-success"); ?>"><? echo(($v['pstatus'] == 0) ? "Pending" : "Printed"); ?></span>
                                        </td>
                                        <td><? echo $v['pcopies']; ?></td>
                                        <td><? echo $v['pdesc']; ?></td>
                                        <td>
                                            <span class="badge <? echo(($v['ptype'] == "B") ? "badge-secondary" : "badge-success"); ?>"><? echo(($v['ptype'] == "B") ? "BLACK-WHITE" : "COLORED"); ?></span>
                                        </td>
                                        <td><? echo fileIdentity($v['pext']); ?></td>
                                        <td><? echo $v['pcreated']; ?></td>
                                        <td>
                                            <div>
                                                <a download="rsc_work_n_connect_backup" target="_blank"
                                                   href="<? echo base_url("uploads") . "/" . $v['pid'] . "_" . sha1($v['pid']) . "." . $v['pext']; ?>"
                                                   class="btn btn-primary btn-sm">Download</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?
                                }
                            } else {
                                ?>
                                <td><h3>No Printing Job...</h3></td>
                                <?
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
<!-- END wrapper -->
<p style="position: absolute; bottom: 10px; width: 100%; text-align: center">RSC BYTE CODE</p>
<!-- jQuery  -->
<? include 'common/footer_script.php'; ?>
</body>

</html>
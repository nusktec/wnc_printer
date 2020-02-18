<?php
/**
 * Developer: RSC Byte Limted
 * Website: rscbyte.com
 * phone: 234-8164242320
 * email: nusktecsoft@gmail.com
 * ...................................
 * dashboad.php
 * 2:08 AM | 2019 | 12
 **/
?>
<div class="container-fluid">
    <!-- Page-Title -->
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Dashboard</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item active">Dashboard</li>
                    <li class="breadcrumb-item active"><a href="<? echo base_url('logout') ?>">logout</a></li>
                </ol>
            </div>
        </div>
        <!-- end row -->
    </div>

    <div class="row">

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="fa fa-users bg-primary  text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Active Users</h5>
                    </div>
                    <h3 class="mt-4"><? echo count($users); ?></h3>
                    <div class="progress mt-4 d-none" style="height: 4px;">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 75%"
                             aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-printer bg-success text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Total Print Jobs</h5>
                    </div>
                    <h3 class="mt-4"><? echo count($printer); ?></h3>
                    <div class="progress mt-4 d-none" style="height: 4px;">
                        <div class="progress-bar bg-success" role="progressbar" style="width: 88%"
                             aria-valuenow="88" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-playlist-check bg-dark text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Ready Jobs</h5>
                    </div>
                    <h3 class="mt-4"><? echo count($printer_ready); ?></h3>
                    <div class="progress mt-4 d-none" style="height: 4px;">
                        <div class="progress-bar bg-warning" role="progressbar" style="width: 68%"
                             aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-account bg-danger text-white"></i>
                    </div>
                    <div>
                        <h5 class="font-16">Last Joined</h5>
                    </div>
                    <? $users = array_reverse($users); ?>
                    <h3 class="mt-4"><? echo((count($users) > 0) ? timeago(strtotime($users[0]['ucreated'])) : "No Time"); ?></h3>
                    <div class="progress mt-4 d-none" style="height: 4px;">
                        <div class="progress-bar bg-danger" role="progressbar" style="width: 82%" aria-valuenow="82"
                             aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- START ROW -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title mb-4">Pending Jobs</h4>
                    <div class="table-responsive">
                        <table class="table table-hover" id="activities_table">
                            <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Pac No.</th>
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
                                        <td><? echo $v['upac']; ?></td>
                                        <td>
                                            <span class="badge <? echo(($v['pstatus'] == 0) ? "badge-danger" : "badge-success"); ?>"><? echo(($v['pstatus'] == 0) ? "Pending" : "Printed"); ?></span>
                                        </td>
                                        <td><? echo $v['pcopies']; ?></td>
                                        <td><? echo $v['pdesc']; ?></td>
                                        <td>
                                            <span class="badge <? echo(($v['ptype'] == "B") ? "badge-secondary" : "badge-success"); ?>"><? echo(($v['ptype'] == "B") ? "BLACK-WHITE" : "COLORED"); ?></span>
                                        </td>
                                        <td><? echo fileIdentity($v['pext']); ?></td>
                                        <td><? echo timeago(strtotime($v['pcreated']), true); ?></td>
                                        <td>
                                            <div>
                                                <a target="_blank"
                                                   href="<? echo base_url("uploads") . "/" . $v['pid'] . "_" . sha1($v['pid']) . "." . $v['pext']; ?>"
                                                   class="btn btn-primary btn-sm">Print Job</a>
                                                <a href="<? echo base_url('admin/confirm/') . $v['pid']; ?>"
                                                   class="btn <? echo(((int)$v['pstatus'] === 1) ? "btn-danger" : "btn-success"); ?> btn-sm"><? echo(((int)$v['pstatus'] === 1) ? "Undone" : "Done"); ?></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?
                                }
                            } else {
                                ?>
                                <tr>
                                    <td><h3>No Pending Jobs To Print</h3></td>
                                </tr>
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
    <!-- END ROW -->
</div>
<script>
    setInterval(function () {
        window.location.reload();
    }, 10000);
</script>

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
                <h4 class="page-title">Users List</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a data-toggle="modal" data-target=".bs-example-modal-center"
                                                   href="javascript:void(0);">Add New User</a></li>
                </ol>
            </div>
        </div>
        <!-- end row -->
    </div>

    <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel"
         aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" class="form-horizontal m-t-30"
                          action="<? echo base_url("admin/users"); ?>">
                        <div class="form-group">
                            <div class="col-12">
                                <label>Name</label>
                                <input name="name" class="form-control" type="text" required="" placeholder="Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <label>Phone</label>
                                <input name="phone" class="form-control" type="text" required="" placeholder="Phone">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <label>Email</label>
                                <input name="email" class="form-control" type="email" required="" placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <label for="pkg">Package Type</label>
                                <select id="pkg" name="pkgtype" class="form-control">
                                    <option value="">--Select Pkg Type--</option>
                                    <option value="B">Black Only</option>
                                    <option value="C">Color Only</option>
                                    <option value="BC">Color & Black</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <label>Black Printing Qty</label>
                                <input value="10" name="blackqty" class="form-control" type="number" required=""
                                       placeholder="Black Qty">
                                <input name="action" class="form-control" type="hidden" value="adduser" required="">
                                <input name="formtoken" class="form-control" type="hidden"
                                       value="<? echo getFormToken(); ?>" required="">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <label>Colored Printing Qty</label>
                                <input value="10" name="colorqty" class="form-control" type="number" required=""
                                       placeholder="Color Qty">
                                <input name="action" class="form-control" type="hidden" value="adduser" required="">
                                <input name="formtoken" class="form-control" type="hidden"
                                       value="<? echo getFormToken(); ?>" required="">
                            </div>
                        </div>

                        <div class="form-group text-center m-t-20">
                            <div class="col-12">
                                <input value="Add User"
                                       class="btn btn-primary btn-block btn-lg waves-effect waves-light"
                                       type="submit"/>
                            </div>
                        </div>

                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <!-- START ROW -->
    <div class="row">
        <div class="col-xl-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title mb-4">Listing</h4>
                    <div class="table-responsive">
                        <table class="table table-hover" id="activities_table">
                            <thead>
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">PAC No.</th>
                                <th scope="col">Color Qty</th>
                                <th scope="col">Black Qty</th>
                                <th scope="col">Print Type</th>
                                <th scope="col">Usage</th>
                                <th scope="col">Days Rem.</th>
                            </tr>
                            </thead>
                            <tbody style="text-align: left">
                            <?
                            $sn = 0;
                            if (count(@$users) > 0) {
                                //$users = array_reverse($users);
                                foreach ($users as $key => $v) {
                                    $sn++;
                                    ?>
                                    <tr>
                                        <td><? echo $sn; ?></td>
                                        <td><? echo $v['uname']; ?></td>
                                        <td><? echo $v['uemail']; ?></td>
                                        <td><? echo $v['uphone']; ?></td>
                                        <td><? echo $v['upac']; ?></td>
                                        <td><? echo $v['ucolor']; ?></td>
                                        <td><? echo $v['ublack']; ?></td>
                                        <td><? echo $v['utype']; ?></td>
                                        <td><? echo timeago($v['uusage'], true); ?></td>
                                        <td><? echo(31 - (int)dateDiffTs($v['uusage'], getTimeStamp())) ?></td>
                                        <td>
                                            <div>
                                                <a onclick="deleteUser('<? echo base_url("admin/delete") . "/" . $v['uid']; ?>')"
                                                   href="javascript:0;"
                                                   class="btn btn-danger btn-sm">Remove</a>
                                                <a onclick="resetUser('<? echo base_url("admin/validity") . "/" . $v['uid']; ?>')"
                                                   href="javascript:0;"
                                                   class="btn btn-primary btn-sm">Reset Validity</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?
                                }
                            } else {
                                ?>
                                <tr>
                                    <td><h3>No User Registered</h3></td>
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
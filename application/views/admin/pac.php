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
                <h4 class="page-title">Manage PAC</h4>
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
                    <p class="sub-title">Extend Printing Allocation Size (Incrementally)</p>
                    <div class="form-group row">
                        <label for="example-search-input" class="col-sm-2 col-form-label">Search PAC No.</label>
                        <div class="col-sm-10">
                            <form method="post">
                                <input name="sinput" maxlength="10" class="form-control" type="search"
                                       placeholder="Type PAC and hit enter"
                                       id="example-search-input">
                                <input name="action" value="search" type="hidden"/>
                                <input type="hidden" value="<? echo getFormToken(); ?>" name="formtoken">
                            </form>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Days Rem.</label>
                        <div class="col-sm-10">
                            <input value="<? echo $search ? (31 - (int)dateDiffTs($search['uusage'], getTimeStamp())) . ' day(s) remaining' : ""; ?>"
                                   maxlength="7"
                                   name="allocation"
                                   disabled="disabled" class="form-control"
                                   type="text"
                                   id="example-text-input">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-text-input" class="col-sm-2 col-form-label">Papers Remaining</label>
                        <div class="col-sm-10">
                            <input value="<? echo 'Color: ' . $search['ucolor'] . ', Black: ' . $search['ublack']; ?>"
                                   maxlength="7"
                                   name="allocation"
                                   disabled="disabled" class="form-control"
                                   type="text"
                                   id="example-text-input">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input value="<? echo @$search['uemail'] ?>" disabled="disabled" class="form-control"
                                   type="email" placeholder="user@example.com"
                                   id="example-email-input">
                        </div>
                    </div>
                    <?
                    if (count(@$search) > 0) {
                        ?>
                        <form method="post">
                            <input name="action" value="topup" type="hidden"/>
                            <input type="hidden" value="<? echo getFormToken(); ?>" name="formtoken">
                            <input type="hidden" value="<? echo @$search['upac'] ?>" name="pac">
                            <div class="form-group row">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Command</label>
                                <div class="col-sm-10">
                                    <input checked="checked" type="radio" value="1"
                                           name="command">Increase
                                    <input type="radio" value="2" name="command"/> Decrease
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Top Color</label>
                                <div class="col-sm-10">
                                    <input name="col" class="form-control" type="number" placeholder="0"
                                           id="example-email-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Top Black</label>
                                <div class="col-sm-10">
                                    <input name="blk" class="form-control" type="number" placeholder="0"
                                           id="example-email-input">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Account Type</label>
                                <div class="col-sm-10">
                                    <select name="typ" class="form-control" id="example-email-input">
                                        <option value="<? echo $search['utype']; ?>">
                                            <? if ($search['utype'] === "B") echo "Black"; ?>
                                            <? if ($search['utype'] === "C") echo "Color"; ?>
                                            <? if ($search['utype'] === "BC") echo "Black & Color"; ?>
                                        </option>
                                        <option value="B">Back</option>
                                        <option value="C">Color</option>
                                        <option value="BC">Black & Color</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="example-email-input" class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <input class="btn btn-primary" type="submit" value="Top Up">
                                </div>
                            </div>
                        </form>
                        <?
                    }
                    ?>
                </div>
            </div>

        </div>

    </div>
    <!-- END ROW -->

</div>
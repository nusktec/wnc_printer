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
                <h3>Work And Connect Printing Service. <img class="d-none"
                                                            src="<? echo base_url() ?>assets/images/wnc.jpg" width="50">
                </h3>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <form class="form-horizontal m-t-30" action="" onsubmit="return false;">

                        <div class="form-group">
                            <div class="col-12">
                                <label>Names</label>
                                <input value="<? echo $user['uname']; ?> (<? echo $user['upac']; ?>)" readonly="readonly" class="form-control"
                                       type="text" required=""
                                       placeholder="Names">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <label>Email</label>
                                <input value="<? echo $user['uemail']; ?>" readonly="readonly" class="form-control"
                                       type="text" required=""
                                       placeholder="Email">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <label>Phone No.</label>
                                <input value="<? echo $user['uphone']; ?>" readonly="readonly" class="form-control"
                                       type="text" required=""
                                       placeholder="Phone">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <label>Printing Resources</label>
                                <input value="<? echo "Color: " . $user['ucolor'] . ", Black: " . $user['ublack'] . ", Type: " . $user['utype']; ?>"
                                       readonly="readonly"
                                       class="form-control"
                                       type="text" required=""
                                       placeholder="0">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-12">
                                <label>PAC Validity</label>
                                <input value="<? echo (31 - (int)dateDiffTs($user['uusage'], getTimeStamp())) . " day(s) remaining"; ?>"
                                       readonly="readonly"
                                       class="form-control"
                                       type="text" required=""
                                       placeholder="0">
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-12">
                                <a class="btn btn-danger" href="<? echo base_url('logout') ?>">Logout</a>
                                |
                                <a class="btn btn-secondary" href="<? echo base_url('printing/history') ?>">View
                                    History</a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-6 col-md-12 col-sm-12">

                    <form class="form-horizontal m-t-30" action="<? echo base_url("printing"); ?>" method="post"
                          enctype="multipart/form-data">

                        <div class="form-group">
                            <div class="col-12">
                                <label>No. Of Copies (Charges may applied)</label>
                                <input name="noc" class="form-control" type="number" value="1" required=""
                                       placeholder="No. Copies">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <label>Printing Type</label>
                                <br/>
                                <select name="ptype">
                                    <? if($user['utype']==="B"){?><option value="B">Black Only</option><?} ?>
                                    <? if($user['utype']==="C"){?><option value="C">Color Only</option><?} ?>
                                    <? if($user['utype']==="BC"){?><option value="B">Black Only</option><option value="C">Color Only</option><?} ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <label>Additional Info</label>
                                <input name="pdesc" class="form-control" type="text" required=""
                                       placeholder="Describe how you want it printed ?">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <label>Printing File (30Mb Max)</label>
                                <input accept=".png,.jpg,.doc,.docx,.pdf,.csv" name="pfile" class="form-control"
                                       type="file"
                                       required="">
                            </div>
                        </div>

                        <div class="form-group text-center m-t-20">
                            <div class="col-12">
                                <?
                                if (isset($error)) {
                                    ?>
                                    <div class="alert" role="alert">
                                        <? echo $error; ?>
                                    </div>
                                    <?
                                }
                                ?>
                                <button class="btn btn-primary btn-block btn-lg waves-effect waves-light"
                                        type="submit">
                                    Print Now
                                </button>
                            </div>
                        </div>
                        <input type="hidden" name="action" value="addprint"/>
                        <input type="hidden" name="pupac" value="<? echo $user['upac'] ?>"/>
                        <input type="hidden" name="formtoken" value="<? echo getFormToken(); ?>"/>
                    </form>
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
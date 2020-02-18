<!DOCTYPE html>
<html lang="en">
<!--Header-->
<? include 'common/header_style.php'; ?>
<body>

<!-- Begin page -->
<!--<div class="error-bg"></div>-->

<div class="account-pages">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8">
                <div class="card shadow-lg" style="border-radius: 5px 5px 20px 20px; overflow: hidden">
                    <div class="card-block">
                        <div class="text-center p-3 overflow-hidden">
                            <img src="<? echo base_url() ?>assets/images/wnc.jpg" width="100" class="m-3"/>
                            <h4 class="mb-4 mt-1">Printing Service</h4>
                            <p class="mb-4">Provide your printing access code</p>
                            <form method="post" action="<? echo base_url(); ?>">
                                <div class="form-group">
                                    <div class="col-12">
                                        <label>PAC No.</label>
                                        <input name="pac" class="form-control" type="text" required="required"
                                               placeholder="PAC No.">
                                        <input name="formtoken" value="<? echo getFormToken(); ?>" type="hidden">
                                    </div>
                                </div>
                                <?
                                if (isset($error)) {
                                    ?>
                                    <div class="alert" role="alert" style="text-align: center">
                                        <? echo $error; ?>
                                    </div>
                                    <?
                                }
                                ?>
                                <button type="submit" class="btn btn-primary mb-4 waves-effect waves-light btn-danger"
                                        href="#"><i
                                            class="mdi mdi-printer"></i> Proceed
                                </button>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- end row -->
    </div>
</div>
<!-- END wrapper -->
<p style="position: absolute; bottom: 10px; width: 100%; text-align: center">RSC BYTE CODE</p>
<!-- jQuery  -->
<? include 'common/footer_script.php'; ?>
</body>

</html>
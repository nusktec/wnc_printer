<!DOCTYPE html>
<html lang="en">
<!--Header-->
<? include 'common/header_style.php'; ?>
<body>

<div class="account-pages">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8">
                <div class="card shadow-lg" style="border-radius: 5px 5px 20px 20px; overflow: hidden">
                    <div class="card-block">
                        <?
                        if (isset($error)) {
                            ?>
                            <div class="alert-danger alert text-center" role="alert">
                                <? echo $error; ?>
                            </div>
                            <?
                        }
                        ?>
                        <form method="post" class="form-horizontal m-t-30" action="<? base_url(); ?>">

                            <div class="form-group">
                                <div class="col-12">
                                    <h3>Restricted Area</h3>
                                    <label>Email Address</label>
                                    <input name="email" class="form-control" type="email" required=""
                                           placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-12">
                                    <label>Password</label>
                                    <input name="password" class="form-control" type="password" required=""
                                           placeholder="Password">
                                </div>
                            </div>

                            <div class="form-group text-center m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-danger btn-block waves-effect waves-light"
                                            type="submit">Log In
                                    </button>
                                </div>
                            </div>
                        </form>

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
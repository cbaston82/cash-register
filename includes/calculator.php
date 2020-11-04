<?php

require('functions.php');

$owe = $_POST['owe'] ?? NULL;
$paying = $_POST['paying'] ?? NULL;
$form_submitted = $_POST['submit'] ?? false;
$res = ($owe && $paying) && ($paying <=$owe) ? change($owe, $paying) : NULL;
?>

<div class="container">
    <div class="row h-100">
        <div class="col-sm-6 mx-auto my-auto">
            <div class="card">
                <div class="card-header text-center">
                    <strong>Cash Register Code Challenge</strong>
                </div>
                <div class="card-body">

                    <?php if($res === NULL && $form_submitted) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Holy guacamole!</strong> There was an error.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>

                    <form action="/" method="POST">
                        <div class="row">
                            <div class="col-6">
                                <input
                                    placeholder="Enter total money owed"
                                    name="owe"
                                    id="owe"
                                    value="<?php echo $owe ?>"
                                    class="form-control"
                                    onkeypress="return isNumberKey(event)"
                                    type="text">
                            </div>
                            <div class="col-6">
                                <input
                                    placeholder="Enter total money paying"
                                    name="paying"
                                    id="paying"
                                    value="<?php echo $paying ?>"
                                    class="form-control"
                                    onkeypress="return isNumberKey(event)"
                                    type="text">
                            </div>
                            <div class="col-12 mt-3">
                                <button
                                    type="submit"
                                    name="submit"
                                    class="btn btn-lg btn-primary form-control"
                                    value="value">Pay</button>
                            </div>
                        </div>
                    </form>
                </div>

                <?php if($form_submitted && $res !== NULL) : ?>
                    <div class="card-footer">
                            <p class="text-center">
                                Your change: <?php printf('<strong class="text-success">$%0.2f</strong>', $owe - $paying, $n); ; ?>
                            </p>
                            <hr>
                        <div class="row">

                            <?php if($res) : ?>
                                <?php foreach ($res as $dollar => $amount) : ?>
                                    <div class="col-3 text-center">
                                        <?php printf('$%0.2f <span class="badge badge-secondary">%d</span>', $dollar/100, $amount); ?>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</div>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="row">

    <div id="register_form_error" class="alert alert-danger"><!--Dynamic--></div>
    <form class="form-horizontal" id="register_form" method="post" action="<?= site_url('api/register') ?>">
        <div class="form-group">
            <label class="control-label col-sm-2" for="login">Login:</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="login" id="login" placeholder="Enter username">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-xs-3">
                <input type="text" class="form-control" name="email" id="email" placeholder="Enter email">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Password:</label>
            <div class="col-xs-3">
                <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="cpwd">Confirm Password:</label>
            <div class="col-xs-3">
                <input type="password" class="form-control" name="confirm_password" id="cpwd"
                       placeholder="Re-enter password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2">
                <input type="submit" id="login" value="Register"/>
                <a style="margin-left: 10px"href="<?= site_url('/') ?>">Back</a>

            </div>

        </div>

    </form>

</div>

<script>
    $(function () {
        $("#register_form_error").hide();

        $("#register_form").submit(function (evt) {
            evt.preventDefault();
            var url = $(this).attr('action');
            var postData = $(this).serialize();


            $.post(url, postData, function (o) {
                if(o.result == 1){
                    window.location.href = '<?=site_url('dashboard')?>';
                }else{
                    $("#register_form_error").show();
                    var output ='<ul>';    //here we're trying to loop through an object hence use key
                    for(var key in o.error){
                        var value = o.error[key];
                        output += '<li>' + key + ': ' + value + '</li>';
                    }
                    output += '</ul>';
                    $("#register_form_error").html(output);
                }
            }, 'json');

        });
    });
</script>
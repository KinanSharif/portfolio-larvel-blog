<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="row">
<form class="form-horizontal" id="login_form" method="post" action="<?=site_url('api/login')?>">
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-xs-3">
            <input type="text" class="form-control" name="login" id="email" placeholder="Enter email">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Password:</label>
        <div class="col-xs-3">
            <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password">
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2">
            <input type="submit" id="login" value="Login"/>
            <a href="<?=site_url('home/register')?>">Register</a>
        </div>

    </div>

</form>

</div>

<script>
    $(function () {


        $("#login_form").submit(function (evt) {
            evt.preventDefault();
            var url = $(this).attr('action');
            var postData = $(this).serialize();
            console.log(url);
            console.log(postData);
            $.post(url, postData, function (o) {
                if(o.result == 1){
                    window.location.href = '<?=site_url('dashboard')?>';
                }else{
                    alert('invalid login');
                }
            }, 'json');

        });
    });
    </script>
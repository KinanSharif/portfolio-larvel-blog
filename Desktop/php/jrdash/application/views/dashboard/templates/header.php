<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>test</title>
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">

    <script src="<?= base_url() ?>/assets/js/jquery.js"></script>
    <script src="<?= base_url() ?>/assets/js/bootstrap.js"></script>
    <script src="<?= base_url() ?>assets/js/jrdash/dashboard/result.js"></script>
    <script src="<?= base_url() ?>assets/js/jrdash/dashboard/event.js"></script>
    <script src="<?= base_url() ?>assets/js/jrdash/dashboard/template.js"></script>
    <script src="<?= base_url() ?>assets/js/jrdash/dashboard.js"></script>

    <script>
        $(function() {
            //init the Dashboard Application
            var dashboard = new Dashboard();
            console.log('hello');
        });
    </script>

</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">jrDash</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Dashboard</a></li>
            <li><a href="#">User</a></li>
            <li><a href="#">Page 2</a></li>
            <li><a href="<?= base_url('dashboard/logout');?>">Logout</a></li>
        </ul>
    </div>
</nav>

<div class="container">

    <div id="success" class="alert alert-success alert-dismissable fade in hide">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

    </div>

    <div id="error" class="alert alert-danger alert-dismissable fade in hide">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong></strong>
    </div>





<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Phone Book</title>
    <link rel="stylesheet" href="<?php echo base_url("assets/bootstrap/css/bootstrap.css"); ?>" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/dataTables.editor.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/buttons.dataTables.min.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/select.dataTables.min.css"); ?>" />

</head>
<body>

<!-- Wrap all page content here -->
<div id="wrap">

    <!-- Fixed navbar -->
    <div id="mast" class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <span class="h1"><a class="navbar-brand" href="<?php echo base_url(); ?>">Phone Book</a></span>
            </div>

            <div class="collapse navbar-collapse">
                    <?php if ($identity) : ?>
                        <ul class="nav navbar-nav pull-right">
                            <li><a href="<?php echo base_url('auth/logout'); ?>">Logout <i class="fa fa-sign-out"></i></a></li>
                        </ul>
                    <?php endif; ?>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <!-- Begin page content -->
    <div id="main-container" class="container">
        <div class="page-header">

        </div>
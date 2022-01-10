
<?php if(!isset($_SESSION['admin_id']) && !isset($_SESSION['admin_status'])){
    $this->session->set_flashdata('err','Zəhmət olmasa istifadəçi adı və şifrə daxil edin!');
    redirect(base_url('admin_login'));
    exit();
} ?>

<?php
//$adminId = $this->db->where('a_id',$_SESSION['admin_id'])->get('admin')->row_array();
//
//if($_SESSION['admin_id'] != $adminId['a_id']){
//    $this->session->set_flashdata('error','İcazəniz dəyişdirilib.');
//    redirect(base_url('admin_login'));
//    exit();
//}
// ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Analytics Dashboard - This is an example dashboard created using build-in elements and components.</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">

<link href="<?php echo base_url('assets/admin/') ?>main.css" rel="stylesheet"></head>
<link href="<?php echo base_url('assets/admin/') ?>switchButtonDesign.css" rel="stylesheet"></head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
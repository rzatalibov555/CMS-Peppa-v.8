<?php $this->load->view('admin/includes/headerStyle') ?>
<?php $this->load->view('admin/includes/leftMenu') ?>
<?php $this->load->view('admin/includes/navbar') ?>
<?php $this->load->view('admin/includes/pageName') ?>
                        
                        <div class="row">
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Total Orders Istifadeci 
                                                    <?php echo $_SESSION['admin_id']; ?> </div>
                                                <div class="widget-subheading">Last year expenses statusu
                                                    <?php echo $_SESSION['admin_status']; ?> </div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-success">1896</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Products Sold</div>
                                                <div class="widget-subheading">Revenue streams</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-warning">$3M</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Followers</div>
                                                <div class="widget-subheading">People Interested</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-danger">45,9%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-xl-none d-lg-block col-md-6 col-xl-4">
                                <div class="card mb-3 widget-content">
                                    <div class="widget-content-outer">
                                        <div class="widget-content-wrapper">
                                            <div class="widget-content-left">
                                                <div class="widget-heading">Income</div>
                                                <div class="widget-subheading">Expected totals</div>
                                            </div>
                                            <div class="widget-content-right">
                                                <div class="widget-numbers text-focus">$147</div>
                                            </div>
                                        </div>
                                        <div class="widget-progress-wrapper">
                                            <div class="progress-bar-sm progress-bar-animated-alt progress">
                                                <div class="progress-bar bg-info" role="progressbar" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100" style="width: 54%;"></div>
                                            </div>
                                            <div class="progress-sub-label">
                                                <div class="sub-label-left">Expenses</div>
                                                <div class="sub-label-right">100%</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if($this->session->flashdata('success')) { ?>
                            <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $this->session->flashdata('success') ; ?>
                            </div>
                        <?php } ?>
                        <?php if($this->session->flashdata('err')) { ?>
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <?php echo $this->session->flashdata('err') ; ?>
                            </div>
                        <?php } ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-header">Admin List
                                        <div class="btn-actions-pane-right">
                                            <div role="group" class="btn-group-sm btn-group">
                                                <a href="<?php echo base_url('admin_creatAdmin'); ?>">
                                                    <button class="btn btn-success">Creat</button>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="align-middle mb-0 table table-borderless table-striped table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Category</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php $say = 1; foreach ($admin_list as $admin_list_key){ ?>

                                                <tr>
                                                    <td class="text-center text-muted"><?php echo $say++; ?></td>
                                                    <td>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-3">
                                                                    <div class="widget-content-left">
                                                                        <?php if($admin_list_key['a_img']){ ?>
                                                                            <img width="40" height="40" style="object-fit: cover;" class="rounded-circle" src="<?php echo base_url('upload/admin/'.$admin_list_key['a_img']); ?>" alt="">
                                                                        <?php }else{ ?>
                                                                            <img width="40" height="40" style="object-fit: cover;" class="rounded-circle" src="<?php echo base_url('assets/admin/assets/images/no-image-available.jpg'); ?>" alt="">
                                                                        <?php } ?>


                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading"><?php echo $admin_list_key['a_name']; ?></div>
                                                                    <div class="widget-subheading opacity-7"><?php echo $admin_list_key['a_username']; ?></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?php echo $admin_list_key['a_email']; ?></td>
                                                    <td>
                                                        <?php if($admin_list_key['a_c_id'] == '1'){ ?>
                                                            <div class="badge badge-success  btn-sm"><?php echo $admin_list_key['a_c_value']; ?></div>
                                                        <?php }else if ($admin_list_key['a_c_id'] == '2'){ ?>
                                                            <div class="badge badge-info  btn-sm"><?php echo $admin_list_key['a_c_value']; ?></div>
                                                        <?php }else{ ?>
                                                            <div class="badge badge-warning  btn-sm"><?php echo $admin_list_key['a_c_value']; ?></div>
                                                        <?php } ?>

                                                    </td>

                                                    <td>
                                                        <?php if($admin_list_key['s_value'] == "Active"){ ?>
                                                            <div class="badge badge-success"><?php echo $admin_list_key['s_value']; ?></div>
                                                        <?php }elseif ($admin_list_key['s_value'] == "Deactive"){ ?>
                                                            <div class="badge badge-danger"><?php echo $admin_list_key['s_value']; ?></div>
                                                        <?php }elseif ($admin_list_key['s_value'] == "Pending"){ ?>
                                                            <div class="badge badge-warning"><?php echo $admin_list_key['s_value']; ?></div>
                                                        <?php }else{
                                                            echo '-';
                                                        }?>

                                                    </td>
                                                    <td>
<!--                                                        <button type="button" id="PopoverCustomT-1" class="btn btn-primary btn-sm">Details</button>-->
                                                        <a style="text-decoration: none;" href="<?php echo base_url('admin_updateAdmin/'.$admin_list_key['a_id']) ?>">
                                                            <button class="btn-wide btn mr-2 btn-outline-success  btn-sm">Edit</button>
                                                        </a>

                                                        <?php if ($admin_list_key['a_id'] != $_SESSION['admin_id']){ ?>
                                                            <a onclick="return confirm('Məlumatı silmək istədiyinizə əminsiniz?')" href="<?php echo base_url('admin_delete_admin/'.$admin_list_key['a_id']); ?>">
                                                                <button class="mr-2 btn-icon btn-icon-only btn btn-outline-danger btn-sm"><i class="pe-7s-trash btn-icon-wrapper"> </i></button>
                                                            </a>
                                                        <?php } ?>

                                                    </td>
                                                </tr>

                                            <?php } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="d-block text-center card-footer">

                                    </div>
                                </div>
                            </div>
                        </div>
                         
                    </div>
                    
                <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
<script type="text/javascript" src="<?php echo base_url('assets/admin/') ?>assets/scripts/main.js"></script></body>
</html>

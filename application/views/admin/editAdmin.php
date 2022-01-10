<?php $this->load->view('admin/includes/headerStyle'); ?>

<?php $this->load->view('admin/includes/leftMenu'); ?>

<?php $this->load->view('admin/includes/navbar'); ?>

<?php $this->load->view('admin/includes/pageName'); ?>

<style>
    .p20{
        padding: 20px;
    }

    .noBlock{
        float: left;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header">Admin Edit
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">
<!--                        <a href="--><?php //echo base_url(''); ?><!--">-->
<!--                            <button class="btn btn-info">Back</button>-->
<!--                        </a>-->
                    </div>
                </div>
            </div>
            <div class="p20">
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

                <form action="<?php echo base_url('admin_updateAdminAct/'.$admin_info['a_id']); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash();?>" />
                    <label for="name">Name, Surname</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="John Doe" value="<?php echo $admin_info['a_name']; ?>">
                    <br>

                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="username" value="<?php echo $admin_info['a_username']; ?>">
                    <br>

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="email" value="<?php echo $admin_info['a_email']; ?>">
                    <br>
                    <?php $adminInformation = $this->db->select('a_id,a_name,a_username,a_img,a_status,a_category')->where('a_id',$_SESSION['admin_id'])->get('admin')->row_array(); ?>
                    <?php if($adminInformation['a_category'] == '1'){ ?>
                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 noBlock" style="padding: 0px;">

                            <label for="cate">CATEGORY</label>
                            <select id="cate" class="form-control"name="category">
                                <option value="">-SELECT-</option>

                                <?php foreach ($admin_category as $item) { ?>
                                    <option <?php if($item['a_c_id'] == $admin_info['a_category']){ echo "SELECTED"; } ?> value="<?php echo $item['a_c_id']; ?>"><?php echo $item['a_c_value']; ?></option>
                                <?php } ?>

                            </select>

                        </div>

                        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 noBlock">

                            <label for="status">STATUS</label>
                            <select id="status" class="form-control"name="status">
                                <option value="">-SELECT-</option>

                                <?php foreach ($admin_status as $item) { ?>
                                    <option <?php if($item['s_id'] == $admin_info['a_status']){ echo "SELECTED"; } ?> value="<?php echo $item['s_id']; ?>"><?php echo $item['s_value']; ?></option>
                                <?php } ?>
                            </select>

                        </div>
                    <?php } ?>


                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 noBlock">

                        <label for="img">IMG <br>
                            <img width="50px" src="<?php echo base_url('assets/admin/assets/images/files-a.jpg') ?>">
                        </label>
                        <input hidden type="file" name="user_file" id="img" class="form-control">
                        <?php if($admin_info['a_img']){ ?>
                            <img width="50px" height="40px" style="object-fit: cover;" src="<?php echo base_url('upload/admin/'.$admin_info['a_img']); ?>" alt="">
                            <a onclick="return confirm('Məlumatı silmək istədiyinizə əminsiniz?')" href="<?php echo base_url('admin_removeAdminIMg/'.$admin_info['a_id']); ?>">
                                <button type="button" class="btn btn-outline-danger">Mövcud şəkili sil</button>
                            </a>
                        <?php }else{
                            echo "";
//                            echo "<span style='color: red'><b>No selected profile img</b></span>";
                        } ?>

                    </div>
                    <br>
                    <br>
                    <br>

                    <button type="submit" class="btn btn-outline-info btn-block" style="margin-top: 23px; height: 40px;">UPDATE</button>
                    <br>
                    <hr>
                    <a href="<?php echo base_url('admin_change_password/'.$admin_info['a_id']); ?>">
                        <span style='color: red'><b>Şifrəni yenilə</b></span>
                    </a>



                </form>

            </div>

        </div>
    </div>
</div>
</div>
</div>
</div>
<?php $this->load->view('admin/includes/footerStyle') ; ?>

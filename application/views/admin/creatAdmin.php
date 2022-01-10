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
            <div class="card-header">Admin Create
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">
                        <a href="<?php echo base_url('admin_dashboard'); ?>">
                            <button class="btn btn-info">Back</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="p20">


                <?php if($this->session->flashdata('err')){ ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('err'); ?>
                    </div>
                <?php } ?>




                <form action="<?php echo base_url('admin_creatAdminAct'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash();?>" />
                    <label for="name">Name, Surname</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="John Doe">
                    <br>

                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" placeholder="username">
                    <br>

                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="********">
                    <br>

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="email">
                    <br>

                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 noBlock" style="padding: 0px;">

                        <label for="cate">CATEGORY</label>
                        <select id="cate" class="form-control"name="category">
                            <option value="">-SELECT-</option>
                            
                            <?php foreach ($admin_category as $item) { ?>
                                <option value="<?php echo $item['a_c_id']; ?>"><?php echo $item['a_c_value']; ?></option>
                            <?php } ?>
                            
                        </select>

                    </div>

                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 noBlock">

                            <label for="status">STATUS</label>
                            <select id="status" class="form-control"name="status">
                                <option value="">-SELECT-</option>

                                <?php foreach ($admin_status as $item) { ?>
                                    <option value="<?php echo $item['s_id']; ?>"><?php echo $item['s_value']; ?></option>
                                <?php } ?>
                            </select>

                    </div>

                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 noBlock">

                        <label for="img">IMG <br>
                            <img width="50px" src="<?php echo base_url('assets/admin/assets/images/files-a.jpg') ?>">
                        </label>
                        <input hidden type="file" name="user_file" id="img" class="form-control">

                    </div>

                    <br>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-outline-info btn-block" style="margin-top: 23px; height: 40px;">SEND</button>



                </form>

            </div>

        </div>
    </div>
</div>
</div>
</div>
</div>
<?php $this->load->view('admin/includes/footerStyle') ; ?>

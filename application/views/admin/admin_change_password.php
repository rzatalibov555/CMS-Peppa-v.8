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
                        <a href="<?php echo base_url('admin_updateAdmin/'.$admin_info['a_id']); ?>">
                            <button class="btn btn-info">Back</button>
                        </a>
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

                <form action="<?php echo base_url('admin_change_passwordAct/'.$admin_info['a_id']); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash();?>" />


                    <label for="c_password">Mövcud şifrə</label>
                    <a href="<?php echo base_url('admin_change_password_reset/'.$admin_info['a_id']); ?>">
                        <span style='color: red'><b>&nbsp; &nbsp; Unutmuşam &nbsp; &nbsp;</b></span>
                    </a>
                    <input type="password" name="current_password" id="c_password" class="form-control" placeholder="********">
                    <br>

                    <label for="password">Yeni şifrə</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="********">
                    <br>

                    <label for="r_password">Yeni şifrənin təkrarı</label>
                    <input type="password" name="r_password" id="r_password" class="form-control" placeholder="********">
                    <br>

                    <button type="submit" class="btn btn-outline-info btn-block" style="margin-top: 23px; height: 40px;">UPDATE</button>



                </form>

            </div>

        </div>
    </div>
</div>
</div>
</div>
</div>
<?php $this->load->view('admin/includes/footerStyle') ; ?>

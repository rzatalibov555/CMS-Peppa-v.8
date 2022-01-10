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
<style>
    ul.tabs{
        margin: 0px;
        padding: 0px;
        list-style: none;
    }
    ul.tabs li{
        background: none;
        color: #222;
        display: inline-block;
        /*padding: 10px 15px;*/
        padding: 5px 10px;
        cursor: pointer;
    }

    ul.tabs li.current{
        /*background: #ededed;*/
        /*color: #222;*/
        background: #16aaff;
        color: white!important;
        border-radius: 5px;
    }

    .tab-content{
        display: none;
        /*background: #ededed;*/
        padding: 15px 0px;
    }

    .tab-content.current{
        display: inherit;
    }

    .tab-link{
        border: 2px solid #16aaff;
        border-radius: 5px;
        color: #16aaff!important;
    }

    .form_error_style{
        color: #FF5B5B;
        font-size: 12px;
        font-weight:bold;
    }
</style>

<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-header"><?php echo "<b>".$single_item->title."</b>"." Item Edit"; ?>
                <div class="btn-actions-pane-right">
                    <div role="group" class="btn-group-sm btn-group">
                        <a href="<?php echo base_url('admin_item_list'); ?>">
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

                <form action="<?php echo base_url('admin_updateItemAct/'.$single_item->id); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash();?>" />

                    <ul class="tabs">
                        <li class="tab-link current" data-tab="aze">Az</li>
                        <li class="tab-link" data-tab="eng">En</li>
                        <li class="tab-link" data-tab="rus">Ru</li>
                        <li class="tab-link" data-tab="tur">Tr</li>
                    </ul>
                    <br>

                    <div id="aze" class="tab-content current">
                        <label for="taze">TITLE AZ</label>
                        <input type="text" name="title_az" id="taze" class="form-control" placeholder="Enter title" value="<?php echo $single_item->title ; ?>">
                        <!-- form validation start display show -->
                        <?php if(isset($form_error)){ ?>
                            <small class="form_error_style"><?php echo form_error("title_az"); ?></small>
                        <?php } ?>
                        <!-- form validation end display show -->
                        <br>

                        <label for="daze">DESCRIPTION AZ</label>
                        <textarea name="descr_az" rows="10" cols="50" id="daze" class="form-control"><?php echo $single_item->description ; ?></textarea>
                        <!-- form validation start display show -->
                        <?php if(isset($form_error)){ ?>
                            <small class="form_error_style"><?php echo form_error("descr_az"); ?></small>
                        <?php } ?>
                        <!-- form validation end display show -->
                        <br>
                    </div>
                    <div id="eng" class="tab-content">
                        <label for="teng">TITLE EN</label>
                        <input type="text" name="title_en" id="teng" class="form-control" placeholder="Enter title" value="<?php echo $single_item->title_en ; ?>">
                        <!-- form validation start display show -->
                        <?php if(isset($form_error)){ ?>
                            <small class="form_error_style"><?php echo form_error("title_en"); ?></small>
                        <?php } ?>
                        <!-- form validation end display show -->
                        <br>

                        <label for="deng">DESCRIPTION EN</label>
                        <textarea name="descr_en" rows="10" cols="50" id="deng" class="form-control"><?php echo $single_item->description_en ; ?></textarea>
                        <!-- form validation start display show -->
                        <?php if(isset($form_error)){ ?>
                            <small class="form_error_style"><?php echo form_error("descr_en"); ?></small>
                        <?php } ?>
                        <!-- form validation end display show -->
                        <br>
                    </div>
                    <div id="rus" class="tab-content">
                        <label for="trus">TITLE RU</label>
                        <input type="text" name="title_ru" id="trus" class="form-control" placeholder="Enter title" value="<?php echo $single_item->title_ru ; ?>">
                        <!-- form validation start display show -->
                        <?php if(isset($form_error)){ ?>
                            <small class="form_error_style"><?php echo form_error("title_ru"); ?></small>
                        <?php } ?>
                        <!-- form validation end display show -->
                        <br>

                        <label for="drus">DESCRIPTION RU</label>
                        <textarea name="descr_ru" rows="10" cols="50" id="drus" class="form-control"><?php echo $single_item->description_ru ; ?></textarea>
                        <!-- form validation start display show -->
                        <?php if(isset($form_error)){ ?>
                            <small class="form_error_style"><?php echo form_error("descr_ru"); ?></small>
                        <?php } ?>
                        <!-- form validation end display show -->
                        <br>
                    </div>
                    <div id="tur" class="tab-content">
                        <label for="ttre">TITLE TR</label>
                        <input type="text" name="title_tr" id="ttre" class="form-control" placeholder="Enter title" value="<?php echo $single_item->title_tr ; ?>">
                        <!-- form validation start display show -->
                        <?php if(isset($form_error)){ ?>
                            <small class="form_error_style"><?php echo form_error("title_tr"); ?></small>
                        <?php } ?>
                        <!-- form validation end display show -->
                        <br>

                        <label for="dtur">DESCRIPTION TR</label>
                        <textarea name="descr_tr" rows="10" cols="50" id="dtur" class="form-control"><?php echo $single_item->description_tr ; ?></textarea>
                        <!-- form validation start display show -->
                        <?php if(isset($form_error)){ ?>
                            <small class="form_error_style"><?php echo form_error("descr_tr"); ?></small>
                        <?php } ?>
                        <!-- form validation end display show -->
                        <br>
                    </div>







                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 noBlock">
                        <div class="row">
                            <label for="date">DATE</label>
                            <input type="date" name="date" id="date" class="form-control" value="<?php echo $single_item->date ; ?>">
                            <!-- form validation start display show -->
                            <?php if(isset($form_error)){ ?>
                                <small class="form_error_style"><?php echo form_error("date"); ?></small>
                            <?php } ?>
                            <!-- form validation end display show -->
                        </div>
                    </div> 


                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 noBlock">
                        
                            <label for="cate">CATEGORY</label>
                            <select id="cate" class="form-control" name="category">
                                <option value="">-SELECT-</option>

                                <?php foreach ($get_all_item_category as $item){ ?>
                                    <option <?php if($single_item->category == $item->i_c_id){ echo "SELECTED"; } ?> value="<?php echo $item->i_c_id; ?>"><?php echo $item->i_c_name; ?></option>
                                <?php } ?>

                            </select>
                        <!-- form validation start display show -->
                        <?php if(isset($form_error)){ ?>
                            <small class="form_error_style"><?php echo form_error("category"); ?></small>
                        <?php } ?>
                        <!-- form validation end display show -->
                    </div> 
                        
                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 noBlock">
                        <div class="row">
                            <label for="status">STATUS</label>
                            <select id="status" class="form-control" name="status">
                                <option value="">-SELECT-</option>
                                <?php foreach ($get_all_item_status as $item){ ?>
                                    <option <?php if($single_item->status == $item->i_s_id){ echo "SELECTED"; } ?> value="<?php echo $item->i_s_id; ?>"><?php echo $item->i_s_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <!-- form validation start display show -->
                        <?php if(isset($form_error)){ ?>
                            <small class="form_error_style"><?php echo form_error("status"); ?></small>
                        <?php } ?>
                        <!-- form validation end display show -->
                    </div> 

                    <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 noBlock">
                        
                            <label for="img">IMG <br>
                                <img width="50px" src="https://www.iphonefaq.org/files/styles/large/public/files-a.jpg">
                            </label>
                            <input hidden type="file" name="user_file" id="img" class="form-control">
                            
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2 noBlock">
                        <div class="row">

                            <button type="submit" class="btn btn-info btn-block" style="margin-top: 23px; height: 40px;">SEND</button>
                        </div>
                    </div>


                </form>

            </div>

        </div>
    </div>
</div>
</div>
</div>
</div>
<?php $this->load->view('admin/includes/footerStyle') ; ?>

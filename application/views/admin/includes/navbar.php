
<?php
    $adminInfo = $this->db->select('a_id,a_name,a_username,a_img,a_status,a_category,a_c_value')->join('admincategory','admincategory.a_c_id = admin.a_category','left')->where('a_id',$_SESSION['admin_id'])->get('admin')->row_array();
?>


<div class="app-main">

        <div class="app-header header-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
<!--                        <div class="input-holder">-->
<!---->
<!--                            <input type="text" class="search-input" placeholder="Type to search">-->
<!--                            <button class="search-icon"><span></span></button>-->
<!--                        </div>-->
                        <button class="close"></button>
                    </div>
                    <ul class="header-menu nav">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <i style="color: #16aaff" class="nav-link-icon fa fa-database"> </i>
                                <span style="color: #16aaff" ><?php echo $adminInfo['a_c_value'] ?></span>
                            </a>
                        </li>
<!--                        <li class="btn-group nav-item">-->
<!--                            <a href="javascript:void(0);" class="nav-link">-->
<!--                                <i class="nav-link-icon fa fa-edit"></i>-->
<!--                                Projects-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="dropdown nav-item">-->
<!--                            <a href="javascript:void(0);" class="nav-link">-->
<!--                                <i class="nav-link-icon fa fa-cog"></i>-->
<!--                                Settings-->
<!--                            </a>-->
<!--                        </li>-->
                    </ul>
                </div>
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                            <?php if($adminInfo['a_img']){ ?>
                                                <img width="40" height="40" style="object-fit: cover;" class="rounded-circle" src="<?php echo base_url ('upload/admin/'.$adminInfo['a_img']); ?>" alt="profile_img">
                                            <?php }else{ ?>
                                                <img width="40" height="40" style="object-fit: cover;" class="rounded-circle" src="<?php echo base_url ('assets/admin/assets/images/no-image-available.jpg'); ?>" alt="profile_img">
                                            <?php } ?>

                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
                                            <a href="<?php echo base_url('admin_updateAdmin/'.$adminInfo['a_id']); ?>">
                                                <button type="button" tabindex="0" class="dropdown-item">User Account</button>
                                            </a>
<!--                                            <button type="button" tabindex="0" class="dropdown-item">Settings</button>-->
<!--                                            <h6 tabindex="-1" class="dropdown-header">Header</h6>-->
<!--                                            <button type="button" tabindex="0" class="dropdown-item">Actions</button>-->
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <a href="<?php echo base_url('admin_logout'); ?>">
                                                <button type="button" tabindex="0" class="dropdown-item">Logout</button>
                                            </a>

                                        </div>
                                    </div>
                                </div>
                                <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
                                    <div class="widget-content-left  ml-3 header-user-info">
                                        <div class="widget-heading">
                                            <?php echo $adminInfo['a_name']; ?>
                                        </div>

                                        <div class="widget-subheading">
                                            <?php echo $adminInfo['a_username']; ?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <div class="app-main__outer">
        <div class="app-main__inner">

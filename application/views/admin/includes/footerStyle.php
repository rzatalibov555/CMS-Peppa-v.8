
</div>
</div>
<script type="text/javascript" src="<?php echo base_url('assets/admin/') ?>assets/scripts/main.js"></script>
</body>
</html>


<script src="<?php echo base_url('assets/admin/ckeditor5/ckeditor.js') ?>"></script>
<script>
    ClassicEditor.create(document.getElementById('daze'))
    ClassicEditor.create(document.getElementById('deng'))
    ClassicEditor.create(document.getElementById('drus'))
    ClassicEditor.create(document.getElementById('dtur'))
</script>

<script>
    $(document).ready(function(){

        $('ul.tabs li').click(function(){
            var tab_id = $(this).attr('data-tab');

            $('ul.tabs li').removeClass('current');
            $('.tab-content').removeClass('current');

            $(this).addClass('current');
            $("#"+tab_id).addClass('current');
        })

    })
</script>


                            <!--SWEET ALERT 2 start-->
<script src="<?php echo base_url('assets/admin/assets/') ?>sweet_alert_2/sweet_alert_2.js"></script>
<script src="<?php echo base_url('assets/admin/assets/') ?>sweet_alert_2/custom_sweet_alert2.js"></script>
<!--<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>-->
<!--<script>-->
<!--    Swal.fire({-->
<!--        title: 'Error!',-->
<!--        text: 'Do you want to continue',-->
<!--        icon: 'error',-->
<!--        confirmButtonText: 'Cool'-->
<!--    })-->
<!--</script>-->
                            <!--SWEET ALERT 2 END-->
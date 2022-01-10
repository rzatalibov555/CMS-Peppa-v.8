<?php 

class AdminController extends CI_Controller{


	public function index(){
		$this->load->view('admin/loginPage');
	}

	public function loginAct(){
		
		$username = $this->input->post ('username');
		$password = $this->input->post ('password');

		if(!empty($username) && !empty($password)){

			$data = [
				'a_username' => $username,
				'a_password' => md5($password."seba"),
                'a_status' => '1',
			];
            $data = $this->security->xss_clean($data);

			$result = $this->db->where($data)->get('admin')->row_array();
			
			if($result){

				$_SESSION['admin_id']       = $result['a_id'];
				$_SESSION['admin_status']   = $result['a_status'];
				$_SESSION['admin_category'] = $result['a_category'];

				redirect(base_url('admin_item_list'));

			} else{
				$this->session->set_flashdata('err','Username ve ya password yanlisdir!');
				redirect(base_url('admin_login'));
			}

		} else{
			$this->session->set_flashdata('err','Bosluq buraxmayin!');
			redirect(base_url('admin_login'));
		}
	}

	public function logout(){

		unset(
			$_SESSION['admin_id'],
			$_SESSION['admin_status'],
            $_SESSION['admin_category'],
		);

		redirect(base_url('admin_login'));

	}


	public function dashboard(){
	    $data['admin_list'] = $this->db->order_by('a_id','DESC')
            ->join('status','status.s_id = admin.a_status','left')
            ->join('admincategory','admincategory.a_c_id = admin.a_category','left')
            ->get('admin')->result_array();
	    $this->load->view('admin/index',$data);
	}

	public function delete_admin($id){

	    $adminCount = $this->db->count_all('admin');

	    if($adminCount == 1){
            $this->session->set_flashdata('err', 'Diqqət! Sistemdə minimum 1 admin qalmalıdır!');
            redirect($_SERVER['HTTP_REFERER']);
        }else{

	        if($_SESSION['admin_id'] == $id){

                $this->session->set_flashdata('err', 'Diqqət! Özünüzü sistemdən silə bilməzsiniz!');
                redirect($_SERVER['HTTP_REFERER']);

            }else{
                $this->db->where('a_id', $id)->delete('admin');
                $this->session->set_flashdata('success', 'Təbriklər! Admin uğurla silindi!');
                redirect($_SERVER['HTTP_REFERER']);
            }

        }

    }

	public function creatAdmin(){
	    $data['admin_category'] = $this->db->get('admincategory')->result_array();
	    $data['admin_status'] = $this->db->get('status')->result_array();

        $this->load->view('admin/creatAdmin',$data);
    }

    public function creatAdminAct(){
	    $name       = $_POST['name'];
	    $username   = $_POST['username'];
	    $password   = $_POST['password'];
	    $category   = $_POST['category'];
	    $status     = $_POST['status'];
	    $email      = $_POST['email'];

	    if(!empty($name) && !empty($username) && !empty($password) && !empty($category) && !empty($status) && !empty($email)){

            $config['upload_path']          = './upload/admin/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
//            $config['max_size']             = 100;
//            $config['max_width']            = 1024;
//            $config['max_height']           = 768;

            $this->upload->initialize($config);

            if($this->upload->do_upload('user_file')) {
                $admin_img = $this->upload->data('file_name');


                $category = $this->db->where('a_c_id',$category)->get('admincategory')->row_array();
                if($category){

                    $status = $this->db->where('s_id',$status)->get('status')->row_array();
                    if($status){

                        $data = [
                            'a_name'        => $name,
                            'a_username'    => $username,
                            'a_password'    => md5($password."seba"),
                            'a_category'    => $category['a_c_id'],
                            'a_status'      => $status['s_id'],
                            'a_email'       => $email,
                            'a_img'         => $admin_img,
                            'a_creater_id'  => $_SESSION['admin_id'],
                            'a_creat_date'  => date("Y-m-d H:i:s"),
                        ];
                        $data = $this->security->xss_clean($data);

                        $this->db->insert('admin', $data);
                        $this->session->set_flashdata('success', 'Təbriklər! Admin uğurla əlavə olundu!');
                        redirect(base_url('admin_dashboard'));

                    }else{
                        $this->session->set_flashdata('err', 'Diqqət! Yalnış məlumat daxil edilib!');
                        redirect($_SERVER['HTTP_REFERER']);
                    }

                }else{
                    $this->session->set_flashdata('err', 'Diqqət! Yalnış məlumat daxil edilib!');
                    redirect($_SERVER['HTTP_REFERER']);
                }

            }else{

                $category = $this->db->where('a_c_id',$category)->get('admincategory')->row_array();
                if($category){

                    $status = $this->db->where('s_id',$status)->get('status')->row_array();
                    if($status){

                        $data = [
                            'a_name'        => $name,
                            'a_username'    => $username,
                            'a_password'    => md5($password."seba"),
                            'a_category'    => $category['a_c_id'],
                            'a_status'      => $status['s_id'],
                            'a_email'       => $email,
                            'a_creater_id'  => $_SESSION['admin_id'],
                            'a_creat_date'  => date("Y-m-d H:i:s"),
                        ];
                        $data = $this->security->xss_clean($data);

                        $this->db->insert('admin', $data);
                        $this->session->set_flashdata('success', 'Təbriklər! Admin uğurla əlavə olundu!');
                        redirect(base_url('admin_dashboard'));

                    }else{
                        $this->session->set_flashdata('err', 'Diqqət! Yalnış məlumat daxil edilib!');
                        redirect($_SERVER['HTTP_REFERER']);
                    }

                }else{
                    $this->session->set_flashdata('err', 'Diqqət! Yalnış məlumat daxil edilib!');
                    redirect($_SERVER['HTTP_REFERER']);
                }

            }

        }else{
            $this->session->set_flashdata('err', 'Diqqət! Boşluq buraxmayın!');
            redirect($_SERVER['HTTP_REFERER']);
        }


    }

    public function updateAdmin($id){
        $data['admin_category'] = $this->db->get('admincategory')->result_array();
        $data['admin_status'] = $this->db->get('status')->result_array();
        $data['admin_info'] = $this->db->where('a_id',$id)->get('admin')->row_array();

        $this->load->view('admin/editAdmin',$data);
    }

    public function updateAdminAct($id){

        $name       = $_POST['name'];
        $username   = $_POST['username'];
        $category   = $_POST['category'];
        $status     = $_POST['status'];
        $email      = $_POST['email'];

        if(!empty($name) && !empty($username) && !empty($email)){

                $config['upload_path'] = './upload/admin/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
//            $config['max_size']             = 100;
//            $config['max_width']            = 1024;
//            $config['max_height']           = 768;

                $this->upload->initialize($config);

                if ($this->upload->do_upload('user_file')) {
                    $admin_img = $this->upload->data('file_name');

                    $admin_cate_result = $this->db->select('a_id,a_category,a_status')->where('a_id',$_SESSION['admin_id'])->get('admin')->row_array();

                    if ($admin_cate_result['a_category'] == '1') {
                        if (empty($category) && empty($status)) {
                            $this->session->set_flashdata('err', 'Diqqət! Boşluq buraxmayın!');
                            redirect($_SERVER['HTTP_REFERER']);
                        } else {
                            $category = $this->db->where('a_c_id', $category)->get('admincategory')->row_array();
                            if ($category) {

                                $status = $this->db->where('s_id', $status)->get('status')->row_array();
                                if ($status) {



                                    if($category['a_c_id'] == '1'){

                                        $data = [
                                            'a_name' => $name,
                                            'a_username' => $username,
                                            'a_category' => $category['a_c_id'],
                                            'a_status' => $status['s_id'],
                                            'a_email' => $email,
                                            'a_img' => $admin_img,
                                            'a_updater_id' => $_SESSION['admin_id'],
                                            'a_update_date' => date("Y-m-d H:i:s"),
                                        ];
                                        $data = $this->security->xss_clean($data);

                                        $this->db->where('a_id', $id)->update('admin', $data);
                                        $this->session->set_flashdata('success', 'Təbriklər! Admin məlumatı uğurla yeniləndi!');
                                        redirect(base_url('admin_dashboard'));

                                    }else{
                                        $adminCateCount = $this->db->where(['a_category' => '1'])->count_all_results("admin");

                                        if($adminCateCount == '1') {
                                            $this->session->set_flashdata('err', 'Diqqət! Sonuncu adminin kateqoriyasını dəyişmək təhlükəsizlik baxımından mümkün deyil! Adminliyinizi başqasına verə bilərsiniz.');
                                            redirect($_SERVER['HTTP_REFERER']);
                                        }else{

                                            $data = [
                                                'a_name' => $name,
                                                'a_username' => $username,
                                                'a_category' => $category['a_c_id'],
                                                'a_status' => $status['s_id'],
                                                'a_email' => $email,
                                                'a_img' => $admin_img,
                                                'a_updater_id' => $_SESSION['admin_id'],
                                                'a_update_date' => date("Y-m-d H:i:s"),
                                            ];
                                            $data = $this->security->xss_clean($data);

                                            $this->db->where('a_id', $id)->update('admin', $data);
                                            $this->session->set_flashdata('success', 'Təbriklər! Admin məlumatı uğurla yeniləndi!');
                                            redirect(base_url('admin_dashboard'));
                                        }
                                    }



                                } else {
                                    $this->session->set_flashdata('err', 'Diqqət! Yalnış məlumat daxil edilib!');
                                    redirect($_SERVER['HTTP_REFERER']);
                                }

                            } else {
                                $this->session->set_flashdata('err', 'Diqqət! Yalnış məlumat daxil edilib!');
                                redirect($_SERVER['HTTP_REFERER']);
                            }
                        }

                    } else {

                        $data = [
                            'a_name' => $name,
                            'a_username' => $username,
//                        'a_category'    => $category['a_c_id'],
//                        'a_status'      => $status['s_id'],
                            'a_email' => $email,
                            'a_img' => $admin_img,
                            'a_updater_id' => $_SESSION['admin_id'],
                            'a_update_date' => date("Y-m-d H:i:s"),
                        ];
                        $data = $this->security->xss_clean($data);

                        $this->db->where('a_id', $id)->update('admin', $data);
                        $this->session->set_flashdata('success', 'Təbriklər! Admin məlumatı uğurla yeniləndi!');
                        redirect(base_url('admin_dashboard'));
                    }


                } else {
                    $admin_cate_result = $this->db->select('a_id,a_category,a_status')->where('a_id',$_SESSION['admin_id'])->get('admin')->row_array();
                    if ($admin_cate_result['a_category'] == '1') {
                        if (empty($category) && empty($status)) {
                            $this->session->set_flashdata('err', 'Diqqət! Boşluq buraxmayın!');
                            redirect($_SERVER['HTTP_REFERER']);
                        } else {
                            $category = $this->db->where('a_c_id', $category)->get('admincategory')->row_array();
                            if ($category) {

                                $status = $this->db->where('s_id', $status)->get('status')->row_array();
                                if ($status) {

                                    if($category['a_c_id'] == '1'){
                                        $data = [
                                            'a_name' => $name,
                                            'a_username' => $username,
                                            'a_category' => $category['a_c_id'],
                                            'a_status' => $status['s_id'],
                                            'a_email' => $email,
//                                      'a_img'         => $admin_img,
                                            'a_updater_id' => $_SESSION['admin_id'],
                                            'a_update_date' => date("Y-m-d H:i:s"),
                                        ];
                                        $data = $this->security->xss_clean($data);

                                        $this->db->where('a_id', $id)->update('admin', $data);
                                        $this->session->set_flashdata('success', 'Təbriklər! Admin məlumatı uğurla yeniləndi!');
                                        redirect(base_url('admin_dashboard'));
                                    }else{

                                        $adminCateCount = $this->db->where(['a_category' => '1'])->count_all_results("admin");

                                        if($adminCateCount == '1') {
                                            $this->session->set_flashdata('err', 'Diqqət! Sonuncu adminin kateqoriyasını dəyişmək təhlükəsizlik baxımından mümkün deyil! Adminliyinizi başqasına verə bilərsiniz.');
                                            redirect($_SERVER['HTTP_REFERER']);
                                        }else {

                                            $data = [
                                                'a_name' => $name,
                                                'a_username' => $username,
                                                'a_category' => $category['a_c_id'],
                                                'a_status' => $status['s_id'],
                                                'a_email' => $email,
//                                      'a_img'         => $admin_img,
                                                'a_updater_id' => $_SESSION['admin_id'],
                                                'a_update_date' => date("Y-m-d H:i:s"),
                                            ];
                                            $data = $this->security->xss_clean($data);

                                            $this->db->where('a_id', $id)->update('admin', $data);
                                            $this->session->set_flashdata('success', 'Təbriklər! Admin məlumatı uğurla yeniləndi!');
                                            redirect(base_url('admin_dashboard'));
                                        }

                                    }


                                } else {
                                    $this->session->set_flashdata('err', 'Diqqət! Yalnış məlumat daxil edilib!');
                                    redirect($_SERVER['HTTP_REFERER']);
                                }

                            } else {
                                $this->session->set_flashdata('err', 'Diqqət! Yalnış məlumat daxil edilib!');
                                redirect($_SERVER['HTTP_REFERER']);
                            }
                        }

                    } else {
                        $data = [
                            'a_name' => $name,
                            'a_username' => $username,
//                        'a_category'    => $category['a_c_id'],
//                        'a_status'      => $status['s_id'],
                            'a_email' => $email,
//                        'a_img'         => $admin_img,
                            'a_updater_id' => $_SESSION['admin_id'],
                            'a_update_date' => date("Y-m-d H:i:s"),
                        ];
                        $data = $this->security->xss_clean($data);

                        $this->db->where('a_id', $id)->update('admin', $data);
                        $this->session->set_flashdata('success', 'Təbriklər! Admin məlumatı uğurla yeniləndi!');
                        redirect(base_url('admin_dashboard'));
                    }

                }


        }else{
            $this->session->set_flashdata('err', 'Diqqət! Boşluq buraxmayın!');
            redirect($_SERVER['HTTP_REFERER']);
        }


    }

    public function removeAdminIMg($id)
    {
        $data['admin_info'] = $this->db->select('a_img')->where('a_id',$id)->get('admin')->row_array();

        if($data['admin_info']['a_img']){

            $data = [
                'a_img' => '',
            ];
            $data = $this->security->xss_clean($data);

            $this->db->where('a_id',$id)->update('admin', $data);
            $this->session->set_flashdata('success', 'Təbriklər! Şəkil uğurla silindi!');
            redirect($_SERVER['HTTP_REFERER']);
        }else{
            $this->session->set_flashdata('err', 'Diqqət! Silmək üçün şəkil tapılmadı!');
            redirect($_SERVER['HTTP_REFERER']);
        }

    }

    public function change_password($id)
    {
        $data['admin_info'] = $this->db->select('a_id,a_password,a_category,a_status,a_email')->where('a_id',$id)->get('admin')->row_array();
//        print_r('<pre>');
//        print_r($data['admin_info']);
//        die();
        $this->load->view('admin/admin_change_password',$data);
    }
    
    public function change_passwordAct($id){
        $current_password   = $_POST['current_password'];
        $password           = $_POST['password'];
        $r_password         = $_POST['r_password'];

        if(!empty($current_password) && !empty($password) && !empty($r_password)){

            $oldPass = $this->db->select('a_id,a_password,a_category,a_status,a_email')->where('a_password',md5($current_password."seba"))->get('admin')->row_array();

            if($oldPass['a_password']){

                if($password == $r_password){
                    $n_pass = md5($password."seba");
                    $c_pass = $oldPass['a_password'];
                    if($n_pass == $c_pass){
                        $this->session->set_flashdata('err', 'Diqqət! Yeni şifrəni mövcud şifrə ilə eyni daxil etməyin! Fərqli yeni şifrə daxil edin.');
                        redirect($_SERVER['HTTP_REFERER']);
                    }else{
                        $data = [
                            'a_password' => $n_pass,
                        ];
                        $data = $this->security->xss_clean($data);

                        $this->db->where('a_id',$id)->update('admin', $data);
                        $this->session->set_flashdata('success', 'Təbriklər! Şifrə uğurla yeniləndi!');
                        redirect(base_url('admin_dashboard'));
                    }

                }else{
                    $this->session->set_flashdata('err', 'Diqqət! Yeni şifrəni düzgün formada iki dəfə təkrar daxil edin.');
                    redirect($_SERVER['HTTP_REFERER']);
                }

            }else{
                $this->session->set_flashdata('err', 'Diqqət! Mövcud şifrə yalnışdır.');
                redirect($_SERVER['HTTP_REFERER']);
            }

        }else{
            $this->session->set_flashdata('err', 'Diqqət! Boşluq buraxmayın!');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function change_password_reset($id){
        $data['admin_info'] = $this->db->select('a_id,a_password,a_category,a_status,a_email')->where('a_id',$id)->get('admin')->row_array();
        $this->load->view('admin/admin_password_reset',$data);
    }

    public function change_password_resetAct($id){
        echo 'Maile getsin random sifre';
    }

    // Maile getsin random sifre
    // Bir profil digerini gormesin




















}
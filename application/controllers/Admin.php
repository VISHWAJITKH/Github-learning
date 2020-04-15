<?php

class Admin extends MY_Controller {

	// public function __construct() {

	// 	parent::__construct();
	// 	if (!$this->session->userdata('id')) {
	// 		redirect('login');
	// 	}
	// }

	public function logout() {

		$this->session->unset_userdata('id');
		redirect('admin/login');
	}

	public function index() {

		// $this->load->library('form_validation');
		$this->form_validation->set_rules('uname', 'Username', 'required|alpha');
		$this->form_validation->set_rules('pass', 'Password', 'required|max_length[12]');

		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run()) {
			
			$uname = $this->input->post('uname');
			$pass = md5($this->input->post('pass'));
			$this->load->model('loginmodel');
			$id = $this->loginmodel->isvalidate($uname, $pass);
			if ($id) {
				
				// $this->load->library('session');
				$this->session->set_userdata('id', $id);
				return redirect('admin/welcome');

			}
			else {
				//logic failed
				$this->session->set_flashdata('Loginfailed', 'Invalid Username / Password !');
				return redirect('admin/login');
			}
		}
		else {

			$this->load->view('admin/login');
		}
	}

	public function register() {

		// $this->load->library('form_validation');
		$this->form_validation->set_rules('uname', 'Username', 'required|alpha');
		$this->form_validation->set_rules('pass', 'Password', 'required|max_length[12]');
		$this->form_validation->set_rules('firstname', 'First Name', 'required|alpha');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required|alpha');
		$this->form_validation->set_rules('email', 'Email', 'required|is_unique[users.email]');

		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

		if ($this->form_validation->run()) {
			
			$data = [	
					'username'=>$this->input->post('uname'), 
					'password'=>md5($this->input->post('pass')), 
					'firstname'=>$this->input->post('firstname'), 
					'lastname'=>$this->input->post('lastname'), 
					'email'=>$this->input->post('email')
				];

			$this->load->model('loginmodel');
			$registered = $this->loginmodel->signIn($data);
			if ($registered) {
				$this->session->set_flashdata('userregistered', 'User Registered Successfully!');
				$this->session->set_flashdata('userregistered_class', 'alert alert-success');
			}
			else {
				$this->session->set_flashdata('userregistered', 'Unable to Register user!');
				$this->session->set_flashdata('userregistered_class', 'alert alert-danger');
			}
			return redirect('admin/register');
			// if ($registered) {

			// 	$this->email->from(set_value('email'),set_value('firstname'));
			// 	$this->email->to('ajay.suneja1993@gmail.com');

			// 	$this->email->subject('Email Test functionality');
			// 	$this->email->message('Thank You for registering');
			// 	$this->email->set_newline("\r\n");
			// 	$this->email->send();

			// 	if (!$this->email->send()) {
			// 		show_error($this->email->print_debugger());
			// 	}
			// 	else{
			// 		echo "Your email has been sent!";
			// 	}
			// 	$this->load->view('admin/register');

			// }
			// else {
			// 	//logic failed
			// 	echo "details not matched";
			// }
		}
		else {

			$this->load->view('admin/signup');
		}
	}

	public function login() {

		$this->load->view('admin/login');
	}

	public function welcome() {

		$this->load->model('loginmodel', 'ar');

		$this->load->library('pagination');

		$config = [
			'base_url'=>base_url('admin/welcome'),
			'per_page'=>10,
			'total_rows'=> $this->ar->num_rows(),

			'full_tag_open'=>'<ul class="pagination">',
			'full_tag_close'=>'</ul>',
			'next_tag_open'=>'<li class="page-item">',
			'next_tag_close'=>'</li>',
			'prev_tag_open'=>'<li class="page-item">',
			'prev_tag_close'=>'</li>',
			'num_tag_open'=>'<li class="page-item">',
	      	'num_tag_close'=>'</li>',
	      	'cur_tag_open'=>'<li class="page-item active">
	      		<a class="page-link">',
	      	'cur_tag_close'=>'</a></li>',
			'attributes'=>['class'=>'page-link'],

		];

		$this->pagination->initialize($config);
		
		$articles = $this->ar->articleList($config['per_page'], $this->uri->segment(3));
		$this->load->view('admin/dashboard', ['articles'=>$articles]);
	}

	public function signin() {

		$this->load->view('admin/signup');
	}

	public function addarticle() {

		$this->load->view('admin/addarticle');
	}

	public function insertarticle() {

		$config = [
			'upload_path' => './uploads/',
			'allowed_types' => 'gif|jpg|png'
		];

		$this->load->library('upload', $config);

		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		if ($this->form_validation->run('add_article_rules') && $this->upload->do_upload()) {
			$post = $this->input->post();

			$data = $this->upload->data();
			$image_path = base_url("uploads/".$data['raw_name'].$data['file_ext']);
			$post['image_path'] = $image_path;
// print_r($post); exit;
			$this->load->model('loginmodel');
			if ($this->loginmodel->addarticle($post)) {
				$this->session->set_flashdata('articlestatus', 'Article Added Successfully!');
				$this->session->set_flashdata('articlestatus_class', 'alert alert-success');
			}
			else {
				$this->session->set_flashdata('articlestatus', 'Article Could not be added!');
				$this->session->set_flashdata('articlestatus_class', 'alert alert-danger');
			}
			return redirect('admin/welcome');
		}
		else {
			$upload_error = $this->upload->display_errors();
			$this->load->view('admin/addarticle', compact('upload_error'));
		}

		// $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		// if ($this->form_validation->run('add_article_rules')) {
		// 	$data = $this->input->post();
		// 	$this->load->model('loginmodel');

			
		// 	return redirect('admin/welcome');

		// }
		
	}

	public function delarticle() {

		$id = $this->input->post('id');
		$this->load->model('loginmodel');

		if ($this->loginmodel->del($id)) {
			$this->session->set_flashdata('articlestatus', 'Article Deleted Successfully!');
			$this->session->set_flashdata('articlestatus_class', 'alert alert-danger');
		}
		else {
			$this->session->set_flashdata('articlestatus', 'Article Could not be deleted!');
			$this->session->set_flashdata('articlestatus_class', 'alert alert-success');
		}
		return redirect('admin/welcome');

	}

	public function edituser($id) {

		$this->load->model('loginmodel');
		$results = $this->loginmodel->find_article($id);
		$this->load->view('admin/editarticle', ['records'=>$results]);
	}

	public function editarticle($articleid) {

		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
		if ($this->form_validation->run('update_article_rules')) {
			$content = $this->input->post();
			$art = [
				'article_title'=>$content['title'] ,
				'article_body'=>$content['body']
			];
			$this->load->model('loginmodel');

			if ($this->loginmodel->update_articles($articleid, $art)) {
				$this->session->set_flashdata('articlestatus', 'Article Updated Successfully!');
				$this->session->set_flashdata('articlestatus_class', 'alert alert-success');
			}
			else {
				$this->session->set_flashdata('articlestatus', 'Article Could not be Updated!');
				$this->session->set_flashdata('articlestatus_class', 'alert alert-danger');
			}
			return redirect('admin/welcome');

		}
		else {
			$this->load->view("admin/edituser/{$art->id}");
		}

	}

}

?>
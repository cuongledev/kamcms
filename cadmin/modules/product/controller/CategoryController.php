<?php 
class CategoryController extends Controller{
	public $modelCategory;
	public function __construct(){
		parent::__construct();
		$this->modelCategory = $this->loadModel('Category');
	}
	public function index(){
		global $_web;
		// Check if there are any SUCCESS messages
		if (isset($_SESSION['flash_success'])) {
			$this->view->data['flash_success'] = Session::get('flash_success');
			unset($_SESSION['flash_success']);
		}
		if (isset($_GET['s']) && $_GET['s']!='') {
			$search = trim(addslashes($_GET['s']));
			$this->view->data['data'] = $this->modelCategory->findSearch($search);
			$this->view->data['s'] = $search;
			$this->view->data['curpage'] = 1;
			$this->view->data['count_page'] = 1;
			$this->view->data['pagination'] ='';
		}else{
			$link = base_url().'product/category/index';
			$all_pages = $this->modelCategory->getCategories();

			$paging = new Paging(count($all_pages),$link);
			$limit =20;
			// Tổng số trang
			$count_page = $paging->findPages($limit);
			// Bắt đầu từ mẫu tin
			$start =$paging->rowStart($limit);
			// Trang hiện tại
			$curpage = ($start/$limit)+1;

			// Xuất dữ liệu với truy vấn
			$this->view->data['data'] = $this->modelCategory->getPagiCategory($start,$limit);
			$this->view->data['curpage'] = $curpage;
			$this->view->data['count_page'] = $count_page;
			
			$this->view->data['pagination'] = $paging->pagesList($curpage);  
		}

		

		$this->view->render('index_category');
	}
	public function add(){
		$this->view->data['menu']   = $this->modelCategory->getCategories();
		//dd($this->view->data['menu']);
		$this->view->render('add_category');
	}
	
	public function save(){
		if (isset($_POST['submit'])) {
			$title = trim(addslashes($this->input->post('title')));
			$description = trim(addslashes($this->input->post('description')));
			$note = trim(addslashes($this->input->post('note')));
			$parent_id = trim(addslashes($this->input->post('parent_id')));
			$thumbnail = trim(addslashes($this->input->post('hidden_thumb_pages')));
			$background = trim(addslashes($this->input->post('background')));
			$meta_keyword = trim(addslashes($this->input->post('meta_keyword')));
			$meta_description = trim(addslashes($this->input->post('meta_description')));

			

			$data = array(
				'title'			=> $title,
				'alias'			=> alias($title),
				'description'	=> $description,
				'avatar'		=> $thumbnail,
				'background'		=> $background,
				'note'			=> $note,
				'parent_id'			=> $parent_id,
				'meta_title'	=> $title,
				'meta_description'	=> $meta_description,
				'meta_keyword'		=> $meta_keyword,
				'status'			=> 1,
			);
			if (isset($_POST['id_category']) && is_numeric($_POST['id_category'])) { // như thế này là đang update
				$data['update_author'] 	= Session::get('id');
				$data['update_time'] 	= time();
				$this->modelCategory->update($data,$_POST['id_category']);
				$mess = array(
					'flash_success' => lang('update_page_success'),
				);
			}else{ // như thế này là đang insert
				$data['create_author'] 	= Session::get('id');
				$data['create_time'] 	= time();
				$this->modelCategory->insertData($data);
				$mess = array(
					'flash_success' => lang('insert_page_success'),
				);
			}
			
            Session::create($mess);
            if ($_POST['submit']=='save') {
            	redirect(base_url().'product/category/index');
            }else{
            	redirect(base_url().'product/category/add');
            }
            
		}
	}
	public function edit(){
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			if ($this->modelCategory->checkId($_GET['id']) == FALSE) {
				$this->view->data['data']=$this->modelCategory->getDataById($_GET['id']);
				$this->view->data['menu']   = $this->modelCategory->getCategories();
				$this->view->render('add_category');
			}
		}
	}
	public function del(){
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			if ($this->modelCategory->checkId($_GET['id']) == FALSE) {
				$id = $_GET['id'];
				$this->modelCategory->delete($id);
				$mess = array(
					'flash_success' => lang('delete_success'),
				);
				Session::create($mess);
				redirect(base_url().'product/category/index');
			}
		}
	}
	public function dellAll(){
		if (isset($_POST['all'])) {
			if (!empty($_POST['all']) &&  is_array($_POST['all'])) {
                $names_id = $_POST['all'];
                $this->modelCategory->dellWhereInArray($names_id);
                $mess = array(
					'flash_success' => lang('delete_all_success'),
				);
                Session::create($mess);
				$data_mess = array(
					'status'	=> true,
					'redirect'		=> base_url().'product/category/index'
				);
				echo json_encode($data_mess);
            }
		}
	}
	public function status(){
		if (isset($_POST['status'])) {
			if (!empty($_POST['all']) &&  is_array($_POST['all'])) {
                $names_id = $_POST['all'];
                if ($_POST['status']=='public') {
                	$data = array(
                		'status' => 1
                	);
                }else{
                	$data = array(
                		'status' => 0
                	);
                }
                foreach ($names_id as $value) {
                	$this->modelCategory->update($data,$value);
                }
                $mess = array(
					'flash_success' => lang('status_pages_success'),
				);
                Session::create($mess);
				$data_mess = array(
					'status'	=> true,
					'redirect'		=> base_url().'product/category/index'
				);
				echo json_encode($data_mess);
            }
		}
	}
}
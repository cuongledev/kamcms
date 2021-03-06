<?php 
class CategoriesController extends Controller{
	public $modelCategories;
	public function __construct(){
		parent::__construct();
		$this->modelCategories = $this->loadModel('Categories');

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
			$this->view->data['data'] = $this->modelCategories->findSearch($search);
			$this->view->data['s'] = $search;
			$this->view->data['curpage'] = 1;
			$this->view->data['count_page'] = 1;
			$this->view->data['pagination'] ='';
		}else{
			$link = base_url().'posts/categories/index';
			$all_pages = $this->modelCategories->getCategories();

			$paging = new Paging(count($all_pages),$link);
			$limit =20;
			// Tổng số trang
			$count_page = $paging->findPages($limit);
			// Bắt đầu từ mẫu tin
			$start =$paging->rowStart($limit);
			// Trang hiện tại
			$curpage = ($start/$limit)+1;

			// Xuất dữ liệu với truy vấn
			$this->view->data['data'] = $this->modelCategories->getPagiCategories($start,$limit);
			$this->view->data['curpage'] = $curpage;
			$this->view->data['count_page'] = $count_page;
			
			$this->view->data['pagination'] = $paging->pagesList($curpage);  
		}
		
		$this->view->render('categories_index');
	}	
	public function add(){
		if (isset($_SESSION['flash_success'])) {
			$this->view->data['flash_success'] = Session::get('flash_success');
			unset($_SESSION['flash_success']);
		}

		$dir          = DIR_TMP.'cdn/';
		$this->view->data['images'] = getImagesToFolder($dir);

		$this->view->data['menu']   = $this->modelCategories->getCategories();
		$this->view->render('categories_edit');
	}
	public function save(){
		if (isset($_POST['submit'])) {
			$title = trim(addslashes($this->input->post('title')));
			$description = trim(addslashes($this->input->post('description')));
			$note = trim(addslashes($this->input->post('note')));
			$order_by = trim(addslashes($this->input->post('order_by')));
			$parent_id = trim(addslashes($this->input->post('parent_id')));
			$thumbnail = trim(addslashes($this->input->post('hidden_thumb_pages')));

			

			$data = array(
				'title'			=> $title,
				'alias'			=> alias($title),
				'description'	=> $description,
				'thumbnail'		=> $thumbnail,
				'note'			=> $note,
				'sort'			=> $order_by,
				'parent_id'			=> $parent_id,
				'status'			=> 1,
			);
			if (isset($_POST['id_category']) && is_numeric($_POST['id_category'])) { // như thế này là đang update
				$data['author_update'] 	= Session::get('id');
				$data['update_time'] 	= time();
				$this->modelCategories->update($data,$_POST['id_category']);
				$mess = array(
					'flash_success' => lang('update_page_success'),
				);
			}else{ // như thế này là đang insert
				$data['author_create'] 	= Session::get('id');
				$data['create_time'] 	= time();
				$this->modelCategories->insertData($data);
				$mess = array(
					'flash_success' => lang('insert_page_success'),
				);
			}
			
            Session::create($mess);
            if ($_POST['submit']=='save') {
            	redirect(base_url().'posts/categories/index');
            }else{
            	redirect(base_url().'posts/categories/add');
            }
            
		}
	}
	
	public function edit(){
		$dir          = DIR_TMP.'cdn/';
		$this->view->data['images'] = getImagesToFolder($dir);
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			if ($this->modelCategories->checkId($_GET['id']) == FALSE) {
				$this->view->data['data']=$this->modelCategories->getDataById($_GET['id']);
				$this->view->data['menu']   = $this->modelCategories->getCategories();
				$this->view->render('categories_edit');
			}
		}
	}
	public function del(){
		if (isset($_GET['id']) && is_numeric($_GET['id'])) {
			$id = $_GET['id'];
			$this->modelCategories->delete($id);
			$mess = array(
				'flash_success' => lang('delete_success'),
			);
			Session::create($mess);
			redirect(base_url().'posts/categories/index');
		}
	}









	public function dellAll(){
		if (isset($_POST['all'])) {
			if (!empty($_POST['all']) &&  is_array($_POST['all'])) {
                $names_id = $_POST['all'];
                $this->modelCategories->dellWhereInArray($names_id);
                $mess = array(
					'flash_success' => lang('delete_all_success'),
				);
                Session::create($mess);
				$data_mess = array(
					'status'	=> true,
					'redirect'		=> base_url().'/posts/categories/index'
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
                	$this->modelCategories->update($data,$value);
                }
                $mess = array(
					'flash_success' => lang('status_pages_success'),
				);
                Session::create($mess);
				$data_mess = array(
					'status'	=> true,
					'redirect'		=> base_url().'posts/categories/index'
				);
				echo json_encode($data_mess);
            }
		}
	}
}
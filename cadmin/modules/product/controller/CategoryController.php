<?php 
class CategoryController extends Controller{
	public $modelCategory;
	public function __construct(){
		parent::__construct();
		$this->modelCategory = $this->loadModel('Category');
	}
	public function index(){
		global $_web;
		$this->view->data  = $this->modelCategory->getCategories();
		

		$this->view->render('index_category');
	}
	public function add(){
		$dir          = DIR_TMP.'cdn/';
		$this->view->data['images'] = getImagesToFolder($dir);

		$this->view->data['menu']   = $this->modelCategory->getCategories();
		//dd($this->view->data['menu']);
		$this->view->render('add_category');
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
				'avatar'		=> $thumbnail,
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
}
<?php 
class GlobalsModel{
	private $menu;
	private $settings;
	private $options;
	private $widgets;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->menu     = new system\Model($this->lang.'_menu');
		$this->settings     = new system\Model('web_settings');
		$this->options     = new system\Model('web_options');
		$this->widgets     = new system\Model($this->lang.'_widgets');
	}
	public function getMenu($position){
		$this->menu->where('position',$position);
		$this->menu->orderBy('sort','asc');
		$result  = $this->menu->get();
		return $result;
	}
	public function getSettings(){
		$this->settings->where('id',2);
		$result = $this->settings->getOne();
		return $result;
	}
	public function getOptions(){
		$this->options->where('id',1);
		$result = $this->options->getOne();
		return $result;
	}
	public function getWidgets(){
		$result = $this->widgets->get(null,null,'id,title,type,sort,options');
		return $result;
	}
}
<div class="portlet light bordered" id="block-image">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-sliders" aria-hidden="true"></i> &nbsp;
            <span class="caption-subject font-red-sunglo bold uppercase">THƯƠNG HIỆU SẢN PHẨM</span>
        </div>
        <div class="tools">
            <a href="javascript:;" class="collapse" data-status="true"></a>
            <a href="javascript:;" class="remove"></a>
        </div>
    </div>
    <div class="portlet-body form">
        <div class="note note-info">
            <p>Tính năng phục vụ cho việc phân loại sản phẩm theo thương hiệu trên website của bạn. Thêm mới thương hiệu <a href="javascript:void(0)" data-toggle="modal" data-target="#myModalBrand">tại đây</a></p>
        </div>
        <div class="form-group">
		    <label class="col-md-2 control-label">Chọn thương hiệu</label>
		    <div class="col-md-8">
		        <div class="form-control height-auto">
		            <div class="scrollbar">
		                <ul class="list-unstyled" id="list_brand">
		                	<?php 
		                	if (!empty($this->data['data_brand'])) {
		                		foreach ($this->data['data_brand'] as $key => $value) { ?>
		                			<li class="brand_<?php echo $value['id'];?>">
				                        <label><div class="checker"><span class="<?php if (strpos($this->data['data']['brand'], '|'.$value['id'].'|') !== false) echo 'after_opacity'; ?>"><input class="checkboxes" type="checkbox" name="brand[]" value="<?php echo $value['id'];?>" <?php if (strpos($this->data['data']['brand'], '|'.$value['id'].'|') !== false) echo 'checked';?>/></span></div> <?php echo $value['name'];?></label>
				                    </li>
		                	<?php 
		                		}
		                	}
		                	 ?>
		                </ul>
		            </div>
		        </div>
		    </div>
		</div>
        <div class="clearfix"></div>
    </div>
</div>


<div>
    <!-- Modal Choose Images List -->
    <div class="modal fade" id="myModalBrand" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="label-model-folder-img">
                       <?php echo lang('add_brand'); ?>
                    </h4>
                  </div>
                  <div class="modal-body">
						<div class="element-brand">
				    		<div class="col-md-10">
						        <input type="text" class="form-control maxlength-handler" id="brand_title" placeholder="Nhập tên thương hiệu.." value="">
						    </div>
						    <div class="col-md-2" style="padding:0px">
						        <a href="javascript:void(0)" class="btn green add_brand" style="border-radius:3px !important"><i class="fa fa-plus"></i></a>
						    </div>
						    <div class="clearfix" style="margin:8px 0px;"></div>
						    <div class="col-md-12">
				    		<ul class="list-unstyled" id="element-list-brand">
					    		<?php 
			                	if (!empty($this->data['data_brand'])) {
			                		foreach ($this->data['data_brand'] as $key => $value) {?>
			                			<li>
					                        <?php echo $value['name'];?>
					                        <span class="input-group-btn del_brand" data-id="<?php echo $value['id'];?>">
												<button class="btn default date-reset" type="button"><i class="fa fa-times"></i></button>
											</span>
					                    </li>
			                	<?php
			                		}
			                	}
			                	?>
					    	</ul>
				    		</div>
				    		<div class="clearfix" style="margin:8px 0px;"></div>
				    	</div>
				    	
				    	
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close');?></button>
                  </div>
                </div>
              </div>
    </div><!--END MODAL Choose Images List-->
</div>
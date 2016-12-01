<div class="form-group ">
		<label for="name" class="control-label required"><?php echo lang('category');?></label>
        <ul class="list-categories product-list-category">
        	<?php 
        	if (isset($this->data['data']['id'])) {
    			if (!empty($this->data['data_category'])) {
	        		foreach ($this->data['data_category'] as $key => $value) {
    			?>
        			<li>
		                <div class="checker">
		                	<span <?php 
		                	if (preg_match("/,".$value['id'].",/", $this->data['data']['category'], $matches)){
		        				echo "class='after_opacity'";
		        			}
		                	?>>
		                		<input type="checkbox" class="styled" name="categories[]" value="<?php echo $value['id'];?>" <?php 
		                			if (preg_match("/,".$value['id'].",/", $this->data['data']['category'], $matches)){
		        						echo "checked";
		        					}
		                	?>>
		                	</span>
		                </div>
		                <label for="category-item-<?php echo $value['alias'];?>"><?php echo $value['title'];?></label>
		            </li>
        		<?php 
        			}
        		}
        	}else{
        		if (!empty($this->data['data_category'])) {
	        		foreach ($this->data['data_category'] as $key => $value) { ?>
	        			<li>
			                <div class="checker"><span><input type="checkbox" class="styled" name="categories[]" value="<?php echo $value['id'];?>"></span></div>
			                <label for="category-item-<?php echo $value['alias'];?>"><?php echo $value['title'];?></label>
			            </li>
	        		<?php 
	        		}
	        	}
        	}
        	?>
        </ul>
    </div>
<div class="clearfix"></div>
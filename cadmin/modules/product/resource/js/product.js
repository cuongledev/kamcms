$('body').on('dblclick', '#myModalPages .media-col img.img-folder-media', function(event) {
	event.preventDefault();
	var check_folder = $(this).parent('.media-col').attr('data-folder');
	var directory = $('#directory').val();
	$.ajax({
		url: baseUrl+'settings/settings/openDirectory',
		type: 'POST',
		dataType: 'json',
		data: {check_folder: check_folder,directory:directory},
	})
	.done(function(data) {
		//console.log(current_folder);
		if (data.status==true) {
			$('#myModalPages').find('.modal-body').fadeOut(100, function(){
                $('#myModalPages').find('.modal-body').html(data.html).fadeIn();
            });
		}
	});
	
	
});



$('body').on('dblclick', '#back_folder', function(event) {
	event.preventDefault();
	var current_folder = $(this).parent('.modal-body');
	var directory = $('#directory').val();
	$.ajax({
		url: baseUrl+'settings/settings/backDirectory',
		type: 'POST',
		dataType: 'json',
		data: {back: 'true',directory:directory},
	})
	.done(function(data) {
		if (data.status==true) {
			current_folder.fadeOut(100, function(){
                current_folder.html(data.html).fadeIn();
                //$('#loadMedia').html(data.html).fadeIn().delay(600);
            });
		}

	});
	
});


$('body').on('click', '.choose_img', function(event) {
		event.preventDefault();
		var body_img = $(this).parents('.modal-image-choose').find('.modal-body');
		var list = new Array();
		body_img.find('.img-active').each(function(){
			list.push($(this).attr('data-src'));
		});
		//console.log(list);
		if (list.length == 0) {
			toastr["error"](body_img.attr('data-mess-one'));
		}else if(list.length > 1){
			toastr["error"](body_img.attr('data-mess-two'));
		}else{
			var src = list[0];
			if (body_img.attr('data-title')=='thumbnail_pages') {
				var title = 'thumbnail_pages';
			}else{
				var title = '';
			}
			/*$.ajax({
				url: baseUrl+'index.php?mod=pages&controller=pages&action=updateInfo',
				type: 'POST',
				dataType: 'json',
				data: {src: src,title:title},
			})
			.done(function(data) {
				if (data.status) {
					toastr["success"](data.mess);
				}
			});*/
			$('.modal-image-choose').find('.hidden_thumb_pages').val(src);
			$(this).parents('.modal-image-choose').find('.load-img').attr('src', baseUrl+'tmp/public/plugins/image_tools/timthumb.php?src='+baseUrl+'tmp/cdn/'+src+'&h=150&w=210&zc=2');
			body_img.find('.img-load-folder').each(function(){
				$(this).removeClass('img-active');
			});
			$(this).parents('.modal-image-choose').find('.modal').modal('hide');
		}
	});



	$('body').on('click', '.del-image-choose-pages', function(event) {
		event.preventDefault();
		$(this).parents('.modal-image-choose').find('.hidden_thumb_pages').val('');
		$(this).parents('.modal-image-choose').find('.pages-website').attr('src',baseUrl+'tmp/public/images/img.png');
	});


	$('body').on('click', '.search_button_category', function(event) {
		event.preventDefault();
		var search = $('.search_category').val();
		if (search=="") {
			window.location.assign(baseUrl+'product/category/index');
		}else{
			window.location.assign(baseUrl+'product/category/index&s='+search);
		}
		
	});
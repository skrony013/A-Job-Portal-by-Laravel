	$(function(){

            //Job Logo Image Add & Edit Preview
            $('input[type="file"][name="institute_logo"]').val('');
            //Image preview
            $('input[type="file"][name="institute_logo"]').on('change', function(){
            	var img_path = $(this)[0].value;
            	var img_holder = $('.img-holder');
            	var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
            	if(extension == 'jpeg' || extension == 'jpg' || extension == 'png'){
            		if(typeof(FileReader) != 'undefined'){
            			img_holder.empty();
            			var reader = new FileReader();
            			reader.onload = function(e){
            				$('<img/>',{'src':e.target.result,'class':'img-fluid','style':'width:110px; height:70px; margin-bottom:10px;'}).appendTo(img_holder);
            			}
            			img_holder.show();
            			reader.readAsDataURL($(this)[0].files[0]);
            		}else{
            			$(img_holder).html('This browser does not support FileReader');
            		}
            	}else{
            		$(img_holder).empty();
            	}
            });

            // Job Category Image Add & Edit With Preview

            $('input[type="file"][name="cat_img"]').val('');
            //Image preview
            $('input[type="file"][name="cat_img"]').on('change', function(){
                var img_path = $(this)[0].value;
                var cat_img_holder = $('.cat_img_holder');
                var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
                if(extension == 'jpeg' || extension == 'jpg' || extension == 'png' || extension == 'svg'){
                    if(typeof(FileReader) != 'undefined'){
                        cat_img_holder.empty();
                        var reader = new FileReader();
                        reader.onload = function(e){
                            $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'width:110px; height:70px; margin-bottom:10px;'}).appendTo(cat_img_holder);
                        }
                        cat_img_holder.show();
                        reader.readAsDataURL($(this)[0].files[0]);
                    }else{
                        $(cat_img_holder).html('This browser does not support FileReader');
                    }
                }else{
                    $(cat_img_holder).empty();
                }
            });


            // Job Banner Image Add & Edit With Preview

            $('input[type="file"][name="institute_banner"]').val('');
            //Image preview
            $('input[type="file"][name="institute_banner"]').on('change', function(){
                var img_path = $(this)[0].value;
                var banner_img_holder = $('.banner-img-holder');
                var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
                if(extension == 'jpeg' || extension == 'jpg' || extension == 'png'){
                    if(typeof(FileReader) != 'undefined'){
                        banner_img_holder.empty();
                        var reader = new FileReader();
                        reader.onload = function(e){
                            $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'width:110px; height:70px; margin-bottom:10px;'}).appendTo(banner_img_holder);
                        }
                        banner_img_holder.show();
                        reader.readAsDataURL($(this)[0].files[0]);
                    }else{
                        $(banner_img_holder).html('This browser does not support FileReader');
                    }
                }else{
                    $(banner_img_holder).empty();
                }
            });

            // PDF Add & Edit With Preview

            $('input[type="file"][name="circular"]').val('');
            //Image preview
            $('input[type="file"][name="circular"]').on('change', function(){
                var img_path = $(this)[0].value;
                var pdf_holder = $('.pdf_holder');
                var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
                if(extension == 'jpeg' || extension == 'jpg' || extension == 'png' || extension == 'pdf'){
                    if(typeof(FileReader) != 'undefined'){
                        pdf_holder.empty();
                        var reader = new FileReader();
                        reader.onload = function(e){
                            $('<iframe/>',{'src':e.target.result,'style':'width:80%; height:150px; margin-bottom:10px;'}).appendTo(pdf_holder);
                        }
                        pdf_holder.show();
                        reader.readAsDataURL($(this)[0].files[0]);
                    }else{
                        $(pdf_holder).html('This browser does not support FileReader');
                    }
                }else{
                    $(pdf_holder).empty();
                }
            });


             // About Image Add & Edit With Preview

             $('input[type="file"][name="about_img"]').val('');
            //Image preview
            $('input[type="file"][name="about_img"]').on('change', function(){
                var img_path = $(this)[0].value;
                var about_img_holder = $('.about_img_holder');
                var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
                if(extension == 'jpeg' || extension == 'jpg' || extension == 'png'){
                    if(typeof(FileReader) != 'undefined'){
                        about_img_holder.empty();
                        var reader = new FileReader();
                        reader.onload = function(e){
                            $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'width:110px; height:70px; margin-bottom:10px;'}).appendTo(about_img_holder);
                        }
                        about_img_holder.show();
                        reader.readAsDataURL($(this)[0].files[0]);
                    }else{
                        $(about_img_holder).html('This browser does not support FileReader');
                    }
                }else{
                    $(about_img_holder).empty();
                }
            });


             // FAQ Image Add & Edit With Preview

             $('input[type="file"][name="img"]').val('');
            //Image preview
            $('input[type="file"][name="img"]').on('change', function(){
                var img_path = $(this)[0].value;
                var faq_img_holder = $('.faq_img_holder');
                var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
                if(extension == 'jpeg' || extension == 'jpg' || extension == 'png'){
                    if(typeof(FileReader) != 'undefined'){
                        faq_img_holder.empty();
                        var reader = new FileReader();
                        reader.onload = function(e){
                            $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'width:110px; height:70px; margin-bottom:10px;'}).appendTo(faq_img_holder);
                        }
                        faq_img_holder.show();
                        reader.readAsDataURL($(this)[0].files[0]);
                    }else{
                        $(faq_img_holder).html('This browser does not support FileReader');
                    }
                }else{
                    $(faq_img_holder).empty();
                }
            });


             // Blog Image Add & Edit With Preview

             $('input[type="file"][name="img"]').val('');
            //Image preview
            $('input[type="file"][name="img"]').on('change', function(){
                var img_path = $(this)[0].value;
                var blog_img_holder = $('.blog_img_holder');
                var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
                if(extension == 'jpeg' || extension == 'jpg' || extension == 'png'){
                    if(typeof(FileReader) != 'undefined'){
                        blog_img_holder.empty();
                        var reader = new FileReader();
                        reader.onload = function(e){
                            $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'width:110px; height:70px; margin-bottom:10px;'}).appendTo(blog_img_holder);
                        }
                        blog_img_holder.show();
                        reader.readAsDataURL($(this)[0].files[0]);
                    }else{
                        $(blog_img_holder).html('This browser does not support FileReader');
                    }
                }else{
                    $(blog_img_holder).empty();
                }
            });

             // Setting Logo Image Add & Edit With Preview

             $('input[type="file"][name="site_logo"]').val('');
            //Image preview
            $('input[type="file"][name="site_logo"]').on('change', function(){
                var img_path = $(this)[0].value;
                var blog_img_holder = $('.site_logo_holder');
                var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
                if(extension == 'jpeg' || extension == 'jpg' || extension == 'png'){
                    if(typeof(FileReader) != 'undefined'){
                        blog_img_holder.empty();
                        var reader = new FileReader();
                        reader.onload = function(e){
                            $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'width:100px; height:45px; margin-bottom:10px;'}).appendTo(blog_img_holder);
                        }
                        blog_img_holder.show();
                        reader.readAsDataURL($(this)[0].files[0]);
                    }else{
                        $(blog_img_holder).html('This browser does not support FileReader');
                    }
                }else{
                    $(blog_img_holder).empty();
                }
            });
             // Setting Logo Image Add & Edit With Preview

             $('input[type="file"][name="footer_logo"]').val('');
            //Image preview
            $('input[type="file"][name="footer_logo"]').on('change', function(){
                var img_path = $(this)[0].value;
                var blog_img_holder = $('.admin_logo_holder');
                var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
                if(extension == 'jpeg' || extension == 'jpg' || extension == 'png'){
                    if(typeof(FileReader) != 'undefined'){
                        blog_img_holder.empty();
                        var reader = new FileReader();
                        reader.onload = function(e){
                            $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'width:100px; height:45px; margin-bottom:10px;'}).appendTo(blog_img_holder);
                        }
                        blog_img_holder.show();
                        reader.readAsDataURL($(this)[0].files[0]);
                    }else{
                        $(blog_img_holder).html('This browser does not support FileReader');
                    }
                }else{
                    $(blog_img_holder).empty();
                }
            });
             // Setting favicon Image Add & Edit With Preview

             $('input[type="file"][name="site_favicon"]').val('');
            //Image preview
            $('input[type="file"][name="site_favicon"]').on('change', function(){
                var img_path = $(this)[0].value;
                var blog_img_holder = $('.site_favicon_holder');
                var extension = img_path.substring(img_path.lastIndexOf('.')+1).toLowerCase();
                if(extension == 'jpeg' || extension == 'jpg' || extension == 'png'){
                    if(typeof(FileReader) != 'undefined'){
                        blog_img_holder.empty();
                        var reader = new FileReader();
                        reader.onload = function(e){
                            $('<img/>',{'src':e.target.result,'class':'img-fluid','style':'width:100px; height:45px; margin-bottom:10px;'}).appendTo(blog_img_holder);
                        }
                        blog_img_holder.show();
                        reader.readAsDataURL($(this)[0].files[0]);
                    }else{
                        $(blog_img_holder).html('This browser does not support FileReader');
                    }
                }else{
                    $(blog_img_holder).empty();
                }
            });



         })
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kormo365- An Online Job Portal</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/png" href="frontend/img/logo.png"/>
	<!-- Owl Carousel CSS -->
	<link rel="stylesheet" href="frontend/css/owl.carousel.min.css">
	<link rel="stylesheet" href="frontend/css/owl.theme.default.min.css">
	<!-- Modal Video CSS Plugin -->
	<link rel="stylesheet" href="frontend/css/modal-video.min.css">
	<!-- Bootstrap CSS Here -->
	<link rel="stylesheet" href="frontend/css/bootstrap.min.css">
	<!-- Font Awesome CSS Here -->
	<link rel="stylesheet" href="frontend/css/font-awesome.min.css">
	<!-- Bootstrap Icons CDN Link Here -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
	<!-- Main CSS Here -->
	<link rel="stylesheet" href="frontend/css/style.css">
	<!-- Responsive CSS -->
	<link rel="stylesheet" href="frontend/css/responsive.css">
</head>
<body>
@yield('content')



	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="frontend/js/jquery-3.6.0.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="frontend/js/bootstrap.min.js"></script>

	<!-- Counter Plugin Jquery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>

	<!-- OWL Carousel JS -->
	<script src="frontend/js/owl.carousel.js"></script>
	<!-- Custom Javascript -->
	

	<!-- Sticky Menu jQuery -->
	<script>
		$(window).on('scroll', function(){
			if($(this).scrollTop()>80){
				$('.h-sticky').addClass("sticky");
			}
			else{
				$('.h-sticky').removeClass("sticky");
			}
		})
	</script>
</body>
</html>
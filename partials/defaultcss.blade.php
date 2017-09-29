{{generate_theme_css('snackies/assets/css/fonts/open-sans/stylesheet.css')}} 
{{generate_theme_css('snackies/assets/css/fonts/icomoon/style.css')}} 

<!-- CSS styles  -->
{{generate_theme_css('snackies/assets/css/bootstrap.min.css')}} 
@if($tema->isiCss=='')
	{{generate_theme_css('snackies/assets/css/style.css?v=002')}} 
@else
	{{generate_theme_css('snackies/assets/css/editstyle.css?v=002')}} 
@endif
{{generate_theme_css('snackies/assets/css/responsive.css')}} 
{{generate_theme_css('snackies/assets/css/animate.css')}} 
<!-- Slider -->
{{generate_theme_css('snackies/assets/css/flexslider/flexslider.css')}} 
{{generate_theme_css('snackies/assets/css/flexslider/default.css')}} 

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<link href='//fonts.googleapis.com/css?family=Raleway:400,400italic,700' rel='stylesheet' type='text/css'>
{{favicon()}}
<!DOCTYPE html>
<!--[if IE 8]> <html <?php language_attributes(); ?> class="ie8"> <![endif]-->
<!--[if !IE]> <html <?php language_attributes(); ?>> <![endif]-->

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <link rel="profile" href="http://gmgp.org/xfn/11" />
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <?php wp_head(); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no"/>
  <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
</head>
<body <?php body_class(); ?>>
  <script>
window.fbAsyncInit = function() {
FB.init({
appId : '198438220674493',
autoLogAppEvents : true,
xfbml : true,
version : 'v2.11’
});
};
(function(d, s, id){
var js, fjs = d.getElementsByTagName(s)[];
if (d.getElementById(id)) {return;}
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/vi_VN/sdk.js";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script’, 'facebook-jssdk’));
</script>
<div class="fb-customerchat" page_id="690482207700261"></div>

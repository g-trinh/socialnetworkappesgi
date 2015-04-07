<?php
	const APPID = "593840247407880";
	const APPSECRET = "267d2b5f5df0548ff2e2a1f7f544da5f";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Titre de ma page</title>
		<meta title="description" content="contenu de ma page">
	</head>
	<body>
		<script>
		  window.fbAsyncInit = function() {
		    FB.init({
		      appId      : '593840247407880',
		      xfbml      : true,
		      version    : 'v2.3'
		    });
		  };

		  (function(d, s, id){
		     var js, fjs = d.getElementsByTagName(s)[0];
		     if (d.getElementById(id)) {return;}
		     js = d.createElement(s); js.id = id;
		     js.src = "//connect.facebook.net/en_US/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
		</script>

		<h1>Mon app FB</h1>
		<div
		  class="fb-like"
		  data-share="true"
		  data-width="450"
		  data-show-faces="true">
		</div>
	</body>
</html>

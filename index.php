<?php
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	session_start();

	require "conf.php";
	require "vendor/autoload.php";


	use Facebook\FacebookSession;
	use Facebook\FacebookRequest;
	use Facebook\FacebookRedirectLoginHelper;

	FacebookSession::setDefaultApplication(APPID, APPSECRET);

	$helper = new FacebookRedirectLoginHelper( "https://socialnetworkappesgi.herokuapp.com/" );
	$session = $helper->getSessionFromRedirect();

	if( isset( $_SESSION ) && isset($_SESSION['fbToken']) ) {
		$session = new FacebookSession( $_SESSION['fbToken'] );
		$user = new FacebookRequest( $session, "GET", "/me");
		$user = $user->execute()->getGraphObject( \Facebook\GraphUser::className() );
		var_dump($user);
		$logoutUrl = $helper->getLogoutUrl( $session, "https://socialnetworkappesgi.herokuapp.com/" );
	} else {
		$loginUrl = $helper->getLoginUrl();
	}

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
		     js.src = "//connect.facebook.net/fr_FR/sdk.js";
		     fjs.parentNode.insertBefore(js, fjs);
		   }(document, 'script', 'facebook-jssdk'));
		</script>

		<h1>Mon app FB :</h1>
		<p>Hello ! <?php ?></p>
		<?php if( !isset( $session ) ) : ?><a href="<?php echo $loginUrl; ?>">Se connecter</a><?php endif; ?>
		<?php if( isset( $session ) ) : ?><a href="<?php echo $logoutUrl; ?>">Se déconnecter</a><?php endif; ?>
		<div
		  class="fb-like"
		  data-share="true"
		  data-width="450"
		  data-show-faces="true">
		</div>
	</body>

	<?php
		if( $session )
			$_SESSION['fbToken'] = (string) $session->getAccessToken();
	?>
</html>

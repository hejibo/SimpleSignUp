<!DOCTYPE HTML>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>SimpleSignUp</title>
<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />

<script src='../js/jquery.js'></script>

<?php

include('php/globals.php');

$username = $_SERVER['PHP_AUTH_USER'];

if ($_REQUEST['page'] == '') { $page = 'main'; }
else { $page = $_REQUEST['page']; }

if ($page == 'main') { include('php/main.php'); }
elseif ($page == 'view') { include('php/view.php'); }
elseif ($page == 'edit') { include('php/edit.php'); }
elseif ($page == 'delete') { include('php/delete.php'); }
elseif ($page == 'change_status') { include('php/change_status.php'); }
elseif ($page == 'new') { include('php/new.php'); }
elseif ($page == 'change_details') { include('php/change_details.php'); }
elseif ($page == 'change_password') { include('php/change_password.php'); }
elseif ($page == 'save_password') { include('php/save_password.php'); }
elseif ($page == 'save_details') { include('php/save_details.php'); }
elseif ($page == 'save_edits') { include('php/save_edits.php'); }
elseif ($page == 'remind') { include('php/remind.php'); }
elseif ($page == 'delete_subject') { include('php/delete_subject.php'); }
elseif ($page == 'edit_subject') { include('php/edit_subject.php'); }

?>

</head>

<body>

<div id='header'><h1>SimpleSignUp</h1></div>

<div id='body'>

<?php

if ($page == 'main') { include('html/main.html'); }
elseif ($page == 'view') { include('html/view.html'); include('js/view.js'); }
elseif ($page == 'edit') { include('html/edit.html'); }
elseif ($page == 'delete') { include('html/delete.html'); }
elseif ($page == 'change_status') { include('html/change_status.html'); }
elseif ($page == 'new') { include('html/new.html'); }
elseif ($page == 'change_details') { include('html/change_details.html'); }
elseif ($page == 'change_password') { include('html/change_password.html'); }
elseif ($page == 'remind') { include('html/remind.html'); }
elseif ($page == 'delete_subject') { include('html/delete_subject.html'); }
elseif ($page == 'edit_subject') { include('html/edit_subject.html'); }
elseif ($page == 'login') { include('html/login.html'); }
else { $error = '404'; include('html/error.html'); }

?>

</div>

<script>
  if ($("#notification").length) {
    setTimeout("$('#notification').slideUp(duration=150);", 20000);
  }
</script>

</body>

</html>

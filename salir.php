<?php session_start(); 
unset($_SESSION['login_ok']);  
echo "<script type=\"text/javascript\">     
window.location=\"index.php\";   
</script> "; 
?>
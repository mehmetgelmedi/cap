<?php
	session_start();
	@$capKodPOST = $_SESSION['capKod'];
	echo '<img src="cap.php" />
	</br>
	<form action="" method="post">
	<label for="message">Kodu giriniz :</label>
	<input id="capText" name="capText" type="text">
 
	<input type="submit" value="Gönder" name="submit">
	</form>
	';
	
	if($_POST){
		$capTextPOST = $_POST['capText'];
		if (strcmp($capTextPOST,$capKodPOST)===0) {
			echo 'kod doğru';
		}
		else{
			echo 'kod yanliş';
		}
	}
	session_destroy();
?>
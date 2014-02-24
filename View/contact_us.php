<?php

       if (isset($_POST['submit']))
	   {
		   require_once "Mail.php";

        $from = "<fateh.fateh.12345@gmail.com>";
        $to = "<fateh.fateh.12345@gmail.com>";
        $subject = "Hi!";
        $body = "Hi,\n\nHow are you?";

        $host = "ssl://smtp.gmail.com";
        $port = "465";
        $username = "fateh.fateh.12345@gmail.com";  //<> give errors
        $password = "operation123";

        $headers = array ('From' => $from,
          'To' => $to,
          'Subject' => $subject);
        $smtp = Mail::factory('smtp',
          array ('host' => $host,
            'port' => $port,
            'auth' => true,
            'username' => $username,
            'password' => $password));

        $mail = $smtp->send($to, $headers, $body);

        if (PEAR::isError($mail)) {
          echo("<p>" . $mail->getMessage() . "</p>");
         } else {
          echo("<p>Message successfully sent!</p>");
         }
	   }

?>  <!-- end of php tag-->
    
<html>
<head>
</head>
<body>
<form method="post" action="email.php">
	Email: <input name="email" id="email" type="text" /><br />
 
	Message:<br />
	<textarea name="message" id="message" rows="15" cols="40"></textarea><br />
 
	<input type="submit" value="Submit" />
</form>

</body>
</html>
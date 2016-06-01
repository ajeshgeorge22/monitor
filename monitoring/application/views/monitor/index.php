<?php echo validation_errors(); ?>
<?php //$error=""?>


<!DOCTYPE html>
<html>
<head>
<title>Monitor Login</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/index.css');?>">                                    
</head>
<body>

<form id="login" method="post" action="">
    <h1>Login</h1>
    <fieldset id="inputs">
        <input id="username" name="username" type="text" placeholder="Username" autofocus required>
        <input id="password" name="password" type="password" placeholder="Password" required>
        <span class="error"><?php echo "<br>";echo $error;?></span>
    </fieldset>
    <fieldset id="actions">
        <input type="submit" id="submit" value="Log in" name="submit">
        
       
    </fieldset>

</form>


</body>
</html>

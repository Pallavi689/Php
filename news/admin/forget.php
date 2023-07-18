
  <html>
    <head>
    <link rel="stylesheet" type="text/css" href="loginstyle.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    </head>
    <body>
    <div class="container">
  <section id="content">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method = 'POST'>
      <h1>Forget</h1>
      <div>
        <input type="password" name ="password1" required="" id="password" placeholder= "new password" />
      </div>
      <div>
        <input type="password" name ="Password" required="" id="password"  placeholder= "confirm password"/>
      </div>
      <div>
        <input type="submit" value="Forget" name = "login" />
      </div>
    </form><!-- form -->
    
  </section><!-- content -->
</div>

</body>
</html>


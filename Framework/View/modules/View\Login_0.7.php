<!DOCTYPE html>

<html lang='en'>
  <head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta name='description' content=''>
    <meta name='author' content=''>
    <link rel='shortcut icon' href='../../assets/ico/favicon.ico'>
    <title>
      Narrow Jumbotron Template for Bootstrap
    </title>
    <!--
    <Bootstrap>
      core CSS 
    </Bootstrap>
    -->
    <link href='/Framework/_css/bootstrap.min.css' rel='stylesheet'>
    <!--
    <Just>
      for debugging purposes. Don't actually copy this line! 
    </Just>
    -->
    <!--[if lt IE 9]>
    <script src='../../assets/js/ie8-responsive-file-warning.js'>
    </script>
    <![endif]-->
    <!--
    <HTML5>
      shim and Respond.js IE8 support of HTML5 elements and media queries 
    </HTML5>
    -->
    <!--[if lt IE 9]>
    <script src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js'>
    </script>
    <script src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js'>
    </script>
    <![endif]-->
  </head>
  <body>
    <div class='container'>
      <form role='<?php echo $form ?>' class='form-signin col-md-4 col-md-offset-4'>
        <h2 class='form-signin-heading'>
          Please sign in
        </h2>
        <input type='email' placeholder='Login' required='' autofocus='' class='form-control'>
        <input type='password' placeholder='Password' required='' class='form-control'>
        <label class='checkbox'>
          <input type='checkbox' value='remember-me'>
        </label>
        <button type='submit' class='btn btn-lg btn-primary btn-block'>
          Sign in
        </button>
      </form>
    </div>
  </body>
</html>

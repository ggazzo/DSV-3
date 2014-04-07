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
    <style>
       body {
         min-height: 2000px;
         padding-top: 70px;
       }
    </style>
    <![endif]-->
  </head>
  <body>
    <div role='navigation' class='navbar navbar-default navbar-fixed-top'>
      <div class='container'>
        <div class='navbar-header'>
          <button type='button' data-toggle='collapse' data-target='.navbar-collapse' class='navbar-toggle'>
            <span class='sr-only'>
              Toggle navigation
            </span>
            <span class='icon-bar'>
            </span>
            <span class='icon-bar'>
            </span>
            <span class='icon-bar'>
            </span>
          </button>
          <a href='#' class='navbar-brand'>
            Project name
          </a>
        </div>
        <div class='navbar-collapse collapse'>
          <ul class='nav navbar-nav'>
            <li class='active'>
              <a href='#'>
                Home
              </a>
            </li>
            <li>
              <a href='#about'>
                About
              </a>
            </li>
            <li>
              <a href='#contact'>
                Contact
              </a>
            </li>
            <li class='dropdown'>
              <a href='#' data-toggle='dropdown' class='dropdown-toggle'>
                Dropdown
                <b class='caret'>
                </b>
              </a>
              <ul class='dropdown-menu'>
                <li>
                  <a href='#'>
                    Action
                  </a>
                </li>
                <li>
                  <a href='#'>
                    Another action
                  </a>
                </li>
                <li>
                  <a href='#'>
                    Something else here
                  </a>
                </li>
                <li class='divider'>
                </li>
                <li class='dropdown-header'>
                  Nav header
                </li>
                <li>
                  <a href='#'>
                    Separated link
                  </a>
                </li>
                <li>
                  <a href='#'>
                    One more separated link
                  </a>
                </li>
              </ul>
            </li>
          </ul>
          <ul class='nav navbar-nav navbar-right'>
            <li>
              <a href='../navbar/'>
                Default
              </a>
            </li>
            <li>
              <a href='../navbar-static-top/'>
                Static top
              </a>
            </li>
            <li class='active'>
              <a href='./'>
                Fixed top
              </a>
            </li>
          </ul>
        </div>
        <!--
        /.nav-collapse 
        -->
      </div>
    </div>
    <div class='container'>
      <?php  $this->getArea('container');
 ?>
    </div>
  </body>
</html>

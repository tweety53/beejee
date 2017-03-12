<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Awesome tasks app</a>
    </div>
    <?php
    session_start();
    if (isset($_SESSION['userData'])  && $_SESSION['userData']['success']) {
      ?>

      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav">
      <li><a>Logged as <?php echo $_SESSION['userData'][0]->name;?></a></li>
      <li><a href="/tasks/create">Create a new task</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li>
                <a href="/logout"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                        </form>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
      <?php
    }
    else{
   ?>
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/login">Login</a></li>
        <li><a href="/register">Register</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  <?php } 

  ?>
    <!-- Collect the nav links, forms, and other content for toggling -->
    
  </div><!-- /.container-fluid -->
</nav>
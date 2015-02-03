    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">S4S</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li<?php if ($page == "index") {?> class="active"<?php } ?>><a href="index.php">Home</a></li>
            <li<?php if ($page == "about") {?> class="active"<?php } ?>><a href="#about">About</a></li>
            <li<?php if ($page == "contact") {?> class="active"<?php } ?>><a href="#contact">Contact</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php
              if (empty($_SESSION['user'])) { ?>
                <li<?php if ($page == "login") {?> class="active"<?php } ?>><a href="login.php">Login</a></li>
              <?php } else { ?>
                <li>Hello, <?php echo $_SESSION["user"]["name"] ?></li>
                <li><a href="logout.php">Logout</a></li>
              <?php } ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
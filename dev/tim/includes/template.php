<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $description; ?>">
    <meta name="author" content="<?php echo $author; ?>">
    <link rel="icon" href="images/favicon.ico">

    <title><?php if (!empty($title)) echo $title; ?></title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php if (!empty($css)) echo $css; ?>
  </head>

  <body>
    <!-- header -->
    <?php include('header.php'); ?>

    <div class="container-fluid">

      <div class="template">
        <?php echo $content; ?>
      </div>

    </div><!-- /.container -->

    <!-- footer -->
    <?php include('footer.php'); ?>

    <!-- ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- jQuery -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/npm.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        if ($(".alert").length > 0)
        {
          $(".alert").fadeOut(5000);
        }
      });
    </script>
    <?php if (!empty($javascript)) echo $javascript; ?>
  </body>
</html>

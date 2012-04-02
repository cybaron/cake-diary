<!doctype html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title><?php echo $title_for_layout; ?></title>
  <?php echo $html->css('bootstrap.min'); ?>
  <?php echo $scripts_for_layout; ?>
  <style>
    body{ padding-top: 40px; }
  </style>
</head>

<body>
  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">

        <a class="brand" href="#">Cake-diary</a>

        <div class="nav-collapse">
          <ul class="nav">
            <li><?php echo $html->link('Diary', array('controller' => 'posts', 'action' => 'index')); ?> </li>
          </ul>

          <ul class="nav pull-right">
          <?php //if (empty($this->me)): ?>
            <li><?php echo $html->link('login',  array('controller' => 'users', 'action' => 'login')); ?></li>
          <?php //else: ?>
            <li><?php echo $html->link('logout', array('controller' => 'users', 'action' => 'logout')); ?></li>
          <?php //endif; ?>
          </ul>
        </div>

      </div><!--container-->
    </div><!--navbar-inner-->
  </div><!--navbar-->

<div class="container">
<?php echo $content_for_layout ?>
</div><!--container-->

<footer>
  <?php echo $this->element('sql_dump'); ?>
</footer>

<?php echo $html->script('bootstrap.min'); ?>

</body>
</html>

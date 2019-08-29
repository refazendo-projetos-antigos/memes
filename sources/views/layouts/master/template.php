<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo (isset($title)? "{$title} | ": '') . getenv('APP_NAME'); ?></title>
  <base href="<?php echo BASE; ?>">
  <link rel="shortcut icon" href="public/favicon.ico">
  <link rel="stylesheet" href="public/css/app.css">
  <?php
    if(isset($this->metas)) {
      foreach($this->metas as $meta) {
        echo "<meta {$meta}/>";
      }
    }
    if(isset($this->files['css'])) {
      foreach($this->files['css'] as $file) {
        echo "<link rel=\"stylesheet\" href=\"{$file}\" />";
      }
    }
  ?>
</head>
<body>

  <header role="header">
    <nav class="navbar">
      <div class="navbar-center">
        <div id="logo"></div>
        <div id="navbar-mobile" onclick="openMenu()">
          menu
        </div>
        <div id="links">
          <a href="/">home</a>
        </div>
      </div>
    </nav>
  </header>

  <main role="main" class="container">
    <div class="content">
      <?php include $this->content; ?>
    </div>
  </main>

  <script>
  const openMenu = function() {
    document.getElementById('links').style.display = document.getElementById('links').style.display=='block'? 'none' : 'block'
  }
  if(document.querySelector('[href^="<?php echo URI; ?>"]')!=null) {
    document.querySelector('[href^="<?php echo URI; ?>"]').classList.add('active')
  }
  </script>

  <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

  <?php
    if(isset($this->files['js'])) {
      foreach($this->files['js'] as $file) {
        echo "<script type=\"javascript\" src=\"{$file}\"></script>";
      }
    }
  ?>

</body>
</html>

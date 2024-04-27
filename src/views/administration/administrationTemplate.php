<div class="row center">
  <div class="col-sm-2">
    <?php require 'sidebar.php'; ?>
  </div>
  <div class="col-sm-8">
    <form method="POST" action="<?php echo BASE_URL; ?>/demande">
      <h3><?php echo $titre; ?></h3>
      <div class="row">
      <?php echo $content; ?>
      </div>
    </form>
  </div>
</div>
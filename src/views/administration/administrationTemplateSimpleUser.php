<div class="row center">
  <div class="col-sm-2">
    <?php require 'sidebar.php'; ?>
  </div>
  <div class="col-sm-8">
    <form method="POST" action="index.php?page=demande">
      <h3><?php echo $titre; ?></h3>
      <?php echo $content; ?>
    </form>
  </div>
</div>
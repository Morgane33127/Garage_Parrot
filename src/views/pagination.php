  <?php
$page = $_GET['page'];
  ?>
  
  <!-- Pagination -->
  <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
      <?php
      for ($k = 1; $k <= ceil($totalCount / $limit); $k++) {
        if ((isset($_GET['p']) && $_GET['p'] == $k)) {
          $active = 'active';
        } else {
          $active = '';
        }
        if ($k > 10) { ?>
          <li class="page-item"><a class="page-link" href="index.php?page=<?php echo $page; ?>&p=<?php echo $k; ?>">.</a></li>
        <?php } else { ?>
          <li class="page-item <?php if ($k == 1) {
                                  echo $active;
                                } else {
                                  echo $active;
                                } ?>"><a class="page-link" href="index.php?page=<?php echo $page; ?>&p=<?php echo $k; ?>"><?php echo $k; ?></a></li>
      <?php }
      } ?>
    </ul>
  </nav>
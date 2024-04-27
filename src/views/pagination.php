<?php
  $uri = $_SERVER['REQUEST_URI'];
  $url = baseUrl($uri);
  $back = backPage($uri);
  $next = nextPage($uri);
  $nbPage = ceil($nbResult / $limit);

  if($nbPage >= 10) {

    ?>

  <!-- Pagination -->
  <nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
      <li class="page-item"><a class="page-link" href="<?php echo $url; ?>/<?php echo $back; ?>">Back</a></li>
      <?php
      for ($k = 1; $k <=  10; $k++) {
?>
          <li class="page-item"><a class="page-link" href="<?php echo $url; ?>/<?php echo $k; ?>"><?php echo $k; ?></a></li>
      <?php }
      ?>
      <li class="page-item"><a class="page-link" href="<?php echo $url; ?>/<?php echo $next; ?>">Next</a></li>
    </ul>
  </nav>

<?php

  } else {

    ?>

    <!-- Pagination -->
    <nav aria-label="Page navigation">
      <ul class="pagination justify-content-center">
        <?php
        for ($k = 1; $k <=  $nbPage; $k++) {
  ?>
            <li class="page-item"><a class="page-link" href="<?php echo $url; ?>/<?php echo $k; ?>"><?php echo $k; ?></a></li>
        <?php }
        ?>
      </ul>
    </nav>
  
  <?php

  }
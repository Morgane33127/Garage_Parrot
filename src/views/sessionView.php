<div class="container mt-5  alert alert-<?php echo $_SESSION['alert']['type']; ?> alert-dismissible" role="alert">
    <?php echo $_SESSION['alert']['msg']; ?>
    <button type="button" name="close" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
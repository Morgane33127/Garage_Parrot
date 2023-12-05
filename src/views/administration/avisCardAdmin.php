<div class="col-sm-4">
  <div class="card-avis">
    <div class="flex">
      <b><?php echo $titre; ?></b>
      <p><small><?php echo $dt; ?></small></p>
      <div>
        <button type="submit" name="accept<?php echo $row->getId(); ?>"><i class="bi-check-circle-fill" style="color:green;"></i> </button>
        <button type="submit" name="refuse<?php echo $row->getId(); ?>"> <i class="bi-x-circle-fill" style="color:red;"></i> </button>

      </div>
    </div>
    <p style="color: #EDDB35;"><?php echo $star; ?></p>
    <p><?php echo $comment; ?></p>
    <p><?php echo $visiteur; ?></p>
  </div>
</div>
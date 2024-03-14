<div class="col-sm-4">
  <div class="card-avis">
  <div class="row mb-2">
  <div class="col-9"></div>
  <div class="col-1">
        <button class="button-action ok-button" type="submit" name="accept<?php echo $row->getId(); ?>"><i class="bi-check-circle-fill"></i> </button>
      </div>
      <div class="col-1">
        <button class="button-action trash-button" type="submit" name="refuse<?php echo $row->getId(); ?>"> <i class="bi-x-circle-fill"></i> </button>
      </div>
  </div>
    <div class="row head-review">
    <div class="col-6"><?php echo $visiteur; ?></div>
      <div class="col-6" style="text-align:end"><?php echo $dt; ?></div>
    </div>
    <div class="row notation-review">
      <div class="col-6"><?php echo $titre; ?></div>
      <div class="col-6 star" style="text-align:end;"><?php echo $star; ?></div>
    </div>
    <div>
      <p><?php echo $comment; ?></p>
    </div>
  </div>
</div>

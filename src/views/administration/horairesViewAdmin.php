<div class="row align-items-start">
    <div class="col">
        <input type="hidden" class="form-control" name="id<?php echo  $k; ?>" id="id<?php echo  $k; ?>" value="<?php echo  $row->getIdHeure(); ?>">
        <input type="text" class="form-control" name="jour<?php echo  $k; ?>" id="jour<?php echo  $k; ?>" value="<?php echo  $jour; ?>">
    </div>
    <div class="col">
        <input type="text" class="form-control" name="hrdebut<?php echo $k; ?>" id="hrdebut<?php echo $k; ?>" value="<?php echo $hr_debut; ?>">
    </div>
    <div class="col">
        <input type="text" class="form-control" name="hrfin<?php echo $k; ?>" id="hrfin<?php echo $k; ?>" value="<?php echo $hr_fin; ?>">
    </div>
</div>
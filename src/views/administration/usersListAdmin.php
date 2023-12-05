<tr>
  <td><?php echo $infos; ?><input type="hidden" name="idsuser<?php echo $j; ?>" value="<?php echo $row->getId(); ?>"></td>
  <td><?php echo $role; ?></td>
  <td><?php echo $mail; ?></td>
  <td><button type="submit" class="button" name="suppUser<?php echo $j; ?>">Supprimer</button></td>
</tr>
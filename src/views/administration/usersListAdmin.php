<form method="POST" action="<?php echo BASE_URL; ?>/demande">
  <table class="table">
    <tr>
      <th class="text-left" width="30%">Nom Prenom</th>
      <th class="text-left" width="10%">Role</th>
      <th class="text-left" width="50%">Mail</th>
      <th class="text-left" width="10%">Action</th>
    </tr>
    <tr>
      <td class="text-left" width="30%"><?php echo $infos; ?><input type="hidden" name="idsuser<?php echo $j; ?>" value="<?php echo $row->getId(); ?>"></td>
      <td class="text-left" width="10%"><?php echo $role; ?></td>
      <td class="text-left" width="50%"><?php echo $mail; ?></td>
      <td class="text-left" width="10%"><button type="submit" class="button" name="suppUser<?php echo $j; ?>">Supprimer</button></td>
    </tr>
  </table>
</form>
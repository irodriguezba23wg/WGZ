<?php require 'views/layout/header.php'; ?>
<h2>Asignar Jabea a Kotxea</h2>

<form method="POST" action="/index.php?action=assignOwnerAction">
    <label for="kotxe_id">Kotxea:</label>
    <select name="kotxe_id" required>
        <option value="">Aukeratu kotxea</option>
        <?php foreach ($kotxeak as $kotxea): ?>
            <option value="<?= $kotxea['id'] ?>"><?= $kotxea['matrikula'] ?></option>
        <?php endforeach; ?>
    </select>
    
    <label for="jabea_id">Jabea:</label>
    <select name="jabea_id" required>
        <option value="">Aukeratu jabea</option>
        <?php foreach ($jabeak as $jabea): ?>
            <option value="<?= $jabea['id'] ?>"><?= $jabea['izena'] ?></option>
        <?php endforeach; ?>
    </select>
    
    <button type="submit">Asignatu</button>
</form>

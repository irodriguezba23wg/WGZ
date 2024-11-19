<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kotxeak eta Jabeak</title>
</head>
<body>
    <h1>Kotxeen Lista</h1>

    <?php if (!empty($kotxeak)): ?>
        <?php foreach ($kotxeak as $kotxea): ?>
            <form method="GET" action="../public/JabeaIdAldatu.php">
            <ul>
                <!-- Campo oculto para kotxe_id siempre presente -->
                <input type="hidden" name="kotxe_id" value="<?= htmlspecialchars($kotxea['id']) ?>">

                <li>ID Kotxe: <?= htmlspecialchars($kotxea['id']) ?></li>
                
                <?php if ($kotxea['jabea_id'] != NULL): ?>
                    <li>ID Jabea: <?= htmlspecialchars($kotxea['jabea_id']) ?></li>
                    <button formaction="borratuJabea.php">Borratu Jabea</button>
                <?php else: ?>
                    <li>
                        <label style="color: red;">Ez dauka jaberik, Autatu bat:</label>
                        <select name="jabea_id">
                            <?php if (!empty($jabeak)): ?>
                                <?php foreach ($jabeak as $jabea): ?>
                                    <option value="<?= htmlspecialchars($jabea['id']) ?>">
                                        <?= htmlspecialchars($jabea['izena']) ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option>No hay datos disponibles</option>
                            <?php endif; ?>
                        </select>
                    </li>
                    <!-- Botón para enviar los datos -->
                    <li>
                        <button type="submit">Sartu Jabea</button>
                    </li>
                <?php endif; ?>

                <li>Matrikula: <?= htmlspecialchars($kotxea['matrikula']) ?></li>
                <li>Matrikulazio Data: <?= htmlspecialchars($kotxea['matrikulazio_data']) ?></li>
                <li>ITV: <?= htmlspecialchars($kotxea['itv']) ?></li>
            </ul>
            <button formaction="Kotxeadelete.php">Kotxea Ezabatu</button>
            </form>
            <hr>
        <?php endforeach; ?>
    <?php endif; ?>

    <h1>Kotxe berri bat sartu</h1>
    <form method="POST" action="insertKotxe.php">
        <label>Jabea:</label>
        <select name="jabea_id">
            <option value="NULL">Ez dauka jaberik</option>
            <?php if (!empty($jabeak)): ?>
                <?php foreach ($jabeak as $jabea): ?>
                    <option value="<?= htmlspecialchars($jabea['id']) ?>">
                        <?= htmlspecialchars($jabea['izena']) ?>
                    </option>
                <?php endforeach; ?>
            <?php else: ?>
                <option>No hay datos disponibles</option>
            <?php endif; ?>
        </select>

        <label>Matrikula:</label>
        <input type="text" name="matrikula" minlength="7" required>

        <label>Matrikulazio Data:</label>
        <input type="date" name="matrikula_data" required>

        <label>ITV:</label>
        <select name="itv">
            <option value="1">Bai</option>
            <option value="0">Ez</option>
        </select>

        <button type="submit">Gorde Kotxea</button>
    </form>
</body>
</html>

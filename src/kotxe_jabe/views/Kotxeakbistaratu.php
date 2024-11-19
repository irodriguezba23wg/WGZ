<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Kotxeen Lista</h1>
    <?php if (!empty($lista)): ?>
        <?php foreach ($lista as $fila): ?>
            <form method="GET" action="../public/JabeaIdAldatu.php">
            <ul>
                <!-- Campo oculto para kotxe_id siempre presente -->
                <input type="hidden" name="kotxe_id" value="<?= htmlspecialchars($fila['id']) ?>">

                <li>ID Kotxe: <?= htmlspecialchars($fila['id']) ?></li>
                <?php if ($fila['jabea_id'] != NULL): ?>
                    <li>ID Jabea: <?= htmlspecialchars($fila['jabea_id']) ?></li><button formaction="borratuJabea.php">Borratu Jabea</button>
                <?php else: ?>
                    <li>
                        <label style="color: red;">Ez dauka jaberik, Autatu bat:</label>
                        <select name="jabea_id">
                            <?php if (!empty($listaJabe)): ?>
                                <?php foreach ($listaJabe as $filaJabe): ?>
                                    <option value="<?= htmlspecialchars($filaJabe['id']) ?>">
                                        <?= htmlspecialchars($filaJabe['izena']) ?>
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
                <li>Matrikula: <?= htmlspecialchars($fila['matrikula']) ?></li>
                <li>Matrikulazio Data: <?= htmlspecialchars($fila['matrikulazio_data']) ?></li>
                <li>ITV: <?= htmlspecialchars($fila['itv']) ?></li>
            </ul>
            <button formaction="Kotxeadelete.php">Kotxea Ezabatu</button>
            </form>
            <hr>
        <?php endforeach; ?>
    <?php endif; ?>
    <H1>Kotxe berri bat sartu</H1>
    <form method="GET">
        <label>Jabea:</label>
        <select name="jabea">
            <option value="NULL">Ez dauka jaberik</option>
            <?php if (!empty($listaJabe)): ?>
                <?php foreach ($listaJabe as $filaJabe): ?>
                    <option value="<?= htmlspecialchars($filaJabe['id']) ?>">
                        <?= htmlspecialchars($filaJabe['izena']) ?>
                    </option>
                <?php endforeach; ?>
            <?php else: ?>
                <option>No hay datos disponibles</option>
            <?php endif; ?>
        </select>
        <label>Matrikula:</label>
        <input type="text" name="matrikula" value="" minlength="7">
        <label>Matrikulazio Data:</label>
        <input type="text" name="matrikula_data" value="">
        <label>ITV:</label>
        <select name="itv">
            <option value="1">Bai</option>
            <option value="0">Ez</option>
        </select>
    </form>
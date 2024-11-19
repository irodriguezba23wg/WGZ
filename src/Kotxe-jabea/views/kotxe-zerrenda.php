<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Kotxe zerrenda</h2>

    <?php 
        foreach ($kotxeak as $kotxe) {?>
            
            <form method="GET">
                <input type="hidden" name="id" value="<?php echo $kotxe["id"] ?>"/>
                Matrikula: <?php echo $kotxe['matrikula'] ?>
                --- Jabea:
                <select name="jabea_id">
                <?php 
                $jaberik_badu = false;
                foreach ($jabeak as $jabea) {
                    if ($kotxe["jabea_id"] == $jabea["id"]) {
                        echo "<option value=" . $jabea["id"] . " selected>" . $jabea["izena"] . "</option>";
                        $jaberik_badu = true;
                    } else {
                        echo "<option value=" . $jabea["id"] . " >" . $jabea["izena"] . "</option>";
                    }
                }
                // jabea hutsik egon daiteke
                if ($jaberik_badu) {
                    echo "<option value=NULL>jaberik gabe</option>";
                } else {
                    echo "<option value=NULL selected>jaberik gabe</option>";
                }
                
                ?>
                </select>
                
                <button type="submit" formaction="kotxearen-jabea-aldatu.php">Aldatu</button>
            </form>
            <hr>
        <?php } ?>
</body>
</html>
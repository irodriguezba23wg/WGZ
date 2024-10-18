<?php
include 'db.php';


$erabiltzailea = isset($_GET['erabiltzailea']) ? htmlspecialchars($_GET['erabiltzailea']) : 'Gonbidatua';


$mezua = "";


$pelikulen_arraya = [];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $izena = trim($_POST['izena']);
    $isan = trim($_POST['isan']);
    $urtea = trim($_POST['urtea']);
    $puntuazioa = isset($_POST['puntuazioa']) ? intval($_POST['puntuazioa']) : null;

    if ($izena === "" && $isan !== "") {
      
        $stmt = $conn->prepare("DELETE FROM filmak WHERE isan = ?");
        $stmt->execute([$isan]);
        $mezua = "Filma ondo ezabatu da.";
    } elseif ($izena !== "" && $isan === "") {
        
        $stmt = $conn->prepare("SELECT * FROM filmak WHERE LOWER(izena) LIKE LOWER(?)");
        $stmt->execute(['%' . $izena . '%']);
        $emaitzak = $stmt->fetchAll();
    } elseif ($izena !== "" && $isan !== "") {
        
        $stmt = $conn->prepare("SELECT * FROM filmak WHERE isan = ?");
        $stmt->execute([$isan]);
        $pelikula = $stmt->fetch();

        if ($pelikula) {
            
            $stmt = $conn->prepare("UPDATE filmak SET izena = ?, puntuazioa = ? WHERE isan = ?");
            $stmt->execute([$izena, $puntuazioa, $isan]);
            $mezua = "Filma eguneratu da.";
        } else {
            
            $stmt = $conn->prepare("INSERT INTO filmak (izena, isan, urtea, puntuazioa) VALUES (?, ?, ?, ?)");
            $stmt->execute([$izena, $isan, $urtea, $puntuazioa]);
            $mezua = "Filma ondo gehitu da.";
        }
    } else {
        $mezua = "Mesedez, bete beharrezko eremuak.";
    }
}


$stmt = $conn->query("SELECT * FROM filmak");
$filmak = $stmt->fetchAll();


$puntuazio_total = 0;
foreach ($filmak as $filma) {
    $puntuazio_total += $filma['puntuazioa'];
}


$stmt = $conn->query("SELECT * FROM filmak ORDER BY puntuazioa DESC");
$filmak_ordered = $stmt->fetchAll();


if (isset($_POST['izena']) && $_POST['izena'] !== "") {
    $pelikulen_arraya[] = [
        'izena' => $_POST['izena'],
        'urtea' => $_POST['urtea'],
        'puntuazioa' => $_POST['puntuazioa']
    ];
}
?>

<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOP Filmak - <?php echo htmlspecialchars($erabiltzailea); ?></title>
    <link rel="stylesheet" href="index.css">
    <style>
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        .sidebar {
            margin-top: 20px; 
        }
        .sidebar-button {
            display: block;
            margin-bottom: 10px;
            padding: 10px 20px;
            background-color: #4CAF50; 
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .sidebar-button:hover {
            background-color: #45a049; 
        }
        
        .caratula {
            display: inline-block;
            width: 150px;
            height: 200px;
            margin: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
            position: relative;
            text-align: center;
            vertical-align: top;
        }
        .caratula img {
            width: 100%;
            height: 100%;
            object-fit: cover; 
        }
        .caratula h3 {
            position: absolute;
            bottom: 5px;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            margin: 0;
            padding: 5px 0;
        }
    </style>
</head>
<body>
    <header>
        <h1><?php echo htmlspecialchars($erabiltzailea); ?>-ren filmak:</h1>
    </header>

    <main>
        <section class="formulario">
            <h2>Filma gehitu edo eguneratu</h2>
            <form action="index.php?erabiltzailea=<?php echo urlencode($erabiltzailea); ?>" method="post">
                <input type="text" name="izena" placeholder="Filmaren izena" required>
                <input type="text" name="isan" placeholder="ISAN (8 digituz)" required>
                <input type="text" name="urtea" placeholder="Urtea" required>
                <select name="puntuazioa" required>
                    <option value="">Puntuazioa</option>
                    <?php for ($i = 0; $i <= 5; $i++): ?>
                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                    <?php endfor; ?>
                </select>
                <button type="submit">Bidali</button>
            </form>
            <p><?php echo $mezua; ?></p>
        </section>

        <aside class="sidebar">
            <button onclick="location.href='login.php'" class="sidebar-button">Log Out</button>
            <button onclick="alert('Puntuazio Totala: <?php echo $puntuazio_total; ?>')" class="sidebar-button">Puntuazio Totala</button>
        </aside>

        
        <section class="tabla-peliculas">
            <h2>Filmak Puntuazioaren Araberako Ordena</h2>
            <table>
                <thead>
                    <tr>
                        <th>Filmaren Izen</th>
                        <th>Urtea</th>
                        <th>Puntuazioa</th>
                        <th>ISAN</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($filmak_ordered as $filma): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($filma['izena']); ?></td>
                            <td><?php echo htmlspecialchars($filma['urtea']); ?></td>
                            <td><?php echo htmlspecialchars($filma['puntuazioa']); ?></td>
                            <td><?php echo htmlspecialchars($filma['isan']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>

        
        <section class="caratulas">
            <h2>Pelikula Gehituak</h2>
            <?php if (!empty($pelikulen_arraya)): ?>
                <?php foreach ($pelikulen_arraya as $pelikula): ?>
                    <div class="caratula">
                        <img src=""<?php echo urlencode($pelikula['izena']); ?>" alt="<?php echo htmlspecialchars($pelikula['izena']); ?>">
                        <h3><?php echo htmlspecialchars($pelikula['izena']); ?> (<?php echo htmlspecialchars($pelikula['urtea']); ?>)</h3>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </section>
    </main>
</body>
</

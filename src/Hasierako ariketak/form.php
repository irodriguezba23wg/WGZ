<?php
// Datuak balidatzeko funtzioa
function validateInput($data) {
    $errors = [];
    
    // Izena balidatu
    if (empty($data['name'])) {
        $errors[] = "Izena beharrezkoa da.";
    } else {
        $data['name'] = htmlspecialchars(trim($data['name']));
    }

    // Email-a balidatu
    if (empty($data['email'])) {
        $errors[] = "Email-a beharrezkoa da.";
    } else {
        $data['email'] = filter_var(trim($data['email']), FILTER_VALIDATE_EMAIL);
        if (!$data['email']) {
            $errors[] = "Email-a ez da baliodun.";
        }
    }

    // Pasahitza balidatu
    if (empty($data['password'])) {
        $errors[] = "Pasahitza beharrezkoa da.";
    } else {
        $data['password'] = htmlspecialchars(trim($data['password']));
    }

    // Generoa balidatu
    if (empty($data['gender'])) {
        $errors[] = "Genero-a beharrezkoa da.";
    } else {
        $data['gender'] = htmlspecialchars(trim($data['gender']));
    }

    // Hobby-ak balidatu
    if (empty($data['hobbies'])) {
        $errors[] = "Hobby bat aukeratu behar duzu.";
    } else {
        $data['hobbies'] = $data['hobbies'];
    }

    // Mezua balidatu
    if (empty($data['message'])) {
        $data['message'] = "";
    } else {
        $data['message'] = htmlspecialchars(trim($data['message']));
    }

    // Fitxategia kargatu
    if (isset($data['file']) && $data['file']['error'] == 0) {
        $file = $data['file'];
        // Fitxategiaren balidazioa hemen egin dezakezu
    }

    return [$data, $errors];
}

// POST eskaria bada, formularioa prozesatu
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    list($validatedData, $errors) = validateInput($_POST);

    // Erroreak inprimatu
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p style='color:red;'>$error</p>";
        }
    } else {
        // Datuak ondo balidatu badira, hemen prozesatu
        echo "<h2>Datuak ondo jaso dira!</h2>";
        echo "<p>Izena: {$validatedData['name']}</p>";
        echo "<p>Email: {$validatedData['email']}</p>";
        echo "<p>Genero-a: {$validatedData['gender']}</p>";
        echo "<p>Hobby-ak: " . implode(", ", $validatedData['hobbies']) . "</p>";
        echo "<p>Mezua: {$validatedData['message']}</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularioa eta Balidazioa</title>
</head>
<body>
    <h1>Formularioa</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        <label for="name">Izena:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email-a:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Pasahitza:</label>
        <input type="password" id="password" name="password" required>

        <label>Genero-a:</label>
        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Gizona</label>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Emakumea</label>

        <label for="hobbies">Hobby-ak (aukera anitz):</label>
        <select id="hobbies" name="hobbies[]" multiple>
            <option value="irakurri">Irakurri</option>
            <option value="idatzi">Idatzi</option>
            <option value="musika">Musika</option>
        </select>

        <label for="message">Mezua:</label>
        <textarea id="message" name="message" rows="4"></textarea>

        <label for="file">Fitxategia kargatu:</label>
        <input type="file" id="file" name="file">

        <input type="submit" value="Bidali">
    </form>
</body>
</html>

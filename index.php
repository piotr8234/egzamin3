<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'egzamin3';

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Błąd połączenia z bazą danych: " . mysqli_connect_error());
}

$sql = "SELECT dataWyjazdu, cel, cena FROM wycieczki WHERE dostepna = 1";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona do bazy</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Wycieczki:</h1>
    <table>
        <tr>
            <th class="datawyjazdu">Data wyjazdu</th>
            <th class="cel">Cel</th>
            <th class="cena">Cena</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . ($row['dataWyjazdu']) . "</td>";
                echo "<td>" . ($row['cel']) . "</td>";
                echo "<td>" . ($row['cena']) . " zł</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>

<?php
mysqli_close($conn);
?>

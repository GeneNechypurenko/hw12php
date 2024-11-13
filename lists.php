<?php
$dsn = 'mysql:host=localhost;dbname=CountiesCitiesApiDb';
$username = 'root';
$password = '';

$pdo = new PDO($dsn, $username, $password);

$statement = $pdo->query("SELECT * FROM Countries");
$countries = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Список стран и городов</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        $(document).ready(function() {
            $('#countrySelect').change(function() {
                var countryId = $(this).val();
                if (countryId != '') {
                    $.ajax({
                        url: 'get_cities.php',
                        method: 'POST',
                        data: {countryid: countryId},
                        success: function(response) {
                            $('#cities').html(response);
                        }
                    });
                }
            });
        });
    </script>
</head>
<body>

<h1>Select country</h1>
<select id="countrySelect">
    <option value="">select country</option>
    <?php foreach ($countries as $country): ?>
        <option value="<?= $country['id'] ?>"><?= $country['country'] ?></option>
    <?php endforeach; ?>
</select>

<h2>cities:</h2>
<p id="cities"></p>

</body>
</html>

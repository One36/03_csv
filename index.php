<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PHP - 03 CSV</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/styles.css" rel="stylesheet" type="text/css"/>
        <script src="assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/js/main.js" type="text/javascript"></script>
    </head>
    <body>
        <h1 class="table">PHP - CSV einlesen</h1>
        <div class="container">

            <?php
            $handle = false;
            $filename = 'articles.csv';
            $folder = './import/';

            if (file_exists($folder . $filename)) {

                $handle = fopen($folder . $filename, "r");

                $columnNames = fgetcsv($handle, 0, ';');

                $rows = [];
                while ($row = fgetcsv($handle, 0, ';')) {
                    $rows[] = $row;
                }
            }
            ?>

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <!-- Spalten-Bezeichnung / Überschrift -->
                        <th><?php echo $columnNames[3]; ?></th>
                        <th><?php echo $columnNames[5]; ?></th>
                        <th><?php echo $columnNames[11]; ?></th>
                        <th><?php echo $columnNames[14]; ?></th>
                        <th><?php echo $columnNames[15]; ?></th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Schleife Anfang Rows -->
                    <?php foreach ($rows as $product) : ?>
                    <tr>
                        <td><?php echo $product[3]; ?></td>
                        <td><?php echo $product[5]; ?></td>
                        <td><?php echo $product[11]; ?></td>
                        <td><?php echo $product[14]; ?></td>
                        <td><?php echo $product[15]; ?></td>
                    </tr>
                    <?php endforeach; ?>
                    <!-- Schleife Ende Rows -->
                </tbody>
            </table>


        </div>
        <hr>
        <pre>
            <?php
//            var_dump($row2);
//            print_r($rows);
            ?>
        </pre>
    </body>
</html>
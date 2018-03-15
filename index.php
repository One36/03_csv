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
        <div class="container">
        <h1 class="table">PHP - CSV Datei einlesen</h1>
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
            <h3>Einzelne Felder ausgeben</h3>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                         <!--Spalten-Bezeichnung / Überschrift--> 
                        <th><?php echo $columnNames[3]; ?></th>
                        <th><?php echo $columnNames[5]; ?></th>
                        <th><?php echo $columnNames[6]; ?></th>
                        <th><?php echo $columnNames[11]; ?></th>
                        <th><?php echo $columnNames[14]; ?></th>
                        <th><?php echo $columnNames[15]; ?></th>
                    </tr>
                </thead>
                <tbody>
                     <!--Schleife Anfang Rows--> 
                    <?php foreach ($rows as $product) : ?>
                    <tr>
                        <td><?php echo $product[3]; ?></td>
                        <td><?php echo $product[5]; ?></td>
                        <td><?php echo $product[6]; ?></td>
                        <td><?php echo $product[11]; ?></td>
                        <td><?php echo $product[14]; ?></td>
                        <td><?php echo $product[15]; ?></td>
                    </tr>
                    <?php endforeach; ?>
                     <!--Schleife Ende Rows--> 
                </tbody>
            </table>
            
            <hr>
            <h3>Komplette CSV Datei ausgeben</h3>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <!-- Spalten-Bezeichnung / Überschrift -->
                        <?php for ($i = 0; $i < count($columnNames); $i++) : ?>
                            <th><?php echo $columnNames[$i]; ?></th>
                        <?php endfor; ?>
                    </tr>
                </thead>
                <tbody>
                    <!-- Schleife Anfang Rows -->
                    <?php foreach ($rows as $products) : ?>
                    <tr>
                        <?php for ($i = 0; $i < count($products); $i++) : ?>
                            <td><?php echo $products[$i]; ?></td>
                        <?php endfor; ?>
                        
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
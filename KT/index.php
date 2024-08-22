<!--
               KT
              toomas
              18/08/24
-->

<?php
include ("C:/xampp/htdocs/php/KT/config.php");
session_start();
?>

<!DOCTYPE html>
<html lang="et">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontrolltöö</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <style>
        th, td {
            border: 1px solid lightgrey;
            padding: 0.75rem;
            text-align: left;
        }
        .otsing {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
<div class="container mt-4" style="border: 1px solid black; padding: 1.5rem;">
        <div class="otsing">
            <h3>Valige asutus mida hinnata</h3>
            <form method="get" class="search-form">
                <div class="input-group">
                    <input type="text" class="form-control" name="otsi" id="otsi" placeholder="Search" aria-label="Search" value="<?php echo htmlspecialchars(isset($_GET['otsi']) ? $_GET['otsi'] : ''); ?>">
                    <button type="submit" class="btn btn-outline-secondary">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-striped">
            <thead>
                    <tr>
                        <th style="width: 30%; position: relative; padding-right: 50px;">
                            Nimi
                            <a href="?sort=nimi&order=asc&otsi=<?php echo urlencode(isset($_GET['otsi']) ? $_GET['otsi'] : ''); ?>" style="position: absolute; right: 30px; text-decoration: none;">🡡</a>
                            <a href="?sort=nimi&order=desc&otsi=<?php echo urlencode(isset($_GET['otsi']) ? $_GET['otsi'] : ''); ?>" style="position: absolute; right: 10px; text-decoration: none;">🡣</a>
                        </th>
                        <th style="width: 20%; position: relative; padding-right: 50px;">
                            Asukoht
                            <a href="?sort=asukoht&order=asc&otsi=<?php echo urlencode(isset($_GET['otsi']) ? $_GET['otsi'] : ''); ?>" style="position: absolute; right: 30px; text-decoration: none;">🡡</a>
                            <a href="?sort=asukoht&order=desc&otsi=<?php echo urlencode(isset($_GET['otsi']) ? $_GET['otsi'] : ''); ?>" style="position: absolute; right: 10px; text-decoration: none;">🡣</a>
                        </th>
                        <th style="width: 19%; position: relative; padding-right: 50px;">
                            Keskmine hinne
                            <a href="?sort=hinnekesk&order=desc&otsi=<?php echo urlencode(isset($_GET['otsi']) ? $_GET['otsi'] : ''); ?>" style="position: absolute; right: 30px; text-decoration: none;">🡡</a>
                            <a href="?sort=hinnekesk&order=asc&otsi=<?php echo urlencode(isset($_GET['otsi']) ? $_GET['otsi'] : ''); ?>" style="position: absolute; right: 10px; text-decoration: none;">🡣</a>
                        </th>
                        <th style="width: 19%; position: relative; padding-right: 50px;">
                            Hinnangute arv
                            <a href="?sort=hinnearv&order=desc&otsi=<?php echo urlencode(isset($_GET['otsi']) ? $_GET['otsi'] : ''); ?>" style="position: absolute; right: 30px; text-decoration: none;">🡡</a>
                            <a href="?sort=hinnearv&order=asc&otsi=<?php echo urlencode(isset($_GET['otsi']) ? $_GET['otsi'] : ''); ?>" style="position: absolute; right: 10px; text-decoration: none;">🡣</a>
                        </th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php
                    $lkarv = 10;
                    $lehekulg = isset($_GET['lehekulg']) ? (int)$_GET['lehekulg'] : 1;
                    $start = ($lehekulg - 1) * $lkarv;
                    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'nimi';
                    $order = isset($_GET['order']) ? $_GET['order'] : 'asc';
                    $otsi = isset($_GET['otsi']) ? $uhendus->real_escape_string($_GET['otsi']) : '';
                    $sql_otsi = $otsi ? "WHERE nimi LIKE '%$otsi%'" : '';
                    $sql_count = "SELECT COUNT(*) as total FROM kohad $sql_otsi";
                    $count_result = $uhendus->query($sql_count);
                    $kokku_lk = $count_result->fetch_assoc()['total'];
                    $eel_lk = $lehekulg - 1;
                    $jarg_lk = $lehekulg + 1;
                    $query = http_build_query(array(
                        'sort' => $sort,
                        'order' => $order,
                        'otsi' => $otsi
                    ));
                    $sql_kohad = "SELECT * FROM kohad $sql_otsi ORDER BY $sort $order LIMIT $start, $lkarv";
                    $result = $uhendus->query($sql_kohad);

                    if (!$result) {
                        die("Query failed: " . $uhendus->error);
                    }

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['id'];

                            $HinnanguteArvQuery = "SELECT COUNT(*) as hinnearv FROM hinnangud WHERE koht_id = '$id'";
                            $HinnanguteResult = $uhendus->query($HinnanguteArvQuery);
                            if (!$HinnanguteResult) {
                                die("Query failed: " . $uhendus->error);
                            }
                            $HinnanguteArv = $HinnanguteResult->fetch_assoc()['hinnearv'];

                            $keskmineHinneQuery = "SELECT AVG(hinnang) as hinnekesk FROM hinnangud WHERE koht_id = '$id'";
                            $keskmineHinneResult = $uhendus->query($keskmineHinneQuery);
                            if (!$keskmineHinneResult) {
                                die("Query failed: " . $uhendus->error);
                            }
                            $keskmineHinne = $keskmineHinneResult->fetch_assoc()['hinnekesk'];
                            $YkeskmineHinne = round($keskmineHinne, 1);

                            $lisamiseParing = "UPDATE kohad SET hinnekesk = '$YkeskmineHinne', hinnearv = '$HinnanguteArv' WHERE id = '$id'";
                            $lisamiseTulemus = $uhendus->query($lisamiseParing);
                            if (!$lisamiseTulemus) {
                                die("Query failed: " . $uhendus->error);
                            }
                            ?>
                            <tr>
                                <td><a href="uus_hinnang.php?koht=<?php echo urlencode($id); ?>"><?php echo htmlspecialchars($row["nimi"]); ?></a></td>
                                <td><?php echo htmlspecialchars($row["asukoht"]); ?></td>
                                <td><?php echo round($keskmineHinne, 1); ?></td>
                                <td><?php echo $HinnanguteArv; ?></td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='4'>Pole andmeid</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <a href="admin/login" class="btn btn-success">Logi sisse</a>
        <div style="float: right;">
            <a href='?<?php echo http_build_query(array_merge($_GET, ['lehekulg' => $eel_lk])); ?>' class="btn btn-secondary <?php echo $eel_lk > 0 ? '' : 'disabled'; ?>">Eelmine</a>  
            <a href='?<?php echo http_build_query(array_merge($_GET, ['lehekulg' => $jarg_lk])); ?>' class="btn btn-secondary <?php echo ($start + $lkarv) < $kokku_lk ? '' : 'disabled'; ?>">Järgmine</a>
        </div>
        <br>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVZtAtG6j/mrRzJ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-pprn4/4tP1dT/K5Gjq7z5DQ6/XOFRkLRISzFJdJz7z/kS3Jj4H76sSf5PB2x2eT" crossorigin="anonymous"></script>
</body>
</html>

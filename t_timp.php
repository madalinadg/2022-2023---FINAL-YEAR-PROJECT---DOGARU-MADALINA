<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
}

?>

<?php
$conn = mysqli_connect("localhost", "root", "", "csv");

$importMessage = ""; // Variabila pentru mesajul de importare CSV

if(isset($_POST["import"])){
    $fileName = $_FILES["file"]["tmp_name"];

    if($_FILES["file"]["size"] > 0){
        $file = fopen($fileName, "r");

        while(($column = fgetcsv($file, 10000, ",")) !== FALSE){
            $sqlInsert = "Insert into timp (nr_util, eveniment, clicks, pagini, durata, dispozitiv, rezolutie, locatie) values ('" . $column[0] . "', '" . $column[1] . "', '" . $column[2] . "', '" . $column[3] . "', '" . $column[4] . "', '" . $column[5] . "', '" . $column[6] . "', '" . $column[7] . "')";
        
            $result = mysqli_query($conn, $sqlInsert);

            if(!empty($result)){
                echo "Date CSV importate in baza de date";
            }else{
                echo "Problema cu importarea csv-ului";
            }
        
        }

    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="style-dsh.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <!-- sidebard -->
    <section id="sidebar">
        <a href="dashboard.php" class="brand"><img src="assets/logo.png" alt="Logo">MM Beauty Boutique</a>
        <ul class="side-menu">
            <li>
                <a href="dashboard.php"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>
            <li class="divider">Chestionare</li>
            <li>
                <a href="#"><i class='bx bxs-inbox icon'></i> Rezultate chestionare <i class='bx bx-chevron-right icon-right'></i></a>
                <ul class="side-dropdown">
                    <li><a href="#">Chestionar general</a></li>
                    <li><a href="#">Neuroscience</a></li>
                    <li><a href="#">Procese cognitive</a></li>
                    <li><a href="#">User experience</a></li>
                </ul>
            </li>
            
            <li class="divider">Teste</li>
            <li>
                <a href="#" class="active"><i class='bx bxs-notepad icon'></i> Testarea utilizatorilor <i class='bx bx-chevron-right icon-right'></i></a>
                <ul class="side-dropdown">
                    <li><a href="#">A/B testing</a></li>
                    <li><a href="#">Timpul pe site</a></li>
                    <li><a href="#">Heatmaps</a></li>
                    <li><a href="#">Eyetracking</a></li>
                </ul>
            </li>
        </ul>
        <div class="ads">
            <div class="wrapper">
                <a href="#" class="btn-upgrade">adaugă csv</a>
                <p>Adaugă <span>testele realizate</span> pe utilizatori</p>
            </div>
        </div>
    </section>

    <!-- navbar -->
    <section id="content">
        <nav>
            <div class="profile">
            <h1>Bun venit <span><?php echo $_SESSION['admin_name'] ?></span></h1>
            <span class="divider"></span>
                <ul class="profile-link">
                    <li><a href="logout.php"><i class='bx bxs-log-out-circle icon' ></i> Logout</a></li>
                </ul>
            </div>
        </nav>

        
    <!-- main -->
        <main>
        <h1 class="title">Timpul pe site al utilizatorilor</h1>
        <ul class="breadcrumbs">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li class="divider">/</li>
            <li><a href="#" class="active">Timp pe site</a></li>
        </ul>

     <!-- content -->
        <form class="form-horizontal" action="" method="post" name="uploadCsv" enctype="multipart/form-data">
        <div>
            <label>Alege fisierul CSV</label>
            <input type="file" name="file" accept=".csv">
            <button type="submit" name="import">Import</button>
        </div>
        </form>

        <?php
            // Afisarea mesajului de importare a CSV-ului
            if (!empty($importMessage)) {
                echo '<p>' . $importMessage . '</p>';
            }
        ?>
        <?php
    // display upload data
        $sqlSelect = "SELECT * from timp";

        $result = mysqli_query($conn, $sqlSelect);

        if(mysqli_num_rows($result)>0){
            ?>
            <table>
                <thead>
                    <tr>
                        <th class="narrow nr">Nr</th>
                        <th class="narrow">Eveniment</th>
                        <th class="narrow">Clicks</th>
                        <th class="narrow">Pagini</th>
                        <th class="narrow">Durata</th>
                        <th class="narrow">Dispozitiv</th>
                        <th class="narrow">Rezolutie</th>
                        <th class="narrow">Locatie</th>
                    </tr>
                </thead>

                <?php
                while ($row = mysqli_fetch_array($result)){

                ?>
                <tbody>
                    <tr>
                        <td class="narrow"><?php echo $row['nr_util'];?></td>
                        <td class="narrow"><?php echo $row['eveniment'];?></td>
                        <td class="narrow"><?php echo $row['clicks'];?></td>
                        <td class="narrow"><?php echo $row['pagini'];?></td>
                        <td class="narrow"><?php echo $row['durata'];?></td>
                        <td class="narrow"><?php echo $row['dispozitiv'];?></td>
                        <td class="narrow"><?php echo $row['rezolutie'];?></td>
                        <td class="narrow"><?php echo $row['locatie'];?></td>
                    </tr>
                </tbody>
                
                <?php } ?>

            </table>

        <?php }
        ?>

        </main>

    </section>


    



    <script src="script.js"></script>

</body>
</html>
<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
    header('location:login_form.php');
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
                <a href="dashboard.php" class="active"><i class='bx bxs-dashboard icon'></i> Dashboard</a></li>
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
                <a href="#"><i class='bx bxs-notepad icon'></i> Testarea utilizatorilor <i class='bx bx-chevron-right icon-right'></i></a>
                <ul class="side-dropdown">
                    <li><a href="#">A/B testing</a></li>
                    <li><a href="t_timp.php">Timpul pe site</a></li>
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
        <h1 class="title">Dashboard</h1>
    

     <!-- content -->
        <div class="container">

            <div class="content">
                <h1>Bine ai venit în pagina de administrare <span><?php echo $_SESSION['admin_name'] ?></span></h1>
                <p>Aici poți gestiona chestionarele și testele făcute pe utilizatori.</p>
            </div>
        </div>


        </main>

    </section>


    



    <script src="script.js"></script>

</body>
</html>
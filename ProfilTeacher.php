<?php 
    require('Control/SecurityPages.php');
    require('Control/Settings/ProfilTeacherAction.php');

?>
<!DOCTYPE html>
<html lang="en">
<!-- Inclure head -->

<?php include('Includes/head.php') ?>

<!-- fin Inclure head -->

<body>
    <div class="d-flex" id="wrapper">
        <!-- Inclure NavBar -->

        <?php include('Includes/navbar.php') ?>

        <!-- fin Inclure NavBar -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <!-- Inclure BarNav -->

            <?php include('Includes/BarNav.php') ?>

            <!-- fin Inclure BarNav -->

            <div class="container-fluid px-4">
                <!-- Inclure Menu -->

                <?php include('Includes/Menu.php') ?>

                <!-- fin Inclure Menu -->
                <!-- ---------------------------------------------------- -->
                <!-- Section Profil Students -->
                <hr>
                <center>
                    <div class="card mb-3" >
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?= $profil ?>" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Frist Name : <?= $fname ?></h5> 
                                    <h5 class="card-title">Last Name : <?= $lname ?></h5>
                                    <h5 class="card-title">Address E-mail: <?= $email ?></h5>  
                                    <h5 class="card-title">Class: License <?= $prog ?></h5> 
                                    <h5 class="card-title">Courses : <?= $cours ?></h5> 
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                                    <div class="d-grid gap-2 d-md-block">
                                        <button class="btn btn-success me-4" type="button">Edit Profil</button>
                                        <button class="btn btn-success me-4" type="button">Contact</button>
                                        <a class="btn btn-secondary" href="index.php" style="margin-left: 10rem;">Retour</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>
                
                <!-- ------------------------------------------------- -->
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>
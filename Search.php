<?php 

    require('Control/SecurityPages.php');
    require('Control/Settings/SearchAction.php'); 

?>
<!DOCTYPE html>
<html lang="en">
<!-- Inclure head -->

<?php include('Includes/head.php') ?>

<!-- fin Inclure head -->
<style>
    .profil{
      width: 170px;
      height: 170px;
      /* border-radius: 50%;
      box-shadow: 1px 0 3px; */
    }
    .flex-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
</style>

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
                <hr>
                <!-- Section Search -->
                <div class="container" >
                    <form  method="GET">
                        <div class="form-group row">
                            <div class="col-8">
                            <input type="search" name="search" placeholder="Enter the Matricule"  class="form-control">
                            </div>
                            <div class="col-4">
                            <button class="btn btn-success" type="submit">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
        <!-- Section afficher resultat recherche -->
        <div class="flex-container">
        <?php if (!empty($_GET['search'])) { ?>
    <?php if (empty($AllStudent)) { ?>
        <p class="mt-5 fw-bold">No results found for the search.</p>
    <?php } else { ?>
        <?php foreach ($AllStudent as $student) { ?>
            <a href="ProfilStudent.php?id=<?= $student['id_student'] ?>" class="nav-link">    
                <div class="card mt-4" style="width: 15rem;">
                    <img src="<?= $student['profil'] ?>" class="card-img-top profil" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $student['fname'] ?> <?= $student['lname'] ?></h5>
                        <small><?= $student['nationality'] ?></small><br>
                        <small>License <?= $student['program'] ?></small>
                    </div>
                </div>
            </a>
        <?php } ?>
    <?php } ?>
<?php } ?>
</div>

    

               
                <!-- ------------------------------------------------- -->
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
  

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
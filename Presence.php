<?php
require ('Control/SecurityPages.php');
require ('Control/Settings/ProgramAction.php');


?>
<!DOCTYPE html>
<html lang="en">
<!-- Inclure head -->

<?php include ('Includes/head.php') ?>

<!-- fin Inclure head -->

<body>
    <div class="d-flex" id="wrapper">
        <!-- Inclure NavBar -->

        <?php include ('Includes/navbar.php') ?>

        <!-- fin Inclure NavBar -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <!-- Inclure BarNav -->

            <?php include ('Includes/BarNav.php') ?>

            <!-- fin Inclure BarNav -->

            <div class="container-fluid px-4">
                <!-- Inclure Menu -->

                <?php include ('Includes/Menu.php') ?>

                <!-- fin Inclure Menu -->
                <!-- ---------------------------------------------------- -->
                <!-- Section Présence -->
                <hr>
                <main>
                    <div class="row row-cols-2 row-cols-md-3 mb-3 text-center">
                        <?php while ($programs = $AllProgram->fetch()) { ?>
                            <div class="col">
                                <div class="card mb-4 rounded-3 shadow-sm">
                                    <div class="card-header py-3">
                                        <h4 class="my-0 fw-normal">
                                            <?= $programs['name_prog'] ?>
                                        </h4>
                                    </div>
                                    <div class="card-body">
                                        <img class="me-3 mb-3" src="<?= $programs['flag'] ?>" alt="" width="330"
                                            height="190">

                                        <a href="StudentByClass.php?class=<?= $programs['name_prog'] ?>"
                                            class="w-100 btn btn-lg btn-outline-success">Prise présence</a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>


                    </div>
                </main>

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
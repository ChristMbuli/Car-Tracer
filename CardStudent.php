<?php
require ('Control/SecurityPages.php');
require ('Control/Settings/ProfilStudentAction.php');

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
                <!-- Section Profil Students -->
                <hr>
                <div class="col-sm-12 mb-5">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h3>Carte Etudiant</h3>
                            <div class="">
                                <a href="ProfilStudent.php?id=<?= $IdTheStudent ?>"
                                    class="btn btn-secondary btn-sm  me-3 text-white">
                                    Retour</a>
                                <button id="demo" class="downloadtable btn btn-success btn-sm me-3 float-end"
                                    onclick="downloadtable()">
                                    <i class="fa-solid fa-download"></i> Télecharger</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class='container' id="mycard" style="overflow-x: auto;">
                                <div class='header justify-content-center align-items-center '>
                                </div>
                                <div class='d-flex container-2'>
                                    <div class='box-1'>
                                        <img src='<?= $profil ?>' />
                                    </div>
                                    <div class='box-2'>
                                        <h2 class="fname text-uppercase">
                                            <?= $fname ?>
                                        </h2>
                                        <h2 class="lname text-uppercase">
                                            <?= $lname ?>
                                        </h2>
                                        <h2 class="depart text-uppercase">
                                            <?= $prog ?>
                                        </h2>
                                        <h2 class="birth text-uppercase">
                                            <?= $birth ?>
                                        </h2>
                                    </div>
                                    <div class='box-3'>
                                        <?php $qrCodeImagePath = str_replace("/opt/lampp/htdocs/University/", "./", $qrCodeImagePath); ?>
                                        <img src="<?= $qrCodeImagePath ?>" alt="QR Code">
                                    </div>
                                </div>
                                <div class="container-3">
                                    <h2>
                                        <?= $matricule ?>
                                    </h2>
                                </div>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>





                <!-- ------------------------------------------------- -->
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function downloadtable() {
            var node = document.getElementById('mycard');

            domtoimage.toPng(node)
                .then(function (dataUrl) {
                    var img = new Image();
                    img.src = dataUrl;
                    downloadURI(dataUrl, "codeqr.png")
                })
                .catch(function (error) {
                    console.error('oops, something went wrong', error);
                });

        }

        function downloadURI(uri, name) {
            var link = document.createElement("a");
            link.download = name;
            link.href = uri;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
            delete link;
        }
    </script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>
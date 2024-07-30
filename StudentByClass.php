<?php
require ('Control/SecurityPages.php');
require ('Control/Settings/StudentByClass.php');
require ('Control/Settings/PresenceAction.php');




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
                <div class="col-sm-12 mb-5">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h3>Marquer Présence || Départment
                                <?= htmlspecialchars($Class) ?>
                            </h3>

                            <a href="Presence.php" class="btn btn-outline-secondary btn-sm">Retour</a>

                        </div>
                        <div class="card-body mt-2">
                            <div class='container'>
                                <?php if (!empty($msgError)) { ?>
                                    <div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
                                        <i class="fas fa-exclamation-triangle"></i>
                                        <?= $msgError ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                <?php } else { ?>
                                    <form method="post">
                                        <?php foreach ($allStudents as $student) { ?>
                                            <div class="d-flex align-items-center">
                                                <img src="<?= htmlspecialchars($student['profil']) ?>"
                                                    class="rounded-circle me-2" style="width: 40px;" alt="profil etudiant" />
                                                <h4 class="me-3 fw-bold h5">
                                                    <?= htmlspecialchars($student['fname']) ?>
                                                    <?= htmlspecialchars($student['lname']) ?>
                                                </h4>
                                                <div class="d-flex gap-2">
                                                    <?php
                                                    $studentId = htmlspecialchars($student['id_student']);
                                                    // Vérifier si une entrée existe pour cet étudiant et cette classe pour la date actuelle
                                                    $checkPresence = $conn->prepare('SELECT * FROM presences WHERE id_student = ? AND program = ? AND day = CURRENT_DATE');
                                                    $checkPresence->execute([$studentId, $_GET['class']]);
                                                    $presenceData = $checkPresence->fetch();

                                                    // Déterminer l'état actuel de présence ou d'absence
                                                    $presentChecked = '';
                                                    $absentChecked = '';
                                                    if ($presenceData) {
                                                        if ($presenceData['present'] == 1) {
                                                            $presentChecked = 'checked';
                                                        } elseif ($presenceData['absent'] == 1) {
                                                            $absentChecked = 'checked';
                                                        }
                                                    }
                                                    ?>
                                                    <input type="radio" class="btn-check" name="options[<?= $studentId ?>]"
                                                        id="present-<?= $studentId ?>" value="present" <?= $presentChecked ?>
                                                        autocomplete="off">
                                                    <label class="btn btn-outline-success"
                                                        for="present-<?= $studentId ?>">Présent(e)</label>

                                                    <input type="radio" class="btn-check" name="options[<?= $studentId ?>]"
                                                        id="present-6" value="Retard" autocomplete="off">
                                                    <label class="btn btn-outline-warning"
                                                        for="present-<?= $studentId ?>">Retard</label>



                                                    <input type="radio" class="btn-check" name="options[<?= $studentId ?>]"
                                                        id="absent-<?= $studentId ?>" value="absent" <?= $absentChecked ?>
                                                        autocomplete="off">
                                                    <label class="btn btn-outline-danger"
                                                        for="absent-<?= $studentId ?>">Absent(e)</label>
                                                </div>
                                            </div>
                                        <?php }
                                } ?>
                                    <button type="submit" class="btn btn-primary float-end">Envoyer</button>
                                </form>





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
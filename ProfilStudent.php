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
                <center>
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="<?= $profil ?>" width="200" class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Frist Name :
                                        <?= $fname ?>
                                    </h5>
                                    <h5 class="card-title">Last Name :
                                        <?= $lname ?>
                                    </h5>
                                    <h5 class="card-title">Address E-mail:
                                        <?= $email ?>
                                    </h5>
                                    <h5 class="card-title">Class: License
                                        <?= $prog ?>
                                    </h5>
                                    <h5 class="card-title">Date of Birth :
                                        <?= $birth ?>
                                    </h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins
                                            ago</small></p>
                                    <div class="d-grid gap-2 d-md-block">
                                        <button class="btn btn-success me-4" type="button">Edit Profil</button>
                                        <a href="CardStudent.php?id=<?= $IdTheStudent ?>" class="btn btn-success me-4"
                                            type="button">Carte
                                            édudiant</a>
                                        <a class="btn btn-secondary" href="index.php"
                                            style="margin-left: 10rem;">Retour</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </center>


                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Participation au cours
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <div class="content">
                                    <div id="calendar"></div>
                                </div>
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

    <script src="fullcalendar/packages/core/main.js"></script>
    <script src="fullcalendar/packages/interaction/main.js"></script>
    <script src="fullcalendar/packages/daygrid/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="fullcalendar/packages/core/locales/fr.js"></script>
    <!-- Importer le fichier de localisation français -->

    <script>
    document.addEventListener("DOMContentLoaded", function() {
        var calendarEl = document.getElementById("calendar");

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ["interaction", "dayGrid"],
            editable: true,
            eventLimit: true,
            events: <?php echo json_encode($events); ?>, // Intégration des événements dans le calendrier
            locale: 'fr', // Définir la locale en français
            eventRender: function(info) {
                // Modifier la représentation visuelle de l'événement en fonction de sa propriété 'title'
                if (info.event.title === 'Absent') {
                    info.el.style.backgroundColor = 'red';
                } else if (info.event.title === 'Présent') {
                    info.el.style.backgroundColor = 'green';
                }
            }
        });

        calendar.render();
    });
    </script>

</body>

</html>
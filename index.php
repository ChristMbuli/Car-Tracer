<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    require('Control/SecurityPages.php');
    require('Control/Settings/ViewAllStudents.php');
    require('Control/Settings/ViewAllTeachersAction.php');

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
                <!-- Section Direction -->
                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Section Direction</h3>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">Matricule</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Program</th>
                                    <th scope="col">Cours</th>
                                    <th scope="col">Session</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($teachers as $teacher) { ?>
                                <tr>
                                    <th scope="row"><?= $teacher['matricule'] ?></th>
                                    <td><a href="ProfilTeacher.php?id=<?= $teacher['id_teacher'] ?>"
                                            style="text-decoration: none;color: dark;"><?= $teacher['fname'] ?>
                                            <?= $teacher['lname'] ?></a></td>
                                    <td><?= $teacher['email'] ?></td>
                                    <td><?= $teacher['program'] ?></td>
                                    <td><?= substr($teacher['cours'], 0, 15) ?>..</td>
                                    <td><?= $teacher['session_year'] ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- Affichage de la pagination -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                                <li class="page-item <?php if ($i === $page) echo 'active'; ?>">
                                    <a class="page-link bg-success text-light" href="?page=<?= $i ?>"
                                        style="text-decoration: none;"><?= $i ?></a>
                                </li>
                                <?php } ?>
                            </ul>
                        </nav>

                    </div>
                </div>
                <!-- ------------------------------------------------- -->
                <!-- Section Students -->

                <div class="row my-5">
                    <div class="d-flex justify-content-between">
                        <h3 class="fs-4 mb-3">Section Students</h3>
                        <div class="btn-group">
                            <!-- Button Dropdown -->
                            <button class="btn btn-lg btn-sm dropdown-toggle fs-5 fw-bold" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Sort
                            </button>
                            <ul class="dropdown-menu">
                                <li class="dropdown">
                                    <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">By Sex</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-item dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">By Category</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Category 1</a></li>
                                        <li><a class="dropdown-item" href="#">Category 2</a></li>
                                        <li><a class="dropdown-item" href="#">Category 3</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <!-- Fin Button Dropdown -->

                        </div>
                    </div>
                    <div class="col">
                        <table class="table bg-white rounded shadow-sm table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" width="50">Matricule</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Class</th>
                                    <th scope="col">Sex</th>
                                    <th scope="col">Nationality</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($students as $student) { ?>
                                <tr>
                                    <th scope="row"><?= $student['matricule'] ?></th>
                                    <td><a href="ProfilStudent.php?id=<?= $student['id_student'] ?>"
                                            style="text-decoration: none;color: dark;"><?= $student['fname'] ?>
                                            <?= $student['lname'] ?></a></td>
                                    <td><?= $student['email'] ?></td>
                                    <td><?= $student['program'] ?></td>
                                    <td><?= $student['sexe'] ?></td>
                                    <td><?= $student['nationality'] ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Affichage de la pagination -->
                    <nav aria-label="Page navigation">
                        <ul class="pagination">
                            <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
                            <li class="page-item <?php if ($i === $page) echo 'active'; ?>">
                                <a class="page-link bg-success text-light" href="?page=<?= $i ?>"
                                    style="text-decoration: none;"><?= $i ?></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </nav>
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

    toggleButton.onclick = function() {
        el.classList.toggle("toggled");
    };
    </script>
</body>

</html>
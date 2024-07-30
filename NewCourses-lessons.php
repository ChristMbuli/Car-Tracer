<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require ('Control/SecurityPages.php');
require ('Control/Settings/NewCoursesAction.php');
require ('Control/Settings/NewLessonsAction.php');
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
                <hr>

                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active btn btn-success" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Add
                            a Course</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link btn btn-success" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Add a Lesson</a>
                    </li>
                </ul>

                <div class="tab-content" id="pills-tabContent">
                    <!-- Section ajouter un cours -->
                    <?php
                    //verifier si il ya une erreur
                    if (isset ($msgError)) {
                        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle"></i>' . $msgError .
                            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>';
                    } elseif (isset ($SuccessMsg)) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i>' . $SuccessMsg .
                            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                    }
                    ?>
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab" tabindex="0">

                        <form class="row g-3 needs-validation" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Programme</label>
                                <select class="form-select" name="program">
                                    <?php while ($program = $AllProgram->fetch()) { ?>
                                    <option value="<?= $program['name_prog'] ?>">
                                        <?= $program['name_prog'] ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Teacher</label>
                                <select class="form-select" name="teacher">
                                    <?php while ($teacher = $AllTeacher->fetch()) { ?>
                                    <option value="<?= $teacher['fname'] . ' ' . $teacher['lname'] ?>">
                                        <?= $teacher['fname'] . ' ' . $teacher['lname'] ?>
                                        <p class="text-secondary" style="font-size: 5rem;">(
                                            <?= $teacher['program'] ?>)
                                        </p>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-md-9">
                                <label for="validationCustom01" class="form-label">Name Course</label>
                                <input type="text" name="namecourse" class="form-control"
                                    placeholder="CSS, PHP, HTML, PYTHON, DROIT">
                            </div>
                            <div class="col-md-9">
                                <label for="validationCustom05" class="form-label">Picture Course</label>
                                <input type="file" name="picture" class="form-control">
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto mt-5">
                                <button class="btn btn-success" name="addcourse" type="submit">New Course</button>
                            </div>
                        </form>
                    </div>
                    <!-- Fin Section ajouter un cours -->
                    <!-- ------------------------------------------------- -->

                    <!-- Section Ajouter une lessons -->
                    <?php if (isset ($errorMsg)): ?>
                    <p>
                        <?= $errorMsg ?>
                    </p>
                    <?php endif; ?>
                    <?php if (isset ($successMsg)): ?>
                    <p>
                        <?= $successMsg ?>
                    </p>
                    <?php endif; ?>

                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        <form class="row g-3 needs-validation mb-5" method="post" enctype="multipart/form-data">
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Programme</label>
                                <select class="form-select" name="programs">
                                    <?php while ($program = $AllPrograms->fetch()): ?>
                                    <option value="<?= $program['name_prog'] ?>">
                                        <?= $program['name_prog'] ?>
                                    </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Course</label>
                                <select class="form-select" name="cours">
                                    <?php while ($course = $AllCourses->fetch()): ?>
                                    <option value="<?= $course['id_course'] ?>">
                                        <?= $course['name_course'] ?>
                                    </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>
                            <div class="col-md-8">
                                <label for="validationCustom01" class="form-label">Name lessons</label>
                                <input type="text" name="namelessons" class="form-control"
                                    placeholder="CSS, PHP, HTML, PYTHON, DROIT">
                            </div>
                            <div class="col-md-9">
                                <label for="validationCustom05" class="form-label">Lessons</label>
                                <input type="file" name="lessons" class="form-control">
                            </div>
                            <div class="d-grid gap-2 col-6 mx-auto mt-5">
                                <button class="btn btn-success" name="addlessons" type="submit">New lessons</button>
                            </div>
                        </form>
                    </div>
                    <!-- Fin Section ajouter lessons -->
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
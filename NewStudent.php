<?php 

    require('Control/SecurityPages.php');

    require('Control/Settings/NewStudentAction.php'); 
    require('Control/Settings/ProgramAction.php'); 

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
                <!-- Section Add New Students -->
                <hr>
                <div class="container p-4">
                <?php
            //verifier si il ya une erreur
            if(isset($msgError)){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle"></i>'.$msgError.
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                 </div>';
            }
            elseif(isset($SuccessMsg)){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle"></i>'.$SuccessMsg.
                '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        ?>
                <form class="row g-3 needs-validation" method="post" enctype="multipart/form-data">
                    <div class="col-md-4">
                        <label for="validationCustom01" class="form-label">First Name</label>
                        <input type="text" name="fname" class="form-control" placeholder="etando school" >
                    </div>
                    <div class="col-md-4"> 
                        <label for="validationCustom02" class="form-label">Last Name</label>
                        <input type="text" name="lname" class="form-control" placeholder="etando school"  >
                    </div>
                    <div class="col-md-4">
                        <label for="validationCustomUsername" class="form-label">Date of Birth</label>
                        <div class="input-group has-validation">
                        <input type="text" name="birth" class="form-control" placeholder="09/12/2022" >
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="validationCustom03" class="form-label">Email</label>
                        <input type="text" name="contact" class="form-control" placeholder="etandoschool@gmail.com" >
                    </div>
                    <div class="col-md-5">
                        <label for="validationCustom03" class="form-label">Nationality</label>
                        <input type="text" name="nationality" class="form-control" placeholder="Congolese"  >
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom04" class="form-label">Study Programme</label>
                        <select class="form-select" name="program" >
                        <?php while($programs = $AllProgram->fetch()){ ?>
                            <option value="<?= $programs['name_prog'] ?>"><?= $programs['name_prog'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom04" class="form-label">Sex</label>
                        <select class="form-select" name="sex" >
                            <option value="Woman">Woman</option>
                            <option value="Man">Man</option>
                        </select>
                    </div>
                    <div class="col-md-9">
                        <label for="validationCustom05" class="form-label">Pictute Student</label>
                        <input type="file" name="profil" class="form-control">
                    </div>
                    <div class="d-grid gap-2 col-6 mx-auto mt-5">
                        <button class="btn btn-success" name="add" type="submit">New Student</button>
                    </div>
                </form>
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
<?php
session_start();
require('Control/SecurityPages.php');

try {
    $conn = new PDO('mysql:host=localhost;dbname=university;charset=utf8', 'root', '');
} catch (PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}

// Vérifier si le bouton "enregistrer" est appuyé
if (isset($_POST['addlessons'])) {
    // Vérifier si les champs ne sont pas vides
    if (!empty($_POST['programs']) && !empty($_POST['cours']) && !empty($_POST['namelessons']) && !empty($_FILES['lessons']['name'])) {

        $programs = htmlspecialchars($_POST['programs']);
        $course = htmlspecialchars($_POST['cours']);
        $namelessons = htmlspecialchars($_POST['namelessons']);

        $date = $_SESSION['year'];

        // Vérifier le type de fichier
        $allowedTypes = array('pdf', 'doc', 'docx', 'ppt', 'pptx'); // Types de fichiers autorisés
        $fileExt = strtolower(pathinfo($_FILES['lessons']['name'], PATHINFO_EXTENSION)); // Extension du fichier

        if (in_array($fileExt, $allowedTypes)) {
            // Chemin de destination pour enregistrer le fichier
            $lessonsPath = 'uploads/' . $_FILES['lessons']['name'];

            // Déplacer le fichier vers le dossier de destination
            move_uploaded_file($_FILES['lessons']['tmp_name'], $lessonsPath);

            // Insérer le cours et son titre dans la table
            $InsertLessons = $conn->prepare('INSERT INTO lessons(name_lesson, lessons, courses, program, session_year) VALUES(?, ?, ?, ?, ?)');
            $InsertLessons->execute(array($namelessons, $lessonsPath, $course, $programs, $date));

            $successMsg = "Le cours a été ajouté avec succès.";
        } else {
            $errorMsg = "Le format du fichier n'est pas autorisé. Veuillez choisir un fichier PDF, Word ou PowerPoint.";
        }
    } else {
        $errorMsg = "Veuillez remplir tous les champs.";
    }
}
?>

<?php if (isset($errorMsg)) : ?>
    <p><?= $errorMsg ?></p>
<?php endif; ?>
<?php if (isset($successMsg)) : ?>
    <p><?= $successMsg ?></p>
<?php endif; ?>

<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
    <form class="row g-3 needs-validation mb-5" method="post" enctype="multipart/form-data">
        <div class="col-md-6">
            <label for="validationCustom04" class="form-label">Programme</label>
            <select class="form-select" name="programs">
                <?php while ($program = $AllPrograms->fetch()) : ?>
                    <option value="<?= $program['name_prog'] ?>"><?= $program['name_prog'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="col-md-6">
            <label for="validationCustom04" class="form-label">Course</label>
            <select class="form-select" name="cours">
                <?php while ($course = $AllCourses->fetch()) : ?>
                    <option value="<?= $course['name_course'] ?>"><?= $course['name_course'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="col-md-8">
            <label for="validationCustom01" class="form-label">Name lessons</label>
            <input type="text" name="namelessons" class="form-control" placeholder="CSS, PHP, HTML, PYTHON, DROIT">
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

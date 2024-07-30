<div class="bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading text-center py-4 primary-text fs-5 fw-bold text-uppercase border-bottom">
        <img class="d-block mx-auto mb-4" src="https://cdn-icons-png.flaticon.com/128/669/669698.png" alt="" width="50"
            height="37">
        Fatima School
    </div>
    <div class="list-group list-group-flush my-3">
        <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text"><i
                class="fas fa-tachometer-alt me-2"></i>Home</a>
        <a href="NewStudent.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-project-diagram me-2"></i>New Student</a>
        <a href="NewAgent.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-user me-2"></i></i>New Team</a>
        <a href="Search.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-search me-2"></i></i>Search</a>
        <a href="NewCourses-lessons.php"
            class="list-group-item list-group-item-action bg-transparent second-text fw-bold">
            <i class="fas fa-book me-2"></i>Program</a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-chart-line me-2"></i>manage the class</a>
        <a href="Presence.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-paperclip me-2"></i>Présence</a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-gift me-2"></i>Activité</a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-comment-dots me-2"></i>Chat</a>
        <a href="#" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                class="fas fa-map-marker-alt me-2"></i>Outlet</a>
        <a href="./Control/Settings/LogoutAction.php"
            class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
            <i class="fas fa-power-off me-2"></i>Logout</a>
        <hr>
        <a href="#" class="list-group-item list-group-item-action bg-transparent text-success fw-bold">
            <i class="fas fa-calendar me-2"></i>
            <?php
            $currentYear = $_SESSION['year'];

            $row = $currentYear - 1;

            echo 'Session ' . $row . '-' . $currentYear;

            ?>
        </a>

    </div>
</div>
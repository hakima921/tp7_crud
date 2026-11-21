
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>TP7_Conception et CRUD multi-entités</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="dashboard-page">

    <h1>Gestion de la FST-Marrakech</h1>

    <header class="page-topbar">
        <span class="page-caption">FSTG – ESPACE DE GESTION</span>
    </header>

    <div class="home-intro">
        <div class="eyebrow">BIENVENUE</div>
        <p>
            Gérez facilement les formations, les étudiants et les modules de la FSTG depuis une plateforme simple et intuitive.
        </p>
    </div>

    <div class="quick-grid home-grid">

        <div class="quick-card">
            <div class="quick-icon">🎓</div>
            <h2>Étudiants</h2>
            <p>Ajoutez, modifiez et consultez les étudiants.</p>
            <a class="btn btn-primary" href="Etudiant/index.php">
                Gérer les étudiants
            </a>
        </div>

        <div class="quick-card">
            <div class="quick-icon">📜</div>
            <h2>Formations</h2>
            <p>Gérez les formations et leurs informations.</p>
            <a class="btn btn-primary" href="Formation/index.php">
                Gérer les formations
            </a>
        </div>

        <div class="quick-card">
           <div class="quick-icon">📚</div>
            <h2>Modules</h2>
            <p>Ajoutez, modifiez et consultez les modules.</p>
            <a class="btn btn-primary" href="Module/index.php">
                Gérer les modules
            </a>
        </div>

    </div>

</body>

</html>

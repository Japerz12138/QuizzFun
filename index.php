<!-- index.php -->
<!-- Author: Jack -->

<?php
if (isset($_GET['submit'])) {
    // Form submitted, redirect to the quiz page
    header("Location: quiz.php");
    exit;
}
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <script src="./stylesheet/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="NYIT Internet Programming Final Project">
    <meta name="author" content="Bootstrap contributors, YangYang(Jack) Ma">
    <meta name="generator" content="Hugo 0.118.2">
    <title>QuizzFun</title>

    <script src="https://kit.fontawesome.com/0f54c6fb31.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="./stylesheet/css/bootstrap.min.css" rel="stylesheet">
    <link href="./stylesheet/css/stylesheet.main.css" rel="stylesheet">

    <link rel="apple-touch-icon" sizes="76x76" href="./favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./favicon/favicon-16x16.png">
    <link rel="manifest" href="./favicon/site.webmanifest">
    <link rel="mask-icon" href="./favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

</head>
<body>

<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="check2" viewBox="0 0 16 16">
        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
    </symbol>
    <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
    </symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16">
        <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
    </symbol>

</svg>

<div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
    <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
            id="bd-theme"
            type="button"
            aria-expanded="false"
            data-bs-toggle="dropdown"
            aria-label="Toggle theme (auto)">
        <svg class="bi my-1 theme-icon-active" width="1em" height="1em"><use href="#circle-half"></use></svg>
        <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
    </button>
    <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#sun-fill"></use></svg>
                Light
                <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
            </button>
        </li>
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#moon-stars-fill"></use></svg>
                Dark
                <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
            </button>
        </li>
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
                <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em"><use href="#circle-half"></use></svg>
                Auto
                <svg class="bi ms-auto d-none" width="1em" height="1em"><use href="#check2"></use></svg>
            </button>
        </li>
    </ul>
</div>

<header data-bs-theme="dark">
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <i class="fa-regular fa-face-grin-squint-tears"></i>
                <strong>QuizzFun</strong>
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="https://github.com/Japerz12138/QuizzFun">GitHub</a>
                </li>
            </ul>
        </div>
    </div>
</header>

<main>
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Welcome to QuizzFun</h1>
                <p class="lead text-body-secondary">We got some really fun quizzes, try them out!</p>
                <p>
                    <!-- TODO: Make a About page!-->
                    <a href="#" class="btn btn-primary my-2">About</a>
                    <a href="https://github.com/Japerz12138/QuizzFun" class="btn btn-secondary my-2"><i class="fa-solid fa-star"></i>Star Our GitHub!</a>
                </p>
            </div>
        </div>
    </section>
    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="./img/quiz1_background.png" alt="Anime Comprehensive">
                        <div class="card-body">
                            <p class="card-text">This quiz contains comprehensive anime questions. Want to test your anime knowledge? Come and try and see how many answers you can get right!</p>
                            <p>
                                <span class="badge bg-secondary">Hard</span>
                                <span class="badge bg-secondary">Anime</span>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editWarning">Edit</button>
                                </div>
                                <form id="AnimeComprehensive" action="./quiz.php" method="get">
                                    <button type="submit" class="btn btn-primary">Play</button>
                                    <input type="hidden" name="question_bank_id" value="1">
                                </form>

                            </div>
                        </div>
                        <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-danger">
                            NEW
                            <span class="visually-hidden">NEW QUIZ</span>
                        </span>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="./img/quiz2_background.png" alt="Anime Characters">
                        <div class="card-body">
                            <p class="card-text">Sometimes you remember the characters more clearly? Use the anime title to guess which anime character it is!</p>
                            <p>
                                <span class="badge bg-secondary">Easy</span>
                                <span class="badge bg-secondary">Anime</span>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editWarning">Edit</button>
                                </div>
                                <form id="AnimeCharters" action="./quiz.php" method="get">
                                    <button type="submit" class="btn btn-primary">Play</button>
                                    <input type="hidden" name="question_bank_id" value="2">
                                </form>

                            </div>
                        </div>
                        <span class="position-absolute top-0 start-50 translate-middle badge rounded-pill bg-danger">
                            NEW
                            <span class="visually-hidden">NEW QUIZ</span>
                        </span>
                    </div>
                </div>
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Coming Soon</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Coming Soon</text></svg>
                        <div class="card-body">
                            <p class="card-text">More fun quizzes coming soon!</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary" disabled>Edit</button>
                                </div>
                                <button href="quiz.php?question_bank_id=2" class="btn btn-primary" disabled>Play</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="editWarning" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Notification</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Quiz editing function is not enabled yet!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Okay lol</button>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="text-body-secondary py-5">
    <div class="container">
        <p class="float-end mb-1">
            <a href="#">Back to top</a>
        </p>
        <p class="mb-1">NYIT Internet Programming Final Project</p>
        <p class="mb-0">TVアニメ「へやキャン△」公式サイト，&copy; あfろ・芳文社／野外活動委員会</p>
        <p>&copy; 若木民喜/みつみ美里・甘露樹(アクアプラス)/16bitセンセーションAL PROJECT</p>
        <p>Some of the images used on this website come from the Internet. If it infringes upon your copyright, please contact jackma12138@gmail.com to have it deleted.</p>
    </div>
</footer>
<script src="./stylesheet/js/bootstrap.bundle.min.js"></script>

</body>
</html>

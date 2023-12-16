<?php
$fanum = 1;
$questionPercentage = number_format($currentQuestionNum / $totalQuestionNum * 100, 1);

?>

<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quiz - QuizzFun</title>

    <!-- STYLESHEETS -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="./stylesheet/css/bootstrap.min.css" rel="stylesheet">
    <link href="./stylesheet/css/stylesheet.quiz.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/0f54c6fb31.js" crossorigin="anonymous"></script>

    <!-- BACKUP PLAN! DON'T USE JS UNTIL YOU REALLY CAN FIGURE STUFF OUT! -->
    <!-- Will, I tried, POST operation by default PHP is just not working lmao - Jack -->
    <!-- I wanna cry :(((-->
    <script>
        function submitForm() {
            var selectedAnswer = document.querySelector('input[name="selectedAnswer"]:checked');

            if (selectedAnswer === null) {
                alert("Please select an answer before proceeding to the next question!");
                return false; // Prevent the default form submission
            }

            return true; // Allow the form submission to continue
        }
    </script>
</head>

<body class="antialiased">
<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900">
    <form method="post" onsubmit="return submitForm();" action="">
        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#0c64e5" opacity="0.4" height="16" width="16" viewBox="0 0 512 512" class="h-16 w-auto bg-gray-100 dark:bg-gray-900">
                    <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm169.8-90.7c7.9-22.3 29.1-37.3 52.8-37.3h58.3c34.9 0 63.1 28.3 63.1 63.1c0 22.6-12.1 43.5-31.7 54.8L280 264.4c-.2 13-10.9 23.6-24 23.6c-13.3 0-24-10.7-24-24V250.5c0-8.6 4.6-16.5 12.1-20.8l44.3-25.4c4.7-2.7 7.6-7.7 7.6-13.1c0-8.4-6.8-15.1-15.1-15.1H222.6c-3.4 0-6.4 2.1-7.5 5.3l-.4 1.2c-4.4 12.5-18.2 19-30.6 14.6s-19-18.2-14.6-30.6l.4-1.2zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/>
                </svg>
            </div>
            <div id="alert-container"></div>
            <div class="flex justify-center">
                <h1 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white"><?=$question?></h1>
            </div>

            <div class="container px-4 text-center mt-16">
                <div class="row">
                    <?php foreach ($selections as $key => $selection) : ?>
                        <div class="col">
                            <input type="radio" class="btn-check" name="selectedAnswer" id="option<?= $fanum ?>" value="<?= $key ?>" autocomplete="off">
                            <label class="btn btn-primary text-xl font-semibold p-3 btn-block" for="option<?= $fanum ?>"><i class="fa-solid fa-<?= $fanum++ ?>" style="color: #0d6efd"></i><br><?= $selection['selection_text'] ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="container text-center mt-16">
                    <button type="submit" class="btn btn-primary text-xl font">Next Question<i class="fa-solid fa-chevron-right" style="color: #0d6efd;"></i></button>
                </div>
            </div>
        </div>

    <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
        <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-left">
            <div class="flex items-center gap-4">
                <a href="#" class="group inline-flex items-center hover:text-gray-700 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-blue-500">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#9ca3af" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14">
                        </path>
                        <polyline points="22 4 12 14.01 9 11.01">
                        </polyline>
                    </svg>
                    Progress: <?=$currentQuestionNum?> / <?=$totalQuestionNum?> ( <?=$questionPercentage?> % )
                </a>
            </div>
        </div>
    </div>

    <div class="progress" role="progressbar" aria-label="question progress" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="border-radius: 15px; height: 10px;">
        <div class="progress-bar progress-bar-striped progress-bar-animated" style="width: <?=$questionPercentage?>%"></div>
    </div>
    </form>
</div>
</body>

</html>

<?php
require_once "./functions/connections.php";
$pdo = getConnection();
$quizName = $_GET['quiztitle'];
echo $quizName;

// Fetch quiz details
$sqlQuiz = "SELECT * FROM quizzes WHERE quiz_name = :quizName;";
if ($stmtQuiz = $pdo->prepare($sqlQuiz)) {
    $stmtQuiz->bindParam(':quizName', $quizName, PDO::PARAM_STR);
    if ($stmtQuiz->execute()) {
        if ($stmtQuiz->rowCount() >= 1) {
            $haveRows = true;
            while ($rowQuiz = $stmtQuiz->fetch(PDO::FETCH_ASSOC)) {
                echo $rowQuiz["quiz_name"];
                var_dump($rowQuiz);
                // Fetch questions using JOIN
                // Fetch questions using JOIN
                $sqlQuestions = "SELECT questions.question_id, quiz_name, question_text FROM quizzes INNER JOIN questions ON quizzes.quiz_id = questions.quiz_id WHERE quizzes.quiz_id = :quizId";
                // Replace with the actual common column

                if ($stmtQuestions = $pdo->prepare($sqlQuestions)) {
                    $stmtQuestions->bindParam(':quizId', $rowQuiz['quiz_id'], PDO::PARAM_INT);

                    if ($stmtQuestions->execute()) {
                        while ($rowQuestions = $stmtQuestions->fetch(PDO::FETCH_ASSOC)) {
                            // Access values from the linked tables
                            var_dump($rowQuestions);
                            $question = $rowQuestions["question_text"];
                            // Process other values as needed
                            // Render HTML inside the loop
                            renderHTML($question, $pdo, $rowQuestions['question_id']);
                        }
                    } else {
                        echo "Error executing question query";
                    }
                } else {
                    echo "Error preparing question query";
                }

            } // <-- Closing brace for the while loop
        } else {
            echo "No rows for the quiz";
        }
    } else {
        echo "Error executing quiz query";
    }
} else {
    $db_error = "Error preparing quiz query";
}

function renderHTML($question, $pdo, $questionId) {
    // ... (your existing HTML code)

    // Fetch selections using JOIN
    $sqlSelections = "SELECT selection_text
                     FROM selections
                     WHERE question_id = :selectionId";

    if ($stmtSelect = $pdo->prepare($sqlSelections)) {
        $stmtSelect->bindParam(':selectionId', $questionId, PDO::PARAM_INT);

        if ($stmtSelect->execute()) {
            // Initialize variables for selections
            $selectionOne = $selectionTwo = $selectionThree = $selectionFour = "";

            // Fetch distinct values for each selection
            $rowSelections = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);

            // Assign values to variables
            if (count($rowSelections) >= 1) {
                $selectionOne = $rowSelections[0]["selection_text"];
            }
            if (count($rowSelections) >= 2) {
                $selectionTwo = $rowSelections[1]["selection_text"];
            }
            if (count($rowSelections) >= 3) {
                $selectionThree = $rowSelections[2]["selection_text"];
            }
            if (count($rowSelections) >= 4) {
                $selectionFour = $rowSelections[3]["selection_text"];
            }

            // Process other values as needed
            // Display selection text in your HTML

        } else {
            echo "Error executing selection query";
        }
    } else {
        echo "Error preparing selection query";
    }
?>


    <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Quiz</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="./stylesheet/css/stylesheet.quiz.css" rel="stylesheet" />

    <!-- Styles -->
    <style>
    </style>
</head>

<body class="antialiased">
<div class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">

    <div class="max-w-7xl mx-auto p-6 lg:p-8">
        <div class="flex justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" fill="#0c64e5" height="16" width="16" viewBox="0 0 512 512" class="h-16 w-auto bg-gray-100 dark:bg-gray-900">
                <path d="M464 256A208 208 0 1 0 48 256a208 208 0 1 0 416 0zM0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zm169.8-90.7c7.9-22.3 29.1-37.3 52.8-37.3h58.3c34.9 0 63.1 28.3 63.1 63.1c0 22.6-12.1 43.5-31.7 54.8L280 264.4c-.2 13-10.9 23.6-24 23.6c-13.3 0-24-10.7-24-24V250.5c0-8.6 4.6-16.5 12.1-20.8l44.3-25.4c4.7-2.7 7.6-7.7 7.6-13.1c0-8.4-6.8-15.1-15.1-15.1H222.6c-3.4 0-6.4 2.1-7.5 5.3l-.4 1.2c-4.4 12.5-18.2 19-30.6 14.6s-19-18.2-14.6-30.6l.4-1.2zM224 352a32 32 0 1 1 64 0 32 32 0 1 1 -64 0z"/>
            </svg>
        </div>
        <div class="flex justify-center">
            <h1 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white"><?=$question?></h1>
        </div>

        <div class="mt-16">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8">

                <!-- Selection 1 -->
                <a href="#" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-blue-500">
                    <div>
                        <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#0c64e5" height="16" width="8" viewBox="0 0 256 512" class="self-center shrink-0 stroke-blue-500 w-5 h-5 mx-5">
                                <path d="M160 64c0-11.8-6.5-22.6-16.9-28.2s-23-5-32.8 1.6l-96 64C-.5 111.2-4.4 131 5.4 145.8s29.7 18.7 44.4 8.9L96 123.8V416H32c-17.7 0-32 14.3-32 32s14.3 32 32 32h96 96c17.7 0 32-14.3 32-32s-14.3-32-32-32H160V64z"/>
                            </svg>
                        </div>

                        <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white"><?=$selectionOne?></h2>

                    </div>
                </a>

                <!-- Selection 2 -->
                <a href="#" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-blue-500">
                    <div>
                        <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#0c64e5" height="16" width="8" viewBox="0 0 256 512" class="self-center shrink-0 stroke-blue-500 w-5 h-5 mx-5">
                                <path d="M142.9 96c-21.5 0-42.2 8.5-57.4 23.8L54.6 150.6c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L40.2 74.5C67.5 47.3 104.4 32 142.9 32C223 32 288 97 288 177.1c0 38.5-15.3 75.4-42.5 102.6L109.3 416H288c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-12.9 0-24.6-7.8-29.6-19.8s-2.2-25.7 6.9-34.9L200.2 234.5c15.2-15.2 23.8-35.9 23.8-57.4c0-44.8-36.3-81.1-81.1-81.1z"/>
                            </svg>
                        </div>

                        <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white"><?=$selectionTwo?></h2>

                    </div>
                </a>

                <!-- Selection 3 -->
                <a href="#" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-blue-500">
                    <div>
                        <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#0c64e5" height="16" width="8" viewBox="0 0 256 512" class="self-center shrink-0 stroke-blue-500 w-5 h-5 mx-5">
                                <path d="M0 64C0 46.3 14.3 32 32 32H272c13.2 0 25 8.1 29.8 20.4s1.5 26.3-8.2 35.2L162.3 208H184c75.1 0 136 60.9 136 136s-60.9 136-136 136H105.4C63 480 24.2 456 5.3 418.1l-1.9-3.8c-7.9-15.8-1.5-35 14.3-42.9s35-1.5 42.9 14.3l1.9 3.8c8.1 16.3 24.8 26.5 42.9 26.5H184c39.8 0 72-32.2 72-72s-32.2-72-72-72H80c-13.2 0-25-8.1-29.8-20.4s-1.5-26.3 8.2-35.2L189.7 96H32C14.3 96 0 81.7 0 64z"/>
                            </svg>
                        </div>

                        <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white"><?=$selectionThree?></h2>

                    </div>

                </a>

                <!-- Selection 4 -->
                <a href="#" class="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-blue-500">
                    <div>
                        <div class="h-16 w-16 bg-red-50 dark:bg-red-800/20 flex items-center justify-center rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#0c64e5" height="16" width="8" viewBox="0 0 256 512" class="self-center shrink-0 stroke-red-500 w-5 h-5 mx-5">
                                <path d="M189 77.6c7.5-16 .7-35.1-15.3-42.6s-35.1-.7-42.6 15.3L3 322.4c-4.7 9.9-3.9 21.5 1.9 30.8S21 368 32 368H256v80c0 17.7 14.3 32 32 32s32-14.3 32-32V368h32c17.7 0 32-14.3 32-32s-14.3-32-32-32H320V160c0-17.7-14.3-32-32-32s-32 14.3-32 32V304H82.4L189 77.6z"/>
                            </svg>
                        </div>

                        <h2 class="mt-6 text-xl font-semibold text-gray-900 dark:text-white"><?=$selectionFour?></h2>
                    </div>
                </a>
            </div>
        </div>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <a href="#" class="scale-100 bp-7 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 focus:outline focus:outline-2 focus:outline-blue-500 items-center justify-center">
                <h2 class="font-semibold text-gray-900 dark:text-white">Next</h2>
                <!-- Your SVG Code -->
                <svg width="30px" height="30px" viewBox="-0.5 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#0c64e5" transform="rotate(0)" class="ml-2">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round" stroke="#CCCCCC" stroke-width="0.15"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M12 22.4199C17.5228 22.4199 22 17.9428 22 12.4199C22 6.89707 17.5228 2.41992 12 2.41992C6.47715 2.41992 2 6.89707 2 12.4199C2 17.9428 6.47715 22.4199 12 22.4199Z" stroke="#0c64e5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M10.5596 8.41992L13.6196 11.29C13.778 11.4326 13.9047 11.6068 13.9914 11.8015C14.0781 11.9962 14.123 12.2068 14.123 12.4199C14.123 12.633 14.0781 12.8439 13.9914 13.0386C13.9047 13.2332 13.778 13.4075 13.6196 13.55L10.5596 16.4199" stroke="#0c64e5" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                </svg>
            </a>
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
                        Progress: <?=$currentQuestionNum?> / <?=$totalQuestionNum?>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php } ?>

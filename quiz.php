<?php
require_once "./functions/connections.php";
$pdo = getConnection();
$quizName = $_GET['quiztitle'];

// Get the current question number from the URL or default to 1
$currentQuestionNum = isset($_GET['q']) ? (int)$_GET['q'] : 1;

// Fetch quiz details
$sqlQuiz = "SELECT * FROM quizzes WHERE quiz_name = :quizName;";
if ($stmtQuiz = $pdo->prepare($sqlQuiz)) {
    $stmtQuiz->bindParam(':quizName', $quizName, PDO::PARAM_STR);
    if ($stmtQuiz->execute()) {
        if ($stmtQuiz->rowCount() >= 1) {
            $haveRows = true;
            while ($rowQuiz = $stmtQuiz->fetch(PDO::FETCH_ASSOC)) {
                // Fetch questions using JOIN
                $sqlQuestions = "SELECT questions.question_id, quiz_name, question_text FROM quizzes INNER JOIN questions ON quizzes.quiz_id = questions.quiz_id WHERE quizzes.quiz_id = :quizId";
                // Replace with the actual common column

                if ($stmtQuestions = $pdo->prepare($sqlQuestions)) {
                    $stmtQuestions->bindParam(':quizId', $rowQuiz['quiz_id'], PDO::PARAM_INT);

                    if ($stmtQuestions->execute()) {
                        $questionCount = $stmtQuestions->rowCount();
                        $totalQuestionNum = $questionCount;

                        if ($currentQuestionNum <= $questionCount) {
                            $stmtQuestions->setFetchMode(PDO::FETCH_ASSOC);
                            $questions = $stmtQuestions->fetchAll();

                            // Access values from the linked tables
                            $question = $questions[$currentQuestionNum - 1]["question_text"];
                            $questionId = $questions[$currentQuestionNum - 1]["question_id"];

                            // Render HTML inside the loop
                            renderHTML($question, $pdo, $questionId, $currentQuestionNum, $totalQuestionNum);

                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                // Process the form submission
                                $selectedAnswer = isset($_POST['selectedAnswer']) ? (int)$_POST['selectedAnswer'] : 0;

                                // Update the current question number based on the selected answer
                                $currentQuestionNum += 1;

                                // Redirect to the next question or display quiz completion message
                                if ($currentQuestionNum <= $totalQuestionNum) {
                                    header("Location: quiz.php?quiztitle=$quizName&q=$currentQuestionNum");
                                    exit();
                                } else {
                                    echo "Quiz completed!";
                                    exit();
                                }
                            }
                        } else {
                            echo "Quiz completed!";
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

function renderHTML($question, $pdo, $questionId, $currentQuestionNum, $totalQuestionNum): void
{
    // Fetch selections using JOIN
    $sqlSelections = "SELECT selection_text
                     FROM selections
                     WHERE question_id = :selectionId";

    if ($stmtSelect = $pdo->prepare($sqlSelections)) {
        $stmtSelect->bindParam(':selectionId', $questionId, PDO::PARAM_INT);

        if ($stmtSelect->execute()) {
            // Initialize variables for selections
            $selections = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);

            // Process other values as needed
            include "./functions/quiz_template.php"; // Include the HTML template file
        } else {
            echo "Error executing selection query";
        }
    } else {
        echo "Error preparing selection query";
    }
}
?>

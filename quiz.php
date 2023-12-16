<?php
session_start();

require_once "./functions/connections.php";
$pdo = getConnection();
$quizName = $_GET['quiztitle'];

// Get the current question number from the URL or default to 1
$currentQuestionNum = isset($_GET['q']) ? (int)$_GET['q'] : 1;

// Initialize session variables if not set
if (!isset($_SESSION['quiz'][$quizName])) {
    $_SESSION['quiz'][$quizName] = [
        'questions' => [],
        'currentQuestionNum' => 1,
        'correctAnswers' => 0,
    ];
}

// Fetch quiz details
$sqlQuiz = "SELECT * FROM quizzes WHERE quiz_name = :quizName;";
if ($stmtQuiz = $pdo->prepare($sqlQuiz)) {
    $stmtQuiz->bindParam(':quizName', $quizName, PDO::PARAM_STR);
    if ($stmtQuiz->execute()) {
        if ($stmtQuiz->rowCount() >= 1) {
            $haveRows = true;
            while ($rowQuiz = $stmtQuiz->fetch(PDO::FETCH_ASSOC)) {
                // Fetch 10 random questions using LIMIT
                $sqlQuestions = "SELECT questions.question_id, quiz_name, question_text 
                                 FROM quizzes 
                                 INNER JOIN questions ON quizzes.quiz_id = questions.quiz_id 
                                 WHERE quizzes.quiz_id = :quizId
                                 ORDER BY RAND()
                                 LIMIT 10";

                if ($stmtQuestions = $pdo->prepare($sqlQuestions)) {
                    $stmtQuestions->bindParam(':quizId', $rowQuiz['quiz_id'], PDO::PARAM_INT);

                    if ($stmtQuestions->execute()) {
                        $questionCount = $stmtQuestions->rowCount();
                        $totalQuestionNum = $questionCount;

                        if ($_SESSION['quiz'][$quizName]['currentQuestionNum'] <= $questionCount) {
                            $stmtQuestions->setFetchMode(PDO::FETCH_ASSOC);
                            $questions = $stmtQuestions->fetchAll();

                            // Access values from the linked tables
                            $question = $questions[$_SESSION['quiz'][$quizName]['currentQuestionNum'] - 1]["question_text"];
                            $questionId = $questions[$_SESSION['quiz'][$quizName]['currentQuestionNum'] - 1]["question_id"];

                            // Render HTML inside the loop
                            renderHTML($question, $pdo, $questionId, $currentQuestionNum, $totalQuestionNum);

                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                // Process the form submission
                                $selectedAnswer = isset($_POST['selectedAnswer']) ? (int)$_POST['selectedAnswer'] : 0;

                                // Store user choice in session
                                $_SESSION['quiz'][$quizName]['questions'][$questionId] = $selectedAnswer;

                                $_SESSION['quiz'][$quizName]['currentQuestionNum']++;

                                // Redirect to the next question or display quiz completion message
                                if ($_SESSION['quiz'][$quizName]['currentQuestionNum'] <= $totalQuestionNum) {
                                    header("Location: quiz.php?quiztitle=$quizName&q=" . $_SESSION['quiz'][$quizName]['currentQuestionNum']);
                                    exit();
                                } else {
                                    // Calculate and display results, should pass this data to results page
                                    calculateResults($pdo, $quizName, $totalQuestionNum);
                                    exit();
                                }
                            }

                        } else {
                            // Functions when user completed 10 questions
                            echo "You have done 10 question lol, congrats. </br>";
                            echo "Refresh this page to start a new game. (Just for DEBUG)";

                            //TODO Move this session destroyer into results page after use press "Back to QuizzFun" button, I put it here just for debug!
                            session_destroy();
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
    $sqlSelections = "SELECT selection_text, selection_id
                     FROM selections
                     WHERE question_id = :selectionId";

    if ($stmtSelect = $pdo->prepare($sqlSelections)) {
        $stmtSelect->bindParam(':selectionId', $questionId, PDO::PARAM_INT);

        if ($stmtSelect->execute()) {
            // Initialize variables for selections
            $selections = $stmtSelect->fetchAll(PDO::FETCH_ASSOC);

            // Use quiz_template.php as HTML template and include here
            include "./functions/quiz_template.php"; // Include the HTML template file
        } else {
            echo "Error executing selection query";
        }
    } else {
        echo "Error preparing selection query";
    }
}
?>

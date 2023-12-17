<!-- quiz.php -->
<!-- Author: Jack / Manpreet -->

<?php
session_start();

// Include database connection file
require_once './functions/db_connection.php';

// Get question bank ID from the query parameter
$questionBankId = isset($_GET['question_bank_id']) ? (int)$_GET['question_bank_id'] : 1;

// Function to fetch random questions from the question bank
function getRandomQuestions($pdo, $questionBankId, $count = 10) {
    $stmt = $pdo->prepare("SELECT * FROM questions WHERE question_bank_id = :questionBankId ORDER BY RAND() LIMIT :count");
    $stmt->bindParam(':questionBankId', $questionBankId, PDO::PARAM_INT);
    $stmt->bindParam(':count', $count, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$pdo = getConnection();

// Fetch 10 random questions for the specified question bank
$questions = getRandomQuestions($pdo, $questionBankId, 10);

// Save the questions and question bank ID in the session
$_SESSION['questions'] = $questions;
$_SESSION['question_bank_id'] = $questionBankId;
?>

<!doctype html>
<html lang="en" data-bs-theme="auto">
<head>
    <script src="./stylesheet/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>QuizzFun - Quiz</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/list-groups/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="./stylesheet/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0f54c6fb31.js" crossorigin="anonymous"></script>

    <link href="./stylesheet/css/stylesheet.quiz.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- JQuery that can check if all the answer has been answered. -->
    <!-- Use Jquery just make life a bit easier, and I think this is the only place we use JQuery lol -->
    <script>
        $(document).ready(function () {
            $('form').submit(function (event) {
                // Iterate through all radio button groups
                $('input[name^="answer["]').each(function () {
                    var groupName = $(this).attr('name');
                    // Check if any radio button in the group is checked
                    if ($('input[name="' + groupName + '"]:checked').length === 0) {
                        // Show Bootstrap modal
                        $('#questionWarning').modal('show');
                        event.preventDefault(); // Prevent form submission
                        return false;
                    }
                });
            });
        });
    </script>


</head>
<body>

<div class="modal fade" id="questionWarning" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa-solid fa-circle-exclamation"></i> Incomplete Submission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Please answer all questions before submitting.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Oops, Okay!</button>
            </div>
        </div>
    </div>
</div>


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

<div class="container my-5">
    <div class="p-5 text-center bg-body-tertiary rounded-3">
        <img src="./img/banner_<?=$questionBankId?>.png" alt="" class="img-fluid" style="width: 800px;height: 180px;">
    </div>
</div>

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

<div class="b-example-divider"></div>

<form action="results.php" method="post">
    <?php foreach ($questions as $index => $question): ?>
        <div class="d-flex flex-column flex-md-row p-4 gap-4 py-md-5 align-items-center justify-content-center">
            <div class="list-group list-group-radio d-grid gap-2 border-0">
                <div class="position-relative mx-auto p-2">
                    <div class="position-absolute top-50 start-50 translate-middle">
                        <i class="fa-regular fa-circle-question fa-2xl" style="color: #2d78fb;"></i><br>
                    </div>
                </div>

                <div class="position-relative mx-auto p-3">
                <h3 class="text-body-emphasis text-center">
                    <?php echo htmlspecialchars($question['question']); ?>
                </h3>
                </div>

                <?php for ($optionIndex = 1; $optionIndex <= 4; $optionIndex++): ?>
                    <?php $optionImageKey = 'option' . $optionIndex . '_image_path'; ?>
                <!-- FOR IMAGE SELECTIONS -->
                    <?php if ($question[$optionImageKey]): ?>
                        <div class="position-relative">
                            <input class="form-check-input position-absolute top-50 end-0 me-3 fs-5" type="radio" name="answer[<?php echo $index; ?>]" id="listGroupRadioGrid<?php echo $index . '_' . $optionIndex; ?>" value="<?php echo $optionIndex; ?>">
                            <label class="list-group-item py-3 pe-5" for="listGroupRadioGrid<?php echo $index . '_' . $optionIndex; ?>">
                                <img src="<?php echo $question[$optionImageKey]; ?>" alt="Option <?php echo $optionIndex; ?>" style="width:200px;height:120px;" class="rounded mx-auto">
                            </label>
                        </div>
                <!-- FOR NON-IMAGE SELECTIONS -->
                    <?php else: ?>
                        <div class="position-relative">
                            <input class="form-check-input position-absolute top-50 end-0 me-3 fs-5" type="radio" name="answer[<?php echo $index; ?>]" id="listGroupRadioGrid<?php echo $index . '_' . $optionIndex; ?>" value="<?php echo $optionIndex; ?>">
                            <label class="list-group-item py-3 pe-5" for="listGroupRadioGrid<?php echo $index . '_' . $optionIndex; ?>">
                                <strong class="fw-semibold"><?php echo htmlspecialchars($question['option' . $optionIndex]); ?></strong>
<!--                                <span class="d-block small opacity-75">Option --><?php //echo $optionIndex; ?><!--</span>-->
                            </label>
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>

            </div>
        </div>
        <div class="b-example-divider"></div>
    <?php endforeach; ?>

    <div class="d-grid gap-2 col-6 mx-auto p-5">
        <button type="Submit" value="Submit" class="btn btn-primary btn-lg">Submit <i class="fa-solid fa-check"></i></button>
    </div>
</form>




<script src="./stylesheet/js/bootstrap.bundle.js"></script>

</body>
</html>


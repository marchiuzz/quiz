<?php
declare(strict_types=1);

use Quiz\Models\Question;
use Quiz\Models\QuestionChoice;

require_once(__DIR__ . "/../vendor/autoload.php");

include_once(__DIR__ . "/partial/menu.php");

$questionModel = new Question();

$quizSlug = (isset($_GET['quiz']) && !empty($_GET['quiz']) ? $_GET['quiz'] : null);

if($quizSlug === null){
    echo "No quiz slug";
    die(404);
}

$questions = $questionModel->getByQuizSlug($quizSlug);
$questionChoicesModel = new QuestionChoice();
?>

<form action="quiz_result.php" method="post">

    <label for="first_name">First Name</label>
    <input type="text" name="first_name" value="" >
    <br />

    <label for="last_name">Last Name</label>
    <input type="text" name="last_name" value="" >
    <br />

    <label for="email">Email</label>
    <input type="text" name="email" value="" >
    <br />

    <input type="hidden" name="quiz_slug" value="<?= $quizSlug ?>" >

    <?php
    foreach ($questions as $key => $question) {
        ?>
        <ul>
            <?= $key+1?> <?= $question['question'] ?>

            <?php
            $choices = $questionChoicesModel->getByQuestionId($question['id']);

            foreach ($choices as $choice) {
                ?>

                <li>
                    <label>
                    <input type="radio" name="choice_<?= $question['id'] ?>"
                           value="<?= $choice['id'] ?>"> <?= $choice['choice'] ?>
                    </label>
                </li>

                <?
            }
            ?>

        </ul>
        <?
    }
    ?>





    <input type="submit" name="submit_quiz" value="Submit Quiz">
</form>

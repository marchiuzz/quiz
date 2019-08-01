<?php
declare(strict_types=1);

use Quiz\Helpers\ArrayHelper;
use Quiz\Models\QuestionChoice;
use Quiz\Models\QuizResult;

require_once(__DIR__ . "/../vendor/autoload.php");

include_once(__DIR__ . "/partial/menu.php");

$postData = $_POST;

$filteredArray = ArrayHelper::getElementsIndexStart($postData, "choice_");

$choiceModel = new QuestionChoice();


$saveData = [
    'quiz_slug' => $postData['quiz_slug'],
    'first_name' => $postData['first_name'],
    'last_name' => $postData['last_name'],
    'email' => $postData['email'],
    'results' => []
];


$rightCount = 0;
foreach ($filteredArray as $choiceKey => $choiceId) {
    list($string, $questionId) = explode("_", $choiceKey);


    $rightChoice = $choiceModel->isRightChoice((int)$choiceId);
    if ($rightChoice > 0) {
        $rightCount++;
    }

    $saveData['results']['result_data'][] = [
        "question_id" => $questionId,
        "choice_id" => $choiceId,
        "right" => $rightChoice
    ];

}

$resultPercentage = $rightCount * 100 / count($filteredArray);
$saveData['results']['result_percentage'] = $resultPercentage;

$saveData['results'] = json_encode($saveData['results']);

$quizResultModel = new QuizResult();
$quizResultModel->insert($saveData);

?>


Your result is: <?= $resultPercentage ?>%







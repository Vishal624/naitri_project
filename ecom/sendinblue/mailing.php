//working_directory/emailBuilder.php
<?php
require_once(__DIR__ . '/vendor1/autoload.php');

$credentials = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', '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');
$apiInstance = new SendinBlue\Client\Api\TransactionalEmailsApi(new GuzzleHttp\Client(),$credentials);

$sendSmtpEmail = new \SendinBlue\Client\Model\SendSmtpEmail([
     'subject' => 'Testing',
     'sender' => ['name' => 'Mahesh', 'email' => 'vishal0786sandhu@gmail.com'],
     'replyTo' => ['name' => 'Mahesh', 'email' => 'vishal0786sandhu@gmail.com'],
     'to' => [[ 'name' => 'Tanish', 'email' => $email]],
     'htmlContent' => '<html><body><h1>This is a transactional email {{params.bodyMessage}}'.$otp.'</h1></body></html>',
     'params' => ['bodyMessage' => 'made just for you!']
]);

try {
    $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
    print_r($result);
} catch (Exception $e) {
    echo $e->getMessage(),PHP_EOL;
}
// echo "done";
?>
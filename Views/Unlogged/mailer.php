<!-- <?php
require 'vendor/autoload.php'; 

if(isset($_POST['register_btn'])) {
    $email = new \SendGrid\Mail\Mail(); 
    $email->setFrom("hector.vizzavona@eleve.isep.fr", "Hector Vizzavona");
    $email->setSubject("BeCareful - Inscription");
    $email->addTo($_POST['email']);
    $email->addContent(
        "text/html", "<strong>Afin de continuer à utiliser notre plateforme, 
        veuillez vérifier votre adresse email</strong>"
    );
    $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
    try {
        $response = $sendgrid->send($email);
        print $response->statusCode() . "\n";
        print_r($response->headers());
        print $response->body() . "\n";
    } catch (Exception $e) {
        echo 'Caught exception: '. $e->getMessage() ."\n";
    }
} -->
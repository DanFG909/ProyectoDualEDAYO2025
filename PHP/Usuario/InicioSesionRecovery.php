<?php
require_once __DIR__ . '/../vendor/autoload.php';
include(__DIR__ . '/conexion.php'); // archivo de conexión a la base de datos

use Brevo\Client\Api\TransactionalEmailsApi;
use Brevo\Client\Model\SendSmtpEmail;

// API Key de Brevo
$apiKey = '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';

if (!isset($_POST['correo'])) {
    die("Por favor ingresa un correo.");
}
$correoUsuario = $_POST['correo'];

$sql = "SELECT * FROM usuarios WHERE correo = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $correoUsuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("El correo no está registrado.");
}

$codigo = rand(100000, 999999);
$update = $conn->prepare("UPDATE usuarios SET codigo_recuperacion = ? WHERE correo = ?");
$update->bind_param("ss", $codigo, $correoUsuario);
$update->execute();

$config = Brevo\Client\Configuration::getDefaultConfiguration()->setApiKey('api-key', $apiKey);
$apiInstance = new Brevo\Client\Api\TransactionalEmailsApi(
    new GuzzleHttp\Client(),
    $config
);

$sendSmtpEmail = new Brevo\Client\Model\SendSmtpEmail([
    'subject' => 'Código de recuperación',
    'sender' => ['name' => 'Soporte', 'email' => 'alexandersilv7@gmail.com'],
    'to' => [['email' => $correoUsuario]],
    'htmlContent' => '<p>Tu código de recuperación es: <b>' . $codigo . '</b></p><p>Este código expira en 30 minutos.</p>'
]);

try {
    $result = $apiInstance->sendTransacEmail($sendSmtpEmail);
    echo "<script>
    alert('Correo de recuperación enviado correctamente a $correoUsuario');
    window.location.href = 'InicioSesionReset.php';
</script>";
} catch (Exception $e) {
    echo 'Error al enviar el correo: ', $e->getMessage();
}
?>
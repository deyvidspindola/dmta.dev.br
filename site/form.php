<?php
/**
 * DMTA — formulário de contato (hospedagem compartilhada / Apache + PHP)
 *
 * Por padrão usa mail() do PHP.
 * Para SMTP (PHPMailer / provedor), veja o bloco comentado no final deste arquivo.
 */

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Método não permitido.']);
    exit;
}

$name = trim((string) ($_POST['name'] ?? ''));
$whatsapp = trim((string) ($_POST['whatsapp'] ?? ''));
$need = trim((string) ($_POST['need'] ?? ''));

$allowedNeeds = ['Site institucional', 'Sistema sob medida', 'E-commerce', 'Outro'];

if ($name === '' || mb_strlen($name) > 120) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => 'Informe um nome válido.']);
    exit;
}

if ($whatsapp === '' || mb_strlen($whatsapp) > 40) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => 'Informe um WhatsApp válido.']);
    exit;
}

if (! in_array($need, $allowedNeeds, true)) {
    http_response_code(422);
    echo json_encode(['success' => false, 'message' => 'Selecione o que você precisa.']);
    exit;
}

$to = 'contato@dmta.dev.br';
$subject = 'Novo orçamento pelo site — ' . $need;
$body = "Nome: {$name}\nWhatsApp: {$whatsapp}\nNecessidade: {$need}\n\nEnviado pelo formulário do site DMTA.\n";
$headers = [
    'From: contato@dmta.dev.br',
    'Reply-To: contato@dmta.dev.br',
    'Content-Type: text/plain; charset=UTF-8',
    'X-Mailer: PHP/' . phpversion(),
];

$sent = @mail($to, '=?UTF-8?B?' . base64_encode($subject) . '?=', $body, implode("\r\n", $headers));

if (! $sent) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Não foi possível enviar o e-mail agora. Fale no WhatsApp: (19) 98262-4408.',
    ]);
    exit;
}

echo json_encode([
    'success' => true,
    'message' => 'Mensagem enviada. Em breve entraremos em contato.',
]);

/*
|--------------------------------------------------------------------------
| Alternativa SMTP (exemplo com PHPMailer — descomente e adapte)
|--------------------------------------------------------------------------
|
| 1. Faça upload da pasta vendor/ do PHPMailer (ou use Composer na máquina local
|    e suba só o necessário), ou instale via painel da Hostgator se disponível.
|
| 2. Substitua o bloco mail() acima por algo nesta linha:
|
| require __DIR__ . '/vendor/autoload.php';
| use PHPMailer\PHPMailer\PHPMailer;
|
| $mail = new PHPMailer(true);
| $mail->isSMTP();
| $mail->Host       = 'smtp.seudominio.com.br';
| $mail->SMTPAuth   = true;
| $mail->Username   = 'contato@dmta.dev.br';
| $mail->Password   = 'SUA_SENHA';
| $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
| $mail->Port       = 587;
| $mail->CharSet    = 'UTF-8';
| $mail->setFrom('contato@dmta.dev.br', 'DMTA Site');
| $mail->addAddress('contato@dmta.dev.br');
| $mail->Subject = $subject;
| $mail->Body    = $body;
| $mail->send();
|
*/

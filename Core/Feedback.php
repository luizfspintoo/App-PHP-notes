<?php

namespace Core;

use Core\Validator;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use PHPMailer\PHPMailer\PHPMailer;
use Core\Model;


class Feedback
{
    public function createFeedback($name, $email, $body, $currentId)
    {
        $log = new Logger("Feedback usuario ");
        $log->pushHandler(new StreamHandler("../logs/feedback.log", Level::Info));
        try {

            $erros = [];

            if (!Validator::string($name, 3, 50)) {
                $erros["name"] = "Campo obrigatório, mínimo 3 caracteres";
            }

            if (!Validator::string($body, 10, 255)) {
                $erros["body"] = "Campo obrigatório, preencha acima de 10 caracteres por favor";
            }

            if (empty($erros)) {
                $model = new Model();
                $model->insertFeedback($name, $email, $body, $currentId);

                $log->info("Feedback enviada com sucesso ao banco de dados");

                //configuração de SMTP
                $phpmailer = new PHPMailer();
                $phpmailer->isSMTP();
                $phpmailer->Host = '';
                $phpmailer->SMTPAuth = '';
                $phpmailer->Port = '';
                $phpmailer->Username = '';
                $phpmailer->Password = '';
                $phpmailer->setFrom($email, $name);
                $phpmailer->addAddress('emailteste@gmail.com', 'NoteSync');

                $date = date('d/m/Y H:i:s');
                $html_email = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html dir="ltr" lang="pt-br">
<head>
    <meta charset=UTF-8"/>
</head>
<body style="background-color:#f6f9fc;font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Ubuntu,sans-serif">
    <table align="center" width="100%" border="0" cellPadding="0" cellSpacing="0" role="presentation" style="max-width:37.5em;background-color:#ffffff;margin:0 auto;padding:20px 0 48px;margin-bottom:64px">
        <tbody>
            <tr style="width:100%">
                <td>
                    <table align="center" width="100%" border="0" cellPadding="0" cellSpacing="0" role="presentation" style="padding:0 48px">
                        <tbody>
                            <tr>
                                <td>
                                    <h1>Note<span style="color: #6a5acd";>Sync</span></h1>
                                    <hr style="width:100%;border:none;border-top:1px solid #eaeaea;border-color:#e6ebf1;margin:20px 0" />
                                    <p style="font-size:16px;line-height:24px;margin:16px 0;color:#525f7f;text-align:left">NoteSync recebeu um novo feedback de ' . $name . '</p>

                                    <p style="font-size:16px;line-height:24px;margin:16px 0;color:#525f7f;text-align:left">Email: ' . $email . '</p>
                                    <hr style="width:100%;border:none;border-top:1px solid #eaeaea;border-color:#e6ebf1;margin:20px 0" />
                                    <p style="font-size:16px;line-height:24px;margin:16px 0;color:#525f7f;text-align:left">Feedback</p>

                                    <p style="font-size:16px;line-height:24px;margin:16px 0;color:#525f7f;text-align:left">' . $body . '</p>
                                    
                                    
                                    <hr style="width:100%;border:none;border-top:1px solid #eaeaea;border-color:#e6ebf1;margin:20px 0" />
                                    <p style="font-size:12px;line-height:16px;margin:16px 0;color:#8898aa">NoteSync, ' . $date . '</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</body>
</html>
';



                //conteudo
                $phpmailer->isHTML(true);
                $phpmailer->Subject = 'Feedback da plataforma NoteSync';
                $phpmailer->Body = $html_email;
                $phpmailer->send();

                $log->info("Feedback enviada com sucesso, para email");
                redirect("/dashboard");
            }
            return $erros;
        } catch (\Exception $e) {
            if ($e->getMessage() == "DATABASE_ERROR") {
                $erros["erro"] = "Houve um erro ao enviar feedback";
                $log->info("Houve um erro ao enviar feedback");
            } else {
                $erros["erro"] = "Erro desconhecido";
            }
            return $erros;
        }
    }
}

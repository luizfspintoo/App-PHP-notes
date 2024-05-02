<?php

namespace Core;

use Core\Models\FeedbackModel;
use Dotenv\Dotenv;
use Core\Validator;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

class Feedback
{
    private $feedbackModel;

    public function __construct()
    {
        $this->feedbackModel = new FeedbackModel();
    }

    public function createFeedback($name, $email, $body, $currentId)
    {
        $log = new Logger("Feedback usuario ");
        $log->pushHandler(new StreamHandler("../logs/feedback.log", Level::Info));

        $dotenv = Dotenv::createImmutable(__DIR__ . '/../');
        $dotenv->load();

        try {
            $erros = [];
            if (!Validator::string($name, 3, 50)) {
                $erros["name"] = "Campo obrigatório, mínimo 3 caracteres";
            }

            if (!Validator::string($body, 10, 255)) {
                $erros["body"] = "Campo obrigatório, preencha acima de 10 caracteres por favor";
            }

            if (!empty($erros)) {
                return $erros;
            }

            $this->feedbackModel->insertFeedback($name, $email, $body, $currentId);
            $body = $this->mailTemplate($name, $email, $body, date("d/m/Y"));

            App::resolve(EmailProvider::class)->sendEmail($email, $name, $body);
            $log->info("Feedback enviado com sucesso");

            redirect("/dashboard");
        } catch (\Exception $e) {
            if ($e->getMessage() == "DATABASE_ERROR") {
                $erros["erro"] = "Houve um erro ao enviar feedback";
            } else {
                $erros["erro"] = "Erro desconhecido";
            }
            $log->error($e);
            return $erros;
        }
    }

    private function mailTemplate($name, $email, $body, $date)
    {
        return "<!DOCTYPE html>
    <html dir='ltr' lang='pt-br'>
    <head>
        <meta charset='UTF-8'/>
    </head>
    <body style='background-color:#f6f9fc;font-family:-apple-system,BlinkMacSystemFont,&quot;Segoe UI&quot;,Roboto,&quot;Helvetica Neue&quot;,Ubuntu,sans-serif'>
        <table align='center' width='100%' border='0' cellPadding='0' cellSpacing='0' role='presentation' style='max-width:37.5em;background-color:#ffffff;margin:0 auto;padding:20px 0 48px;margin-bottom:64px'>
            <tbody>
                <tr style='width:100%'>
                    <td>
                        <table align='center' width='100%' border='0' cellPadding='0' cellSpacing='0' role='presentation' style='padding:0 48px'>
                            <tbody>
                                <tr>
                                    <td>
                                        <h1>Note<span style='color: #6a5acd';>Sync</span></h1>
                                        <hr style='width:100%;border:none;border-top:1px solid #eaeaea;border-color:#e6ebf1;margin:20px 0' />
                                        <p style='font-size:16px;line-height:24px;margin:16px 0;color:#525f7f;text-align:left'>NoteSync recebeu um novo feedback de $name</p>
    
                                        <p style='font-size:16px;line-height:24px;margin:16px 0;color:#525f7f;text-align:left'>Email: $email</p>
                                        <hr style='width:100%;border:none;border-top:1px solid #eaeaea;border-color:#e6ebf1;margin:20px 0' />
                                        <p style='font-size:16px;line-height:24px;margin:16px 0;color:#525f7f;text-align:left'>Feedback</p>
    
                                        <p style='font-size:16px;line-height:24px;margin:16px 0;color:#525f7f;text-align:left'>$body</p>
                                        
                                        
                                        <hr style='width:100%;border:none;border-top:1px solid #eaeaea;border-color:#e6ebf1;margin:20px 0' />
                                        <p style='font-size:12px;line-height:16px;margin:16px 0;color:#8898aa'>NoteSync, $date</p>
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
    ";
    }
}



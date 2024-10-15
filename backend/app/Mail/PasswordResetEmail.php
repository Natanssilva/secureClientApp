<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

/**
 * Classe de personalização do email de recuperação de senha por email
 */
class PasswordResetEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var string
     */
    private  $solicitante;

    /**
     * @var string
     */
    private  $nom_usuario;

    /**
     * @var string
     */
    private  $link;

    /**
     * @var string
     */
    private  $saudacao;


    /**
     * @var string
     */
    private  $dat_solicitacao;

    public function __construct($solicitante, $nom_usuario, $link, $saudacao,  $dat_solicitacao)
    {
        $this->solicitante = $solicitante;
        $this->nom_usuario = $nom_usuario;
        $this->link = $link;
        $this->saudacao = $saudacao;
        $this->dat_solicitacao = $dat_solicitacao;
    }

    /**
     * Função para definiri propriedades de envio do email
     * 
     * @return Envelope
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Redefinição de Senha',
            to: $this->solicitante
        );
    }

    /**
     * Função para personalizar o corpo do email
     * 
     * @return Content
     */
    public function content(): Content
    {
        return new Content(
            view: 'modelo_email_redefinicao_senha',
            with: [
                'saudacao' => $this->saudacao,
                'nom_usuario' => $this->nom_usuario,
                'link' => $this->link,
                'dat_solicitacao' => $this->dat_solicitacao,
            ],
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}

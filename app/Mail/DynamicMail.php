<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DynamicMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;      // Email data
    public $template;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @param string $template  The Blade template path
     * @param string $subject   Email subject
     * @param array  $data      Dynamic data to inject into the template
     */
    public function __construct(string $template, string $subject, array $data)
    {
        $this->template = $template;
        $this->subject = $subject;
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)
            ->view($this->template)
            ->with($this->data);
    }
}

<?php

namespace App\Mail\File;

use App\Models\File\File;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FileApproved extends Mailable
{
    use Queueable, SerializesModels;
    public $file;
    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(File $file)
    {
        $this->file = $file;
        $this->user = $file->user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('your file has been approved.')
                    ->view('mails.file.new.approved');
    }
}

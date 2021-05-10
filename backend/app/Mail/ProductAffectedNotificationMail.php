<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ProductAffectedNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    private $username;
    private $prodct_name;
    private $product_version;
    private $cve;
    private $cve_id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($username, $product_name, $product_version, $cve, $cve_id)
    {
        $this->username = $username;
        $this->product_name = $product_name;
        $this->product_version = $product_version;
        $this->cve = $cve;
        $this->cve_id = $cve_id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view(
            'email.notification', ['username' => $this->username, 'product_name' => $this->product_name,
                                    'product_version' => $this->product_version, 'cve' => $this->cve,
                                    'cve_id' => $this->cve_id]
            )->subject('ウォッチ中の製品に関連する脆弱性が新たに登録されました。');
    }
}

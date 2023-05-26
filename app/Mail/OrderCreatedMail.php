<?php

namespace App\Mail;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class OrderCreatedMail extends Mailable
{
    use Queueable, SerializesModels;

    public Order $order;
    public $futureDate;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Создан заказ ForgeNight',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
//        $futureDate = date('d.m.Y', strtotime('+5 days'));
        $futureDate = date('Y-m-d', strtotime('+5 days'));
        $user = auth()->user();
        return new Content(

            view: 'mails.created-order',
            with: [
                'products' => $this->order->products()->get(),
                'total' => $this->order->total,
                'user' => $user,
                // не выводится дата вообще
                'futureDate' => $futureDate,
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, Attachment>
     */
    public function build(): array
    {
        return [
            'subject' => 'Ваш заказ был успешно создан',
            'view' => 'mails.created-order',
            'attach' => public_path('images/logo/webp/forgenight_logo.webp'),
            'options' => [
                'as' => 'photo.webp',
                'mime' => 'image/webp'
            ],
        ];
    }

//    public function attachments(): array
//    {
//        return [];
//    }
}

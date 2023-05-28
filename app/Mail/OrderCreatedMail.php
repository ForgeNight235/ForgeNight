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
use Carbon\Carbon;

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
        $user = auth()->user();
        $orderReadyDate = Carbon::parse($this->order->created_at)->addDays(5)->locale('ru')->isoFormat('D MMMM YYYY, dddd');
        $quantity = $this->order->products()->pluck('quantity', 'id');
        return new Content(

            view: 'mails.created-order',
            with: [
                'products' => $this->order->products()->get(),
                'total' => $this->order->total,
                'user' => $user,
                'date' => $orderReadyDate,
                'quantity' => $quantity,
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

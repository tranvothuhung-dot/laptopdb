<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderNotification extends Notification
{
    use Queueable;

    public $orderId;
    public $paymentMethod;
    public $items;
    public $total;

    /**
     * Create a new notification instance.
     */
    public function __construct($orderId, $paymentMethod, $items = [], $total = 0)
    {
        $this->orderId = $orderId;
        $this->paymentMethod = $paymentMethod;
        $this->items = $items;
        $this->total = $total;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable)
    {
        $mail = (new \Illuminate\Notifications\Messages\MailMessage)
                    ->subject('Xác nhận đơn hàng #' . $this->orderId)
                    ->greeting('Xin chào,')
                    ->line("Đơn hàng #{$this->orderId} của bạn đã được ghi nhận.")
                    ->line("Hình thức thanh toán: {$this->paymentMethod}")
                    ->line('Chi tiết đơn hàng:');

        foreach ($this->items as $item) {
            $mail->line("- {$item['title']} x{$item['quantity']} : " . number_format($item['price'], 0, ',', '.') . "đ = " . number_format($item['subtotal'], 0, ',', '.') . "đ");
        }

        $mail->line('Tổng giá trị đơn hàng: ' . number_format($this->total, 0, ',', '.') . 'đ');

        return $mail->line('Cảm ơn bạn đã đặt hàng và sử dụng dịch vụ của chúng tôi.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}

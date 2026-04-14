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

    /**
     * Create a new notification instance.
     */
    public function __construct($orderId, $paymentMethod)
    {
        $this->orderId = $orderId;
        $this->paymentMethod = $paymentMethod;
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
        return (new \Illuminate\Notifications\Messages\MailMessage)
                    ->subject('Thông báo: Có đơn hàng mới từ hệ thống!')
                    ->line("Đơn hàng #{$this->orderId} đã được tạo.")
                    ->line("Hình thức thanh toán: {$this->paymentMethod}")
                    ->line('Hệ thống vừa nhận được một đơn đặt hàng mới.')
                    ->line('Vui lòng kiểm tra quản trị để xử lý.')
                    ->action('Xem chi tiết đơn hàng', url('/admin/orders'))
                    ->line('Cảm ơn bạn đã sử dụng hệ thống!');
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

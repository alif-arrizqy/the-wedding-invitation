<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Illuminate\Http\Request;

class GuestInvitationController extends Controller
{
    public function bulkSend(Request $request)
    {
        $ids = explode(',', $request->ids);
        $guests = Guest::whereIn('id', $ids)->get();

        return view('guest.bulk-send', compact('guests'));
    }

    public function viewMessage(Guest $guest)
    {
        // Template pesan undangan
        $message = "Assalamualaikum Wr. Wb.\n";
        $message .= "Kepada Yth.\n";
        $message .= "Bapak/Ibu/Saudara/i\n";
        $message .= "*{$guest->name}*\n";
        $message .= "di tempat\n\n";
        $message .= "Bismillahirrahmanirrahim.\n";
        $message .= "Dengan memohon rahmat dan ridho Allah SWT, kami mengundang Bapak/Ibu/Saudara/i untuk menghadiri acara pernikahan kami.\n\n";
        $message .= "📅 Minggu, 1 Juni 2025\n";
        $message .= "🕒 Pukul 10:00 WIB\n";
        $message .= "🏠 Alamat: Kediaman Mempelai Wanita (Perum Griya Pratama Mas, Blok B4/ No. 2, Desa Cikarageman, Kecamatan Setu, Bekasi)\n\n";
        $message .= "Silakan kunjungi link undangan digital kami:\n{$guest->url}\n\n";
        $message .= "Kehadiran Bapak/Ibu/Saudara/i sangat berarti bagi kami.\n\n";
        $message .= "Atas perhatiannya kami ucapkan terima kasih.\n";
        $message .= "Wassalamualaikum Wr. Wb.\n\n";
        $message .= "Kami yang berbahagia,\n";
        $message .= "*Alif & Pika*\n";

        // Generate WhatsApp URL
        $whatsappLink = "https://api.whatsapp.com/send?text=" . urlencode($message);

        return view('guest.view-message', compact('guest', 'message', 'whatsappLink'));
    }
}

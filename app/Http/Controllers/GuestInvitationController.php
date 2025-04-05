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
        $message = "Assalamu'alaikum Wr. Wb.\n\n";
        $message .= "Dengan memohon rahmat dan ridho Allah SWT, kami mengundang Bapak/Ibu/Saudara/i *{$guest->name}* untuk menghadiri acara pernikahan kami.\n\n";
        $message .= "Silakan kunjungi link undangan digital kami:\n{$guest->url}\n\n";
        $message .= "Kehadiran Bapak/Ibu/Saudara/i sangat berarti bagi kami.\n\n";
        $message .= "Atas perhatiannya kami ucapkan terima kasih.\n\n";
        $message .= "Wassalamu'alaikum Wr. Wb.";

        // Generate WhatsApp URL
        $whatsappLink = "https://api.whatsapp.com/send?text=" . urlencode($message);

        return view('guest.view-message', compact('guest', 'message', 'whatsappLink'));
    }
}

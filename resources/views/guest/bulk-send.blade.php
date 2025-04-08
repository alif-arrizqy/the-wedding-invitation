<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-xl font-bold mb-6">Kirim Undangan Massal</h2>
                <p class="mb-4">Total: {{ $guests->count() }} tamu</p>

                <div class="space-y-6">
                    @foreach($guests as $guest)
                        <div class="border rounded-lg p-4">
                            <h3 class="text-lg font-semibold mb-2">{{ $guest->name }}</h3>
                            <p class="text-sm text-gray-500 mb-4">{{ $guest->isVIP ? 'VIP' : 'Non-VIP' }}</p>

                            @php
                                $message = "Assalamu'alaikum Wr. Wb.\n";
                                $message .= "Kepada Yth.\n";
                                $message .= "Bapak/Ibu/Saudara/i\n";
                                $message .= "*{$guest->name}*\n";
                                $message .= "di tempat\n\n";
                                $message .= "Bismillahirrahmanirrahim.\n";
                                $message .= "Dengan memohon rahmat dan ridho Allah SWT, kami mengundang Bapak/Ibu/Saudara/i untuk menghadiri acara pernikahan kami.\n\n";
                                $message .= "📅 Minggu, 1 Juni 2025\n";
                                $message .= "🕒 Pukul 09.00 WIB\n";
                                $message .= "🏠 Alamat: Kediaman Mempelai Wanita (Perum Griya Pratama Mas, Blok B4/ No. 2, Desa Cikarageman, Kecamatan Setu, Bekasi)\n\n";
                                $message .= "Silakan kunjungi link undangan digital kami:\n{$guest->url}\n\n";
                                $message .= "Kehadiran Bapak/Ibu/Saudara/i sangat berarti bagi kami.\n\n";
                                $message .= "Atas perhatiannya kami ucapkan terima kasih.\n";
                                $message .= "Wassalamu'alaikum Wr. Wb.\n\n";
                                $message .= "Kami yang berbahagia,\n";
                                $message .= "*Alif & Pika*\n";

                                $whatsappLink = "https://api.whatsapp.com/send?text=" . urlencode($message);
                            @endphp

                            <div class="flex space-x-3">
                                <a href="{{ $whatsappLink }}" target="_blank" class="px-3 py-1 bg-green-500 text-white text-sm rounded hover:bg-green-600">
                                    Kirim via WhatsApp
                                </a>

                                <button onclick="copyMessage{{ $guest->id }}()" class="px-3 py-1 bg-blue-500 text-white text-sm rounded hover:bg-blue-600">
                                    Salin Pesan
                                </button>

                                <textarea id="message{{ $guest->id }}" class="hidden">{{ $message }}</textarea>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        @foreach($guests as $guest)
            function copyMessage{{ $guest->id }}() {
                const messageElement = document.getElementById('message{{ $guest->id }}');
                messageElement.classList.remove('hidden');
                messageElement.select();
                document.execCommand('copy');
                messageElement.classList.add('hidden');
                alert('Pesan undangan untuk {{ $guest->name }} berhasil disalin ke clipboard!');
            }
        @endforeach
    </script>
</x-app-layout>

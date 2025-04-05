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
                                $message = "Assalamu'alaikum Wr. Wb.\n\nDengan memohon rahmat dan ridho Allah SWT, kami mengundang Bapak/Ibu/Saudara/i *{$guest->name}* untuk menghadiri acara pernikahan kami.\n\nSilakan kunjungi link undangan digital kami:\n{$guest->url}\n\nKehadiran Bapak/Ibu/Saudara/i sangat berarti bagi kami.\n\nAtas perhatiannya kami ucapkan terima kasih.\n\nWassalamu'alaikum Wr. Wb.";
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

<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h2 class="text-xl font-bold mb-4">Undangan untuk: {{ $guest->name }}</h2>

                <div class="bg-gray-100 p-4 rounded mb-4 whitespace-pre-line">
                    {!! nl2br(e($message)) !!}
                </div>

                <div class="flex space-x-4">
                    <button onclick="copyToClipboard()" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                        Salin Pesan
                    </button>

                    <a href="{{ $whatsappLink }}" target="_blank" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                        Kirim via WhatsApp
                    </a>
                </div>

                <textarea id="messageContent" class="hidden">{{ $message }}</textarea>
            </div>
        </div>
    </div>

    <script>
        function copyToClipboard() {
            const messageElement = document.getElementById('messageContent');
            messageElement.classList.remove('hidden');
            messageElement.select();
            document.execCommand('copy');
            messageElement.classList.add('hidden');
            alert('Pesan undangan berhasil disalin ke clipboard!');
        }
    </script>
</x-app-layout>

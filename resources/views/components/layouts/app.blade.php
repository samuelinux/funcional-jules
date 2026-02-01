<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Gestão de Identidade Funcional' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">
    <div class="min-h-screen">
        @auth
            <nav class="bg-white border-b border-gray-200">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex justify-between h-16">
                        <div class="flex">
                            <div class="shrink-0 flex items-center">
                                <a href="#" class="font-bold text-xl text-blue-600">
                                    Identidade Digital
                                </a>
                            </div>
                            <div class="hidden sm:-my-px sm:ml-6 sm:flex sm:space-x-8">
                                @if(auth()->user()->perfil === 'admin')
                                    <a href="{{ route('admin.dashboard') }}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                        Dashboard
                                    </a>
                                    <a href="{{ route('admin.usuarios') }}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                        Usuários
                                    </a>
                                @else
                                    <a href="{{ route('usuario.dashboard') }}" class="border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">
                                        Minha Carteira
                                    </a>
                                @endif
                            </div>
                        </div>
                        <div class="flex items-center">
                            <span class="mr-4 text-sm text-gray-600">{{ auth()->user()->name }}</span>
                            <livewire:auth.logout />
                        </div>
                    </div>
                </div>
            </nav>
        @endauth

        <main class="py-10">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </div>
        </main>
    </div>
    
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('swal', (event) => {
                const data = event[0] || event;
                Swal.fire({
                    title: data.title,
                    text: data.text,
                    icon: data.icon,
                    confirmButtonText: 'OK'
                });
            });
        });
    </script>
</body>
</html>

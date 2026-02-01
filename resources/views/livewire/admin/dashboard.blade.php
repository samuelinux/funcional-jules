<div>
    <h1 class="text-2xl font-bold mb-6">Visão Geral</h1>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="px-4 py-5 sm:p-6">
                <dt class="text-sm font-medium text-gray-500 truncate">Total de Usuários</dt>
                <dd class="mt-1 text-3xl font-semibold text-gray-900">{{ $totalUsuarios }}</dd>
            </div>
        </div>
    </div>

    <div class="bg-white shadow rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg leading-6 font-medium text-gray-900">Usuários Recentes</h3>
        </div>
        <ul role="list" class="divide-y divide-gray-200">
            @foreach($usuariosRecentes as $user)
            <li class="px-4 py-4 sm:px-6">
                <div class="flex items-center justify-between">
                    <p class="text-sm font-medium text-blue-600 truncate">{{ $user->name }}</p>
                    <div class="ml-2 flex-shrink-0 flex">
                        <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $user->perfil === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800' }}">
                            {{ ucfirst($user->perfil) }}
                        </p>
                    </div>
                </div>
                <div class="mt-2 sm:flex sm:justify-between">
                    <div class="sm:flex">
                        <p class="flex items-center text-sm text-gray-500">
                            {{ $user->email }}
                        </p>
                    </div>
                    <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                        <p>Cadastrado em {{ $user->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</div>

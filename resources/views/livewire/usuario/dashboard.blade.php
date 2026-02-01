<div>
    <h1 class="text-2xl font-bold mb-6">Minha Carteira Funcional</h1>

    <div class="bg-white overflow-hidden shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:p-6">
            @if(auth()->user()->caminho_funcional)
                <div class="text-center">
                    <svg class="mx-auto h-12 w-12 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="mt-2 text-lg font-medium text-gray-900">Documento Ativo</h3>
                    <p class="mt-1 text-sm text-gray-500">Sua carteira funcional está disponível.</p>
                    <div class="mt-6">
                        <a href="{{ route('usuario.funcional') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Visualizar Carteira
                        </a>
                    </div>
                </div>
            @else
                <div class="text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                    </svg>
                    <h3 class="mt-2 text-lg font-medium text-gray-900">Nenhum documento encontrado</h3>
                    <p class="mt-1 text-sm text-gray-500">Você ainda não enviou sua carteira funcional.</p>
                    <div class="mt-6">
                        <a href="{{ route('usuario.funcional') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Enviar Documento
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

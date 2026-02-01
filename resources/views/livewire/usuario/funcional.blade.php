<div class="space-y-6">
    <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Carteira Funcional</h3>
                <p class="mt-1 text-sm text-gray-500">
                    Envie seu documento em formato PDF.
                </p>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form wire:submit="save">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-4">
                            <label class="block text-sm font-medium text-gray-700">Arquivo PDF (Max 2MB)</label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                        <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                    <div class="flex text-sm text-gray-600">
                                        <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                            <span>Carregar arquivo</span>
                                            <input wire:model="arquivo" id="file-upload" name="file-upload" type="file" class="sr-only" accept="application/pdf">
                                        </label>
                                        <p class="pl-1">ou arraste e solte</p>
                                    </div>
                                    <p class="text-xs text-gray-500">PDF até 2MB</p>
                                </div>
                            </div>
                            @error('arquivo') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                            
                            <div wire:loading wire:target="arquivo" class="text-sm text-gray-500 mt-2">
                                Carregando...
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <span wire:loading.remove wire:target="save">Salvar</span>
                            <span wire:loading wire:target="save">Salvando...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if($caminhoArquivo)
    <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6 h-[800px]">
        <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Visualização</h3>
        <iframe src="{{ route('documento.funcional') }}" class="w-full h-full" frameborder="0"></iframe>
    </div>
    @endif
</div>

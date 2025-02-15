<div>
     
    {{-- Modal de validación de edad --}}
    @if ($mostrarModal)
        <!-- Contenedor del modal con posición fija, fondo semitransparente y desenfoque -->
        <div class="fixed inset-0 flex items-center justify-center z-50">
            <!-- Capa de fondo: oscurece y desenfoca el contenido de fondo -->
            <div class="absolute inset-0 bg-black bg-opacity-50 backdrop-blur-sm"></div>

            <!-- Caja del Modal: centrado, responsivo y con fondo rojo -->
            <div class="relative bg-red-900 border border-red-800 rounded-lg shadow-lg p-6 w-11/12 max-w-md z-50">
                <h2 class="text-2xl font-bold text-center mb-4 text-pink-300">Validación de Edad</h2>
                <p class="text-center mb-4 text-white">Debes confirmar tu edad para continuar.</p>

                <input 
                    type="number"
                    wire:model="edad"
                    placeholder="Ingresa tu edad"
                    class="w-full p-2 border border-red-700 rounded mb-4 bg-red-950 text-white focus:outline-none focus:ring-2 focus:ring-red-500"
                />

                @if (session()->has('error'))
                    <p class="text-red-300 text-center mb-4">{{ session('error') }}</p>
                @endif

                <div class="flex justify-center items-center space-x-4">
                    <button
                        wire:click="validarEdad"
                        wire:loading.attr="disabled"
                        wire:target="validarEdad"
                        class="px-4 py-2 bg-orange-700 border border-white  text-white rounded hover:bg-green-500 transition disabled:opacity-50"
                    >
                        Confirmar
                    </button>
                    <!-- Texto o spinner de carga -->
                    <span wire:loading wire:target="validarEdad" class="text-red-300">
                        Comprobando edad...
                    </span>
                </div>
            </div>
        </div>
    @endif

    {{-- Contenido de la página --}}
    <div @if($mostrarModal) style="filter: blur(5px); pointer-events: none;" @endif>
        {!! $body !!}
    </div>
</div>

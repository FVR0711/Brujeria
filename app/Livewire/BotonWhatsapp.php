<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cliente;
use Illuminate\Support\Facades\Http;

class BotonWhatsapp extends Component
{
    public $ip;
    public $ubicacion;
    public $edad;
    public $mostrarModal = true;
    public $body;

    public function mount($body)
    {
        // Recibimos el contenido de la página (body)
        $this->body = $body;

        // Si ya se validó la edad en sesión, no mostramos el modal
        if (session()->has('age_validated') && session('age_validated') === true) {
            $this->mostrarModal = false;
        } else {
            // Obtiene la IP y la ubicación (se usa la API de ipinfo.io)
            $this->ip = request()->ip();
            $response = Http::get("https://ipinfo.io/{$this->ip}/json");
            $this->ubicacion = $response->successful() ? ($response->json()['city'] ?? 'Desconocida') : 'Desconocida';
        }
    }

    public function validarEdad()
    {
        // Si es menor de 18, redirige fuera de la página
        if ($this->edad < 18) {
            session()->flash('error', 'Debes ser mayor de 18 años para ingresar.');
            return redirect()->to('https://www.google.com'); // Cambia la URL según tus necesidades
        }

        // Si es mayor de 18, guarda los datos en la base de datos
        Cliente::create([
            'ip'         => $this->ip,
            'edad'       => $this->edad,
            'ubicacion'  => $this->ubicacion,
        ]);

        // Guarda en sesión que la edad fue validada y oculta el modal
        session()->put('age_validated', true);
        $this->mostrarModal = false;
    }

    public function render()
    {
        return view('livewire.boton-whatsapp');
    }
}

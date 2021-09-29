<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Trabajador;

class Trabajadores extends Component
{

    public $trabajadores, $nombre, $apellidos, $area, $cargo, $trabajador_id;
    public $isOpen = 0;

    public function render()
    {
        $this->trabajadores = Trabajador::all();
        return view('livewire.trabajadores');
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields(){
        $this->nombre = '';
        $this->apellidos = '';
        $this->area = '';
        $this->cargo = '';
        $this->trabajador_id = '';
    }

    public function store()
    {
        $this->validate([
            'nombre' => 'required',
            'apellidos' => 'required',
            'area' => 'required',
            'cargo' => 'required',
        ]);
   
        Trabajador::updateOrCreate(['id' => $this->trabajador_id], [
            'nombre' => $this->nombre,
            'apellidos' => $this->apellidos,
            'area' => $this->area,
            'cargo' => $this->cargo,
        ]);
  
        session()->flash('message', 
            $this->trabajador_id ? 'Se actualizo correctamente.' : 'Se creo correctamente.');
  
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $trabajador = Trabajador::findOrFail($id);
        $this->trabajador_id = $id;
        $this->nombre = $trabajador->nombre;
        $this->apellidos = $trabajador->apellidos;
        $this->area = $trabajador->area;
        $this->cargo = $trabajador->cargo;
    
        $this->openModal();
    }

    public function delete($id)
    {
        Trabajador::find($id)->delete();
        session()->flash('message', 'Se elimino correctamente.');
    }
}

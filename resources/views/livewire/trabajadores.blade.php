<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        CRUD Trabajador
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message') }}</p>
                    </div>
                  </div>
                </div>
            @endif
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Crear Nuevo Trabajador</button>
            @if($isOpen)
                @include('livewire.create')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Nombre</th>
                        <th class="px-4 py-2">Apellidos</th>
                        <th class="px-4 py-2">Area</th>
                        <th class="px-4 py-2">Cargo</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trabajadores as $trabajador)
                    <tr>
                        <td class="border px-4 py-2">{{ $trabajador->id }}</td>
                        <td class="border px-4 py-2">{{ $trabajador->nombre }}</td>
                        <td class="border px-4 py-2">{{ $trabajador->apellidos }}</td>
                        <td class="border px-4 py-2">{{ $trabajador->area }}</td>
                        <td class="border px-4 py-2">{{ $trabajador->cargo }}</td>
                        <td class="border px-4 py-2">
                        <button wire:click="edit({{ $trabajador->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $trabajador->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
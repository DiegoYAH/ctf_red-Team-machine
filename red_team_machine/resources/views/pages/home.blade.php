@extends('layouts.master')

@section('title', 'Home')
@section('descripcion_pagina', 'Benvingut a Sanitech, el teu espai de salut digital.')

@section('content')

    <main class="homeContainer">
        @if (session('status'))
            <div id="alertaExito">
                <aletraExito :mensaje='@json(session('status'))'>
                    </alertaExito>
            </div>
        @endif

        <section class="info">
            <h1 class="regular">Hola {{ auth()->user()->name }},</h1>
            <h2 class="regular">Benvingut al teu espai de salut digital.</h2>
            @if (auth()->user()->last_connection !== null)
                <span class="homeContainer-ultima-conexion"><strong>Última connexió:</strong>
                    {{ auth()->user()->last_connection }} </span>
            @endif
        </section>

        @if (auth()->user()->rol === 'paciente')
            <section class="opciones">
                <a href="{{ route('agenda', ['id' => auth()->user()->id]) }}">
                    <div class="opciones-opcion">
                        <div class="opciones-opcion-card">
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                        <h4 class="medionegrita">Agenda</h4>
                    </div>
                </a>

                <a href="{{ route('informesClinicos', ['id' => auth()->user()->id]) }}">
                    <div class="opciones-opcion">
                        <div class="opciones-opcion-card">
                            <i class="fa-solid fa-microscope"></i>
                        </div>
                        <h4 class="medionegrita">Informes i resultats</h4>
                    </div>
                </a>

                <a href="{{ route('solicitudes') }}">
                    <div class="opciones-opcion">
                        <div class="opciones-opcion-card">
                            <i class="fa-solid fa-question"></i>
                        </div>
                        <h4 class="medionegrita">Solicituts</h4>
                    </div>
                </a>

                <a href="{{ route('notificaciones', ['id' => auth()->user()->id]) }}">
                    <div class="opciones-opcion">
                        <div class="opciones-opcion-card">
                            <i class="fa-solid fa-bell"></i>
                            @if ($cantidad > 0)
                                <div class="opciones-opcion-card-notificacion">{{ $cantidad }}</div>
                            @endif
                        </div>
                        <h4 class="medionegrita">Notificacions</h4>
                    </div>
                </a>
            </section>
        @elseif(auth()->user()->rol === 'medico')
            <section class="opciones">
                <a href="{{ route('buscadorPacientes', ['accion' => 'crearCita']) }}">
                    <div class="opciones-opcion">
                        <div class="opciones-opcion-card">
                            <i class="fa-solid fa-calendar-days"></i>
                        </div>
                        <h4 class="medionegrita">Crear cita</h4>
                    </div>
                </a>

                <a href="{{ route('buscadorPacientes', ['accion' => 'resultadosPaciente']) }}">
                    <div class="opciones-opcion">
                        <div class="opciones-opcion-card">
                            <i class="fa-solid fa-square-poll-vertical"></i>
                        </div>
                        <h4 class="medionegrita">Resultats dels pacients</h4>
                    </div>
                </a>

                <a href="{{ route('buscadorPacientes', ['accion' => 'agendaPaciente']) }}">
                    <div class="opciones-opcion">
                        <div class="opciones-opcion-card">
                            <i class="fa-solid fa-address-book"></i>
                        </div>
                        <h4 class="medionegrita">Agenda dels pacients</h4>
                    </div>
                </a>
            </section>
        @elseif(auth()->user()->rol === 'admin')
            <section class="opciones">
                <a href="{{ route('tareas') }}">
                    <div class="opciones-opcion">
                        <div class="opciones-opcion-card">
                            <i class="fa-solid fa-tarp"></i>
                        </div>
                        <h4 class="medionegrita">Tasques</h4>
                    </div>
                </a>
                <a href="{{ route('buscadorMedicos', ['accion' => 'agendaMedico']) }}">
                    <div class="opciones-opcion">
                        <div class="opciones-opcion-card">
                            <i class="fa-solid fa-address-book"></i>
                        </div>
                        <h4 class="medionegrita">Agenda dels metges</h4>
                    </div>
                </a>
            </section>
        @endif
    </main>

@endsection

@extends('layouts.master')

@section('title', 'Home')
@section('descripcion_pagina', 'Welcome to Avengers Server.')

@section('content')

    <main class="homeContainer">
        @if (session('status'))
            <div id="alertaExito">
                <aletraExito :mensaje='@json(session('status'))'>
                    </alertaExito>
            </div>
        @endif

        <section class="info">
            <h1 class="regular">Hi {{ auth()->user()->name }},</h1>
            <h2 class="regular">Welcome to your cyberspace.</h2>
        </section>
        
        {{-- @if(auth()->user()->rol === 'admin')
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
        @endif --}}
    </main>

@endsection

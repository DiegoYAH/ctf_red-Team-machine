@extends('layouts.master')

@section('title', 'profile')
@section('descripcion_pagina', 'User Profile')

@section('content')

    {{-- @dd(auth()->user()->rol); --}}

    <h2>Profile</h2>
    <div class="div-form">
        <table>
            <tbody>
                <tr>
                    <td><span>ID</span></td>
                    <td>{{ $infoUser->id }}</td>
                </tr>
                <tr>
                    <td><span>Name</span></td>
                    <td>{{ $infoUser->name }}</td>
                </tr>
                <tr>
                    <td><span>User Name</span></td>
                    <td>{{ $infoUser->av_userName }}</td>
                </tr>
                <tr>
                    <td><span>Email</span></td>
                    <td>{{ $infoUser->email }}</td>
                </tr>
                <tr>
                    <td><span>Role</span></td>
                    <td>{{ $infoUser->role }}</td>
                </tr>
            </tbody>
        </table>
    
        @if ($infoUser->role == 'admin')
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <span>New Password</span>
                            </td>
                            <td><Input type="text" name="new_password" required></Input></td>
                        </tr>
                        {{-- <tr>
                                <td>
                                    <span>Confirm Password</span>
                                </td>
                                <td><Input type="text" name="new_password_confirmation" required></Input></td>
                            </tr> --}}
                    </tbody>
                </table>
                @error('new_password')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
                <input type="hidden" name="idPassChange" value="{{ $infoUser->id }}">
                <button type="submit" class="button-login">Change Password</button>
                @if (session('success'))
                    <div class="alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </form>
    
    
            <h3>catskills&#123;broken_access_control&#125;</h3>
        @endif

    </div>
@endsection

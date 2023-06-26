@extends('layouts.masterDeMaster')


@yield('contenido-principal')

<style>
     h1 {
            font-size: 148px;
            background: linear-gradient(to bottom, #8f1a85, #1099a3);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
    .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
</style>


@yield('contenido-home')
@extends('layouts.app')

@section('content')
<section class="page-section portfolio" id="home">
    <div class="container">
        <div style="position: relative; margin: 3rem 0;">
            <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
                <h1 style="font-size: 5rem; font-weight: 900; text-align: center; margin: 0; color: #343a40;">
                    Treine. <span style="color: #495057;">Supere.</span> <span style="color: #dc3545;">Evolua.</span>
                </h1>
                <p style="color: #000; font-size: 1rem; font-weight: 500; margin-top: 1rem; text-align: center;">
                    <b>ORGANIZE SEUS TREINOS DE FORMA SIMPLES E EFICIENTE!</b>
                </p>
                <hr style="width: 500px; height: 2px; background-color: #dc3545; border: none; margin: 0 auto;">
            </div>
        </div>

        <header class="masthead #fdf5f5 text-danger text-center" style="padding-top: 0; margin-top: 2rem;">
            <div class="container d-flex align-items-center flex-column">
                <img src="{{ asset('assets/img/imagemTreino.png') }}" style="width: 500px; height: auto; margin-top: -1rem;">
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line" style="background-color: #dc3545;"></div>
                    <div class="divider-custom-icon" style="color: #dc3545;">
                        <i class="fas fa-star"></i>
                    </div>
                    <div class="divider-custom-line" style="background-color: #dc3545;"></div>
                </div>
            </div>
        </header>
    </div>
</section>

@endsection
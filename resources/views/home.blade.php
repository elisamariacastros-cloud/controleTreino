@extends('layouts.app')

@section('content')

<section class="home-section">

    <div class="home-container">

        {{-- ÁREA PRINCIPAL --}}
        <div class="hero-home">

            {{-- LADO ESQUERDO --}}
            <div class="hero-content">

                <span class="hero-welcome">
                    BEM-VINDO(A)
                </span>

                <h1>
                    Treine. Supere.<br>
                    <span>Evolua.</span>
                </h1>

                <p>
                    Organize seus treinos de forma simples
                    e eficiente.
                </p>

                <a href="{{ route('alunos.index') }}" class="hero-button">
                <i class="bi bi-people-fill"></i>
                 Ver meus alunos
                </a>

            </div>

            {{-- IMAGEM --}}
            <div class="hero-image">
                <img src="{{ asset('assets/img/imagemTreino.png') }}" alt="Treino">
            </div>

        </div>

        <div class="home-cards">

    {{-- FICHAS --}}
    <a href="{{ route('fichas.index') }}" class="home-card">
        <div class="card-icon">
            <i class="bi bi-clipboard2-check-fill"></i>
        </div>
        <div class="card-content">
            <h3>Gerenciar Fichas</h3>
            <p>Visualize e gerencie fichas cadastradas.</p>
        </div>
    </a>

    {{-- TREINOS --}}
    <a href="{{ route('treinos.index') }}" class="home-card">
        <div class="card-icon">
            <i class="bi bi-lightning-charge-fill"></i>
        </div>
        <div class="card-content">
            <h3>Gerenciar Treinos</h3>
            <p>Crie um novo treino de forma rápida e prática.</p>
        </div>
    </a>

    {{-- EXERCÍCIOS --}}
    <a href="{{ route('exercicios.index') }}" class="home-card">
        <div class="card-icon">
            <i class="fas fa-dumbbell"></i>
        </div>
        <div class="card-content">
            <h3>Gerenciar Exercícios</h3>
            <p>Consulte e gerencie seus exercícios.</p>
        </div>
        
    </a>

</div>


</section>


<style>

    /* ========================================
       HOME
    ======================================== */

    .home-section {
        height: calc(100vh - 104px);
        min-height: 600px;
        overflow: hidden;
        background: #fff;
    }


    .home-container {
        width: 100%;
        max-width: 1200px;
        height: 100%;
        margin: 0 auto;
        padding: 28px 30px;
        box-sizing: border-box;

        display: flex;
        flex-direction: column;
        gap: 22px;
    }


    /* ========================================
       HERO
    ======================================== */

    .hero-home {
        flex: 1;
        min-height: 0;

        background: #fff1f1;
        border-radius: 16px;

        display: flex;
        align-items: center;

        overflow: hidden;
        position: relative;
    }


    .hero-content {
        width: 52%;
        padding-left: 55px;
        position: relative;
        z-index: 2;
    }


    .hero-welcome {
        display: block;

        color: #dc2f23;
        font-size: 15px;
        font-weight: 700;

        margin-bottom: 8px;
        letter-spacing: .5px;
    }


    .hero-content h1 {
        font-size: clamp(3rem, 4vw, 4.5rem);
        line-height: .95;
        font-weight: 800;

        color: #111;
        margin: 0 0 18px;
    }


    .hero-content h1 span {
        color: #e53225;
    }


    .hero-content p {
        color: #555;
        font-size: 18px;
        line-height: 1.4;

        max-width: 400px;
        margin-bottom: 24px;
    }


    /* ========================================
       BOTÃO
    ======================================== */

    .hero-button {
        display: inline-flex;
        align-items: center;
        gap: 10px;

        background: #e53225;
        color: white;

        padding: 13px 22px;
        border-radius: 9px;

        font-size: 16px;
        font-weight: 600;

        text-decoration: none;

        transition: .2s ease;
    }


    .hero-button:hover {
        background: #c9271c;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 7px 18px rgba(229, 50, 37, .2);
    }


    /* ========================================
       IMAGEM
    ======================================== */

    .hero-image {
        width: 48%;
        height: 100%;

        display: flex;
        align-items: flex-end;
        justify-content: center;

        position: relative;
    }


    .hero-image img {
        width: min(430px, 95%);
        max-height: 95%;
        object-fit: contain;

        display: block;
    }


    /* ========================================
       CARDS
    ======================================== */

    .home-cards {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px;

        flex-shrink: 0;
    }


    .home-card {
        min-height: 145px;

        background: #fff;
        border: 1px solid #e4e4e4;
        border-radius: 13px;

        padding: 20px 22px;

        display: grid;
        grid-template-columns: 70px 1fr 30px;
        align-items: center;
        gap: 12px;

        text-decoration: none;
        color: #111;

        transition: .2s ease;
    }


    .home-card:hover {
        color: #111;
        text-decoration: none;

        transform: translateY(-3px);

        border-color: #f0a6a0;

        box-shadow:
            0 8px 20px rgba(0, 0, 0, .07);
    }


    .card-icon {
        width: 58px;
        height: 58px;

        border-radius: 50%;

        display: flex;
        align-items: center;
        justify-content: center;

        background: #fff0e9;
        color: #e53225;

        font-size: 23px;
    }


    .card-content h3 {
        margin: 0 0 6px;

        font-size: 20px;
        font-weight: 700;
    }


    .card-content p {
        margin: 0;

        color: #666;

        font-size: 14px;
        line-height: 1.35;
    }


    .card-arrow {
        color: #e53225;
        font-size: 21px;

        transition: .2s ease;
    }


    .home-card:hover .card-arrow {
        transform: translateX(4px);
    }


    /* ========================================
       RESPONSIVO
    ======================================== */

    @media (max-width: 900px) {

        .home-section {
            height: auto;
            min-height: calc(100vh - 80px);
            overflow: visible;
        }

        .home-container {
            height: auto;
            padding: 20px;
        }

        .hero-home {
            min-height: 420px;
        }

        .hero-content {
            padding-left: 35px;
        }

        .hero-content h1 {
            font-size: 3rem;
        }

        .hero-image img {
            width: 350px;
        }

    }


    @media (max-width: 700px) {

        .home-section {
            height: auto;
        }

        .hero-home {
            flex-direction: column;
            padding-top: 30px;
        }

        .hero-content {
            width: 100%;
            padding: 0 25px;
            text-align: center;
        }

        .hero-content p {
            margin-left: auto;
            margin-right: auto;
        }

        .hero-image {
            width: 100%;
            height: 250px;
        }

        .hero-image img {
            max-height: 250px;
        }

        .home-cards {
            grid-template-columns: 1fr;
        }

        .home-quote {
            margin-bottom: 20px;
        }

    }

</style>

@endsection
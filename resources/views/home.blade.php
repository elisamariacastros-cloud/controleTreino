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

<!-- Contact Section -->
<section class="page-section" id="contact">
    <div class="container">
        <h2 class="page-section-heading text-center text-uppercase text-danger mb-0">ENTRE EM CONTATO</h2>
        <div class="divider-custom">
            <div class="divider-custom-line bg-danger"></div>
            <div class="divider-custom-icon"><i class="fas fa-star text-danger"></i></div>
            <div class="divider-custom-line bg-danger"></div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8 col-xl-7">
                <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                    <div class="form-floating mb-3">
                        <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                        <label for="name">Nome</label>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Um nome é obrigatório.</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                        <label for="email">Email</label>
                        <div class="invalid-feedback" data-sb-feedback="email:required">Um email é obrigatorio.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Email não é valido.</div>
                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                        <label for="phone">Telefone</label>
                        <div class="invalid-feedback" data-sb-feedback="phone:required">Um telefone é obrigatorio</div>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                        <label for="message">Mensagem</label>
                        <div class="invalid-feedback" data-sb-feedback="message:required">Uma mensagem é obrigatoria.</div>
                    </div>

                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center mb-3">
                            <div class="fw-bolder">Enviado com sucesso!!</div>
                            <br />
                        </div>
                    </div>

                    <div class="d-none" id="submitErrorMessage">
                        <div class="text-center text-danger mb-3">Erro ao enviar mensagem!</div>
                    </div>

                    <button class="btn btn-danger btn-xl disabled" id="submitButton" type="submit">ENVIAR!</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
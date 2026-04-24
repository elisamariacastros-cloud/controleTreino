@extends('layouts.app')

@section('content')
<section class="page-section portfolio" id="home">
        <header class="masthead bg-white text-danger text-center">
            <div class="container d-flex align-items-center flex-column">
                <!-- Masthead Avatar Image-->
                <img src="{{ asset('assets/img/imagemTreino.png') }}">
                <!-- Masthead Heading-->
                <h1 class="masthead-heading text-uppercase mb-0">Treino+</h1>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star "></i></div>
                    <div class="divider-custom-line"></div>
                
        </header>
        <!-- Portfolio Section-->
         </section>
        <section class="page-section portfolio" id="treinos">
            <div class="container">
                <!-- Portfolio Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-danger mb-0">treinos</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line bg-danger"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star text-danger"></i></div>
                    <div class="divider-custom-line bg-danger"></div>
                </div>
 
    <div class="container text-center">
        <!-- Descrição -->
        <p class="mt-4 mb-4 fs-5">
            Acesse seus treinos cadastrados.
        </p>

        <!-- Botão principal -->
        <a href="/treinos" class="btn btn-danger btn-xl px-4">
            Ver meus treinos →
        </a>

    </div>

   
        </section>
        <!-- About Section-->
        <section class="page-section bg-danger mb-0" id="novoTreino">
            
            <div class="container">
                <!-- About Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-white">novo treino</h2>
                <!-- Icon Divider-->
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                                            
                <!-- About Section Button-->
                <div class="text-center mt-4">
                    <a href="criarTreino" class="btn btn-xl btn-outline-light">
                        <i class="fas fa-download me-2"></i>
                        CRIAR TREINO!
                    </a>
                </div>
            </div>
        </section>
        <!-- Contact Section-->
        <section class="page-section" id="contact">
            <div class="container">
                <!-- Contact Section Heading-->
                <h2 class="page-section-heading text-center text-uppercase text-danger mb-0">ENTRE EM CONTATO</h2>
                <!-- Icon Divider-->
                <div class="divider-custom">
                    <div class="divider-custom-line bg-danger"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star text-danger"></i></div>
                    <div class="divider-custom-line bg-danger"></div>
                </div>
                <!-- Contact Section Form-->
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-xl-7">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Nome</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Um nome é obrigatório.</div>
                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="email" type="email" placeholder="name@example.com" data-sb-validations="required,email" />
                                <label for="email">Email</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">Um email é obrigatorio.</div>
                                <div class="invalid-feedback" data-sb-feedback="email:email">Email não é valido.</div>
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input class="form-control" id="phone" type="tel" placeholder="(123) 456-7890" data-sb-validations="required" />
                                <label for="phone">Telefone</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">Um telefone é obrigatorio</div>
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="message" type="text" placeholder="Enter your message here..." style="height: 10rem" data-sb-validations="required"></textarea>
                                <label for="message">Mensagem</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">Uma mensagem é obrigatoria.</div>
                            </div>
                         
                            <div class="d-none" id="submitSuccessMessage">
                                <div class="text-center mb-3">
                                    <div class="fw-bolder">Enviado com suvesso!!</div>
                                    <br />
                                </div>
                            </div>
                    
                            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Erro ao enviar mensagem!</div></div>
                            <!-- Submit Button-->
                            <button class="btn btn-danger btn-xl disabled" id="submitButton" type="submit">ENVIAR!</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

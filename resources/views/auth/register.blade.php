@extends('layouts.app')

@section('content')
    <section class="py-5">
        <div class="container px-5">
            <!-- Contact form-->
            <div class="bg-light rounded-4 py-5 px-4 px-md-5">
                <div class="text-center mb-5">
                    <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i
                            class="bi bi-envelope"></i></div>
                    <h1 class="fw-bolder">Inscription</h1>
                </div>
                <div class="row gx-5 justify-content-center">
                    <div class="col-lg-8 col-xl-6">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required autocomplete="name" autofocus>
                                <label for="name">Nom complet</label>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <!-- Email address input-->
                            <div class="form-floating mb-3">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">
                                    <label for="email">Email</label>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                            <!-- Phone number input-->
                            <div class="form-floating mb-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <label for="password">Mot de passe</label>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror                                
                                
                            </div>
                            <!-- Message input-->
                            <div class="form-floating mb-3">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <label for="password_confirmation">Confirmer le mot de passe</label>
                            </div>
                            <!-- Submit Button-->
                            <div class="d-grid"><button class="btn btn-primary btn-lg " id="submitButton"
                                    type="submit">S'inscrire</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

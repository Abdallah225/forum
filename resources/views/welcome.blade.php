@extends('layouts.app')

@section('content')
    <header class="py-5">
        <div class="container px-5 pb-5">
            <div class="row gx-5 align-items-center">
                <div class="col-xxl-5">
                    <!-- Header text content-->
                    @guest
                    <div class="text-center text-xxl-start">
                        <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">Connecte-toi sur le
                                forum</span></h1>
                        <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                            <a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" href="{{route('login')}}">Login</a>
                            <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder" href="{{route('register')}}">Créer un compte</a>

                        </div>
                    </div>
                    @else
                        <div class="text-center text-xxl-start">
                            
                            <div class="fs-3 fw-light text-muted">Bonjour <span>"{{Auth::user()->name}}"</span> bienvenue sur le mini forum </div>
                            <h1 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">Discute avec tes amis en ligne</span></h1>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                                <a class="btn btn-primary btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" href="{{route('home')}}">Allez sur le forum</a>
                                <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </header>
@endsection

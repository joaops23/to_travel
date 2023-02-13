@extends('site.layouts.index')

@section('title', 'Hospedagens')

@section('conteudo')

    <div class="container-fluid">
        <h1 class="fs-2 text-center m-2 fw-bold">Hospedagens Cadastradas para o seu usuário</h1>
        <div class="row">

            @if(count($hospedagens) == 0)
                <p class="fs-5 text-danger text-center">Usuário ainda não possui hospedagens cadastradas.</p>
            @else
                <div class="card w-50" style="width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
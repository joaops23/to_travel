@extends('site.layouts.index')

@section('title', 'Hospedagens')

@section('conteudo')

    <script src="{{asset('js/scripts.js')}}"></script>

    <div class="container-fluid">
        <h1 class="fs-2 text-center m-2 fw-bold">Suas Hospedagens</h1>
        <div class="row">

            <!-- Caso o usuário não tenha ainda nenhum registro cadastrado -->
            @if(count($hospedagens) == 0)
                <p class="fs-5 text-danger text-center">Usuário ainda não possui hospedagens cadastradas.</p>
            @else
                @foreach($hospedagens as $index => $hosp)
                    <!-- Quando o usuário tiver hospedagens cadastradas, irão ser apresentadas em loop -->
                    <div class="card w-50" style="width: 18rem;">
                        <div class="card-body">
                        <h5 class="card-title">{{$hosp['titulo']}}</h5>
                        <p class="card-text">{{$hosp['descricao']}}</p>
                        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalInclusao" onclick="exibeHosp({{$hosp['id']}})">Detalhes</a>
                        </div>
                    </div>
                @endforeach

                <!-- Fim da apresentação -->
            @endif

            
        </div>
        <div class="row">
            <div class="col align-self-center">
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalInclusao" onclick="limpaForm()">Incluir</button>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="modalInclusao" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalInclusao" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Inclusão de Hospedagens</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="newHosp" id="newHosp" method="post" action="{{Route('cadHosp')}}">
                    @csrf

                    <input type='hidden' name="userId" value="{{Auth::user()->id}}" />
                    <div class="row">
                        <div class="mb-6 col-10">
                            <label class="form-label">Título do Anúncio</label>
                            <input type="text" class="form-control" placeholder="adicione aqui seu Título" name="titulo" id="titulo" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-4">
                            <label class="form-label">Descrição</label>
                            <textarea name="descricao" id="descricao" placeholder="fale um pouco sobre o espaço." cols='50' rows='4' class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="mb-3 col-3">
                            <label class="form-label">CEP</label>
                            <input type="text" name='cep' id='cep' class="form-control" onchange='validaCep()' />
                        </div>
                    </div>

                    <div class='row'>
                        <div class="col-5 mb-3">
                            <label class='form-label'>Endereço</label>
                            <input type='text' name='endereco' id='endereco' class='form-control' readonly='true'/>
                        </div>

                        <div class="col-2 mb-2">
                            <label class='form-label'>N°</label>
                            <input type='text' name='numEndereco' id='numEndereco' class='form-control' required='true'/>
                        </div>
                        
                        <div class="col-5 mb-3">
                            <label class='form-label'>Complemento</label>
                            <input type='text' name='complemento' id='complemento' class='form-control' placeholder='Digite aqui o complement do seu endereço'/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-5 mb-3">
                            <label class='form-label'>Bairro</label>
                            <input type='text' name='bairroEnd' id='bairroEnd' class='form-control' readonly='true'/>
                        </div>
                        <div class="col-5 mb-3">
                            <label class='form-label'>Cidade</label>
                            <input type='text' name='cidadeEnd' id='cidadeEnd' class='form-control' readonly='true'/>
                        </div>

                        <div class='col-2 mb-2'>
                            <label class="form-label">UF</label>
                            <input type='text' name='ufEnd' id='ufEnd' class='form-control' readonly='true' />
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" onclick="validate()">Gravar</button>
            </div>
        </div>
    </div>
</div>
@endsection
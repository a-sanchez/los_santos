@extends('layouts.nav_black')
@push('styles')
    <style>
        #colorlib-main {
        width: 100%;
        -webkit-transition: 0.5s;
        -o-transition: 0.5s;
        transition: 0.5s;
        }
        @font-face{
          font-family: 'Avenir Next Condensed';
          src:url('css/Avenir Next Condensed.ttc') format('truetype');
          font-style: normal;
          font-weight: normal;
        }
        /* SOLO SE LE ASIGNA EL COLOR AL NOMBRE Y TELEFONO YA QUE EL ESITLO DE EMAIL VIENE EN LOS EXTENDS*/
        #nombre::placeholder{
        color:black;
        }
        #telefono::placeholder{
        color:black;}
        
        /*ASIGNARLE COLOR AL PLACEHOLDER EN UN TEXT AREA */
        ::placeholder { /* Chrome, Firefox, Opera, Safari 10.1+ */
            color: black;
            opacity: 1; /* Firefox */
        }
        .colorlib-blog, .colorlib-work, .colorlib-about, .colorlib-services, .colorlib-contact {
          padding-top: 0em;
          padding-bottom: 0em;
          clear: both;
          width: 100%;
          display: block;
        }

        .section{
           box-shadow: 28px 28px 15px #ededed;
        }

    </style>
@endpush
@section('body')
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8 section">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div class="row mt-4" style="text-align:center;"">
                    <a style="color:#b0831e;font-size:40px;font-family:Avenir Next Condensed">Contactar Agente</a>
                </div>
                <div class="row">
                    <a>Contáctanos para que un agente de Los Santos te ayude a buscar una
                    propiedad fuera de nuestra página y puedas obtener nuestros servicios.</a>
                </div>
                <div class="row mt-4">
                    <a style="font-weight:bold">Agente Gerardo del Bosque</a>
                </div>
                <div class="row">
                    <a>8443924199</a>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="row">
                            <input type="text" class="form-control mt-5" name="nombre" id="nombre" placeholder="Nombre">
                        </div>
                        <div class="row">
                            <input type="email" class="form-control mt-3" name="email" id="email" placeholder="Email">
                        </div>
                        <div class="row">
                            <input type="tel" class="form-control mt-3" name="telefono" id="telefono" placeholder="Telefono (opcional)">
                        </div>
                    </div>
                    <div class="col-md-6 d-flex justify-content-center">
                        <textarea class=" mt-5" placeholder="Mensaje" name="mensaje" id="mensaje" style="border-color:#b0831e; outline-color:#b0831e;" cols="30" rows="5" ></textarea>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-6"></div>
                    <div class="col-md-4"></div>
                    <div class="col-md-1" style="text-align:end">
                        <button type="submit" style="border:none;background-color:white;font-weight: bold;">Enviar</button>
                    </div>
                    <div class="col-md-1"></div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>
    <div class="col-md-2"></div>
</div>
<div class="row mt-3" style="text-align:center;background-color:white">
    <div class="col-md-12">
      <img src='{{asset("images/Isotipo-3.png")}}' alt="" style="height: 70px;">
    </div>
</div>
@endsection
@push('scripts')
    
@endpush
@extends('layouts.menu')
@push('styles')
<style>
    textarea:focus, input:focus, input[type]:focus {
    box-shadow: 0px 0px 8px #eebe22 inset, 0px 0px 8px #eebe22;
    outline: 0 none;
    }

    .estilo:focus{
        box-shadow: 0px 0px 8px #eebe22 inset, 0px 0px 8px #eebe22;
        outline: 0 none;
    }
    

</style>
@endpush
@section('body')
<div class="container">
    <div class="col-md-12" style="text-align:center">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
        <img src='{{asset("images/Isotipo-1.png")}}' alt="" style="height: 80px;">
    </div>
    <div class="col md-12 mt-3" style="text-align:center;font-size:40px">
        <h1 style="font-weight:bold;font-family:italic;font-size:50px;">AGREGAR NUEVO CLIENTE</h1>
        <h4 class="mt-4" style="color:gray;font-size:20px;">-Ingresar los datos correspondientes</h4>
        <hr style="color: #b0831e;">
    </div>
    <form id="form-users" onsubmit="insertUser();">
        @csrf
        <div class="row d-flex flex-row justify-content-center alig-items-center">
            <div class="col-md-5" style="vertical-align:middle">
                <a><i style="font-size:1.5rem;color:#e4bb40" id="user-alt"  class="fas fa-user-alt"></i></a>           
                <label style="font-weight:bold">Nombre Completo</label>
                <input type="text" class="form-control" id="name" name='name'placeholder="Ingrese nombre completo" required >
            </div>
        </div>
        <div class="row mt-2 d-flex flex-row justify-content-center alig-items-center">
            <div class="col-md-5">
                <a><i style="font-size:1.5rem;color:#e4bb40" id="envelope"  class="fas fa-envelope"></i></a>
                <label style="font-weight:bold">Email </label>
                <input type="email" class="form-control" id="email" placeholder="Ej: usuario@gmail.com" name="email" required >
            </div>
        </div>
        <div class="row mt-2 d-flex flex-row justify-content-center alig-items-center">
            <div class="col-md-5">
                <a><i style="font-size:1.5rem;color:#e4bb40" id="hand-holding-usd"  class="fas fa-hand-holding-usd"></i></a>
                <label style="font-weight:bold">Puntos</label>
                <input type="text" class="form-control" id="puntos" name="puntos"  placeholder="Ingrese los puntos del cliente">
            </div>
        </div>
        <div class="row mt-2 d-flex flex-row justify-content-center alig-items-center">
            <div class="col-md-5">
                <a><i style="font-size:1.5rem;color:#e4bb40" id="lock"  class="fas fa-lock"></i></a>
                <label style="font-weight:bold">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required >
            </div>
        </div>
        <div class="row mt-2 d-flex flex-row justify-content-center alig-items-center"">
            <div class="col-md-5">
                <div style="margin-top:15px;">
                    <input  type="checkbox" id="show_password"  title="clic para mostrar contraseña"/>
                    &nbsp;&nbsp;Mostrar Contraseña</div>
                </div>
            </div>
        </div>
        <div class="row mt-3 d-flex flex-row justify-content-center mb-4">
            <div class="col-md-5" style="text-align: center;">
                <button type="submit" class="btn btn-success">Guardar</button>
                <a class="btn btn-danger" href="{{url('/usuarios')}}">Cancelar</a>
            </div>

        </button>
        </form>
</div>
@endsection
@push('scripts')
<script>
$('#show_password').on('change',function(event){
   // Si el checkbox esta "checkeado"
   if($('#show_password').is(':checked')){
      // Convertimos el input de contraseña a texto.
      $('#password').get(0).type='text';
   // En caso contrario..
   } else {
      // Lo convertimos a contraseña.
      $('#password').get(0).type='password';
   }
});

async function insertUser() {
    event.preventDefault();
    let form = new FormData(document.getElementById("form-users"));
    form.append("tipo_usuario",2);
    let url = "{{url('/usuarios')}}";
    let init = {
        method:"POST",
        body:form
    }
    let req = await fetch(url,init);
    if(req.ok){
        alert("dado de alta");
        window.location.href="{{url('/usuarios')}}";
    }
    else{
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: "Error al registrar usuario"
            });
    }
}
</script>
@endpush
<nav class="content navbar-expand-md navbar-dark bg-primary">
    {{-- <div class="container">
        <div class="row row-cols-1 row-cols-md-3">
            <div class="col-md-12" style="text-align:center;">
                <br>
                @if(isset($logotipo) && strlen($logotipo) > 1)
                <img id="imgLogo" class="align-self-left mr-3" src="{{asset('img/'.$logotipo.'')}}" style="border-width:0px; height: 50px;width: 250px;">
                @endif
                <a style="color: white;">@if(isset($laboratorio)){{$laboratorio}}@endif</a>
            </div>
            <div class="col-md-5" style="text-align:center;"></div>
            <div class="col-md-7" style="text-align:left;">
                <form method="POST" action="{{ route('paciente_logout') }}" style="display: inline;">
                    {{ csrf_field() }}
                    <i class="fa fa-unlock-alt" style="color: rgba(0, 255, 255, 0)"></i>
                    <i class="fa fa-unlock-alt" style="color: rgba(0, 255, 255, 0)"></i>
                    <i class="fa fa-unlock-alt" style="color: rgba(0, 255, 255, 0)"></i>
                    <i class="fa fa-unlock-alt" style="color: rgba(0, 255, 255, 0)"></i>
                    <button class="btn btn-primary" type="submit"><i class="fa fa-unlock-alt"></i> Cerrar sesión</button>
                </form>
            </div>
        </div>
    </div> --}}

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4" >
                <h5 class="text-center">
                    <br>
                    @if(isset($logotipo) && strlen($logotipo) > 1)
                        <img id="imgLogo" class="mr-3" src="{{asset('img/'.$logotipo.'')}}" style="border-width:0px; height: 50px;width: 250px;">
                    @endif
                </h5>
            </div>
            <br>
            <div class="col-md-4">
                <h5 class="text-center">
                    <br>
                    <a style="color: white;">@if(isset($laboratorio)){{$laboratorio}}@endif</a>
                </h5>
            </div>
            <div class="col-md-4">
                <h5 class="text-center">
                <div class="col-md-7" style="text-align:center;">
                    <br>
                    <form method="POST" action="{{ route('paciente_logout') }}" style="display: inline;">
                        {{ csrf_field() }}               
                        <button class="btn btn-success" type="submit"><i class="fa fa-unlock-alt"></i> Cerrar sesión</button>
                    </form>
                </div>
                </h5>
            </div>
        </div>
        <br>
    </div>


</nav>
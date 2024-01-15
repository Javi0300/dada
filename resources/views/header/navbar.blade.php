<nav class="content navbar-expand-md navbar-dark bg-primary">
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
                </h5>
            </div>
        </div>
        <br>
    </div>
</nav>
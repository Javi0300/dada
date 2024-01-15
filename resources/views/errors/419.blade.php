@extends('layouts.app')
@section('title', 'Error')
@section('contenido')
<style type="text/css">
    .card-img-top {
        height: 250px;
        object-fit: cover;
    }
    .card-img {
        display: block;
        height: 40px;
        object-fit: contain;
    }
</style>
<div class="container-fluid bg-primary text-white pt-4 pb-5 d-none d-lg-flex">
    <div class="container pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex">

            </div>
            <a href="#" class="h1 text-white mb-0">ER<span class="text-dark">ROR</span></a>
            <div class="d-flex">
                <div class="ms-3">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="untree_co-section">
    
</div>
@endsection

@push('scripts')
<!-- JavaScript Libraries -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('../../../lib/wow/wow.min.js')}}"></script>
<script src="{{asset('../../../lib/easing/easing.min.js')}}"></script>
<script src="{{asset('../../../lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('../../../lib/counterup/counterup.min.js')}}"></script>
<script src="{{asset('../../../lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('../../../js/main.js')}}"></script>
@endpush

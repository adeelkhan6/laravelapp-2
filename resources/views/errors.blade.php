@if ($errors->any())
        
<div class="alert alert-danger">
    <ul class="navbar-nav">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        {{-- <span>
        <a href="#" class="btn btn-danger">Checkout</a>
        <a href="#" class="btn btn-primary">Cart</a></span> --}}
    </ul>
</div>
@endif


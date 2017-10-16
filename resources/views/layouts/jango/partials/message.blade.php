@if(session('message'))
<div class="row">
    <div class="col-lg-12">
        <div class="alert alert-{{session('message.status')}}" role="alert">{{ session('message.text') }}</div>
    </div>
</div>
@endif

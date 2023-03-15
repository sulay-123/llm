<div style="margin-top: 5rem!important;">
        @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <button type="button" class="close" data-dismiss="alert">×</button>	
       <strong> <p>{{$message}}</p> </strong>
    </div>
    @endif
    @if ($message = Session::get('error'))
    <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong><p>{{$message}}</p></strong>
    </div>
    @endif
</div>

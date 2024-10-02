@extends('adminlte::page')

@section('title', 'マイホームNOTE')

@section('content_header')                                                              

@stop   

@section('content')
<section class="content">
    <div class="row justify-content-center text-center">
        <div class="col-auto">
            <a href="{{ route('clients.index') }}" title="プロフィール">
                <i class="far fa-address-card home-icon"></i>
            </a>
        </div>
        <div class="col-auto">
            <a href="{{ route('items.index', 'ideas') }}" title="アイディア">
                <i class="fas fa-lightbulb home-icon"></i>
            </a>
        </div>
        <div class="col-auto">
            <a href="{{ route('items.index', 'designs') }}" title="デザイン">
                <i class="fas fa-palette home-icon"></i>
            </a>
        </div>
        <div class="col-auto">
            <a href="{{ route('items.index', 'ldk') }}" title="LDK">
                <i class="fas fa-couch home-icon"></i>
            </a>
        </div>
        <div class="col-auto">
            <a href="{{ route('items.index', 'bathrooms') }}" title="バスルーム">
                <i class="fas fa-sink home-icon"></i>
            </a>
        </div>
        <div class="col-auto">
            <a href="{{ route('items.index', 'rooms') }}" title="プライベートルーム">
                <i class="fas fa-bed home-icon"></i>
            </a>
        </div>
        <div class="col-auto">
            <a href="{{ route('items.index', 'storages') }}" title="ストレージ">
                <i class="fas fa-box home-icon"></i>
            </a>
        </div>
        <div class="col-auto">
            <a href="{{ route('galleries.index') }}" title="フォトギャラリー">
                <i class="far fas fa-image home-icon"></i>
            </a>
        </div>
    </div>
    
    <div id="target-date" style="display:none;">{{ $client ? $client->date : '' }}</div> 
    <div class="countdown-container">
        <div class="countdown-elm">
            <h1>Countdown <span>to</span> My Home</h1>  
            <h3>
                <span>Desired Construction Date：</span>
                {{ $client && $client->date ? $client->date : 'Not Set' }}
            </h3>
            <div class="countdown-display">
                <span>Days Left</span>
                <p class="time-text" id="days">0</p>
                <span>days</span>
            </div>
        </div>
    </div>
    
</section>
@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/css/item/index.css') }}">
@stop

@section('js')
<script>
    const daysElm = document.getElementById('days');
    const target = document.getElementById('target-date').innerText; 

    if (!target) {
        daysElm.innerHTML = 'Not Set'; 
    } else {
        const targetDate = new Date(target); 

        function countDown() {
            const currentDate = new Date();
            const totalSeconds = (targetDate - currentDate) / 1000;

            if (totalSeconds <= 0) {
                daysElm.innerHTML = 0;
                clearInterval(countdownInterval); 
                return;
            }

            const days = Math.floor(totalSeconds / 3600 / 24);
            daysElm.innerHTML = days;
        }

        const countdownInterval = setInterval(countDown, 1000);
    }
</script>
@stop

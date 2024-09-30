@extends('adminlte::page')

@section('title', 'home')

@section('content_header')                                                              


@stop   

@section('content')
<section class="content">
        <div id="target-date" style="display:none;">{{ $client->date }}</div> 
            <div class="countdown-container">
                <div class="countdown-elm">
                     <h1>Countdown <span>to</span> My Home</h1>  
                         <h3><span>Desired Construction Date：</span>{{ $client->date }}</h3>
                            <div class="countdown-display">
                                 <span>Days Left</span>
                                 <p class="time-text" id="days" >0</p>
                                <span>days</span>
                            </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 ">
                    <div class="card mt-4">
                        <div class="card-body home-card-body">
                            <i class="far fa-address-card home-icon-fa-address-card"></i>
                            <h2>プロフィール</h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mt-4">
                        <div class="card-body home-card-body">
                            
                            <i class="far fas fa-image home-icon-fa-image"></i>
                            <h1>ギャラリー</h1>
                        </div>
                    </div>
                </div>
            </div>
</div>

@stop

@section('css')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap');

    .countdown-container {
        background: radial-gradient(at 40% 20%, rgb(232, 12, 12) 0px, transparent 50%),
        radial-gradient(at 40% 20%, hsla(28, 100%, 74%, 1) 0px, transparent 50%),
        radial-gradient(at 80% 0%, hsla(189, 100%, 56%, 1) 0px, transparent 50%),
        radial-gradient(at 0% 50%, hsla(355, 100%, 93%, 1) 0px, transparent 50%),
        radial-gradient(at 80% 50%, hsla(340, 100%, 76%, 1) 0px, transparent 50%),
        radial-gradient(at 0% 100%, hsla(22, 100%, 77%, 1) 0px, transparent 50%),
        radial-gradient(at 80% 100%, hsla(242, 100%, 70%, 1) 0px, transparent 50%);
        
        background-position: center center;
        align-items: center;
        margin-top: 20px;
        width: 100%; 
        color: rgb(88, 82, 82);
        padding-bottom: 20px;
    }

    h1 {
        font-weight: normal;
        font-size: 4rem;
        margin-top: 5rem;
        text-align: center; 
    }

    span.title-span {
        font-size: 2.5rem;
    }

    .countdown-container {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%; 
    }

    .time-text {
        font-weight: bold;
        font-size: 10rem;
        line-height: 1;
        margin: 1rem 2rem;
        margin: 0 5px;
        color: rgb(61, 57, 57);
    }

    .countdown-elm {
        text-align: center;
    }

    .countdown-elm span {
        font-size: 1rem;
    }

    .countdown-elm h1 span{
      font-size: 3rem;
    }

    .countdown-display {
      display: flex; 
      align-items: center; 
      justify-content: center;"
    }

    .countdown-display span{
      font-size: 2rem;
      margin-top: 60px;
    }

    h3{
      text-align: right;
    }
    
    .home-icon-fa-address-card  {
        font-size: 200px;
    }

    .home-icon-fa-image  {
        font-size: 200px;
    }

    .home-card-body{
        display: flex;
        text-align: center;
        margin-top: 20x;
background:hsla(173,64%,44%,1);
radial-gradient(at 92% 34%, hsla(273,7%,60%,1) 0px, transparent 50%),
radial-gradient(at 0% 100%, hsla(241,100%,17%,1) 0px, transparent 50%),
radial-gradient(at 96% 42%, hsla(202,100%,17%,1) 0px, transparent 50%);
    }
</style>
@stop

@section('js')
<script>
    const daysElm = document.getElementById('days');

    // 建築希望日を取得
    const target = document.getElementById('target-date').innerText; 
    const targetDate = new Date(target); // 日付に変換

    function countDown() {
        const currentDate = new Date();
        const totalSeconds = (targetDate - currentDate) / 1000;

        if (totalSeconds <= 0) {
            daysElm.innerHTML = 0;
            clearInterval(countdownInterval); // カウントダウンが終了したらクリア
            return;
        }

        const days = Math.floor(totalSeconds / 3600 / 24);
        daysElm.innerHTML = days;
    }

    const countdownInterval = setInterval(countDown, 1000);
</script>
@stop

@extends('adminlte::page')

@section('title', 'home')

@section('content_header')                                                              


@stop   

@section('content')
<section class="content">
  
            </div>
            <div class="row justify-content-center text-center">
                <div class="col-auto">
                    <a href="{{ route('client.index') }}" title="プロフィール">
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

@stop

@section('css')
<link rel="stylesheet" href="{{ asset('/css/item/index.css') }}">
<style>
   
    .countdown-container {
        background: radial-gradient(at 40% 20%, rgb(232, 12, 12) 0px, transparent 50%),
        radial-gradient(at 40% 20%, hsla(28, 100%, 74%, 1) 0px, transparent 50%),
        radial-gradient(at 80% 0%, hsla(189, 100%, 56%, 1) 0px, transparent 50%),
        radial-gradient(at 0% 50%, hsla(355, 100%, 93%, 1) 0px, transparent 50%),
        radial-gradient(at 80% 50%, hsla(340, 100%, 76%, 1) 0px, transparent 50%),
        radial-gradient(at 0% 100%, hsla(22, 100%, 77%, 1) 0px, transparent 50%),
        radial-gradient(at 80% 100%, hsla(242, 100%, 70%, 1) 0px, transparent 50%);
        
        background-position: center center;
        margin-top: 20px;
        width: 100%; 
        color: rgb(88, 82, 82);
        padding-bottom: 20px;
    }

    h1 {
        font-weight: normal;
        font-size: 3rem;
        margin-top: 20px;
        text-align: center; 
    }

    span.title-span {
        font-size: 2rem;
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

    /* ホーム   ページのアイコンの大きさ */
    
    .home-icon {
    font-size: 50px; /* アイコンのサイズ */
    margin: 10px; /* アイコン間の余白 */
    transition: color 0.3s, transform 0.3s; /* ホバー時のアニメーション */
}

.home-icon:hover {
    transform: translateY(-5px) scale(1.1); /* 少し前に出てサイズを大きくする */
}

   /* タイトルアイコン */
   .fa-address-card{
    color:#dc3545;
}

.fa-image{
    color: #6c757d;
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

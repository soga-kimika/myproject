@extends('adminlte::page')

@section('title', 'home')

@section('content_header')

@stop
@section('content')

<h1>Countdown <span>to</span> Sweet Home</h1>
    <div class="countdown-container">
        <div class="countdown-elm">
          <p class="time-text" id="days">0</p>
          <span>days</span>
        </div>
        <div class="countdown-elm">
          <p class="time-text" id="hours">0</p>
          <span>hours</span>
        </div>
        <div class="countdown-elm">
          <p class="time-text" id="mins">0</p>
          <span>mins</span>
        </div>
        <div class="countdown-elm">
          <p class="time-text" id="seconds">0</p>
          <span>seconds</span>
        </div>
      </div>
    
@stop

@section('css')
<style>
@import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro&display=swap');



body {
    background: 
    radial-gradient(at 40% 20%, hsla(28, 100%, 88%, 1) 0px, transparent 50%),
    radial-gradient(at 80% 0%, hsla(189, 100%, 88%, 1) 0px, transparent 50%),
    radial-gradient(at 0% 50%, hsla(355, 100%, 88%, 1) 0px, transparent 50%),
    radial-gradient(at 80% 50%, hsla(340, 100%, 88%, 1) 0px, transparent 50%),
    radial-gradient(at 0% 100%, hsla(22, 100%, 88%, 1) 0px, transparent 50%),
    radial-gradient(at 80% 100%, hsla(242, 100%, 88%, 1) 0px, transparent 50%);

  background-position: center center;
  align-items: center;
  margin: 0;
  width: 100%; 
}

h1 {
  font-weight: normal;
  font-size: 5rem;
  margin-top: 5rem;
  color: black; 
  text-align: center; 
}

span{
    color: grey;
}

.countdown-container {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%; 
}

.time-text {
  font-weight: bold;
  font-size: 6rem;
  line-height: 1;
  margin: 1rem 2rem;
}

.countdown-elm {
  text-align: center;
}

.countdown-elm span {
  font-size: 1.2rem;
}
</style>
@stop

@section('js')
    <script> 
        const daysElm = document.getElementById('days');
const hoursElm = document.getElementById('hours');
const minsElm = document.getElementById('mins');
const secondsElm = document.getElementById('seconds');

// ここに好きな日時を記述する
// 西暦 月　日
const target = '2022 1 1';

function countDown() {
  const targetDate = new Date(target);
  const currentDate = new Date();

  const totalSeconds = (targetDate - currentDate) / 1000;

  const days = Math.floor(totalSeconds / 3600 / 24);
  const hours = Math.floor(totalSeconds / 3600) % 24;
  const mins = Math.floor(totalSeconds / 60) % 60;
  const seconds = Math.floor(totalSeconds % 60);

  daysElm.innerHTML = days;
  hoursElm.innerHTML = formatTime(hours);
  minsElm.innerHTML = formatTime(mins);
  secondsElm.innerHTML = formatTime(seconds);
}

function formatTime(time) {
  return time < 10 ? `0${time}` : time;
}

setInterval(countDown, 1000);

    </script>
@stop





    @extends('adminlte::page')

    @section('title', $pageTitle)

    @section('content_header')
    <h1>{!! $pageIcon !!}{!! $pageTitle !!} </h1>
    @stop

    @section('content')
        @include('partials.errors')

        @include('partials.form')

        <div class="container">
            @include('partials.table', [
                'title1' => $title1,
                'title2' => $title2,
                'items1' => $items1,
                'items2' => $items2,
            ]) 
    @foreach($items1 as $item)
        @include('partials.edit_modal', ['item' => $item, 'type' => $type]) 
        @include('partials.delete_modal', ['item' => $item])
    @endforeach

    @foreach($items2 as $item)
        @include('partials.edit_modal', ['item' => $item, 'type' => $type]) 
        @include('partials.delete_modal', ['item' => $item]) 
    @endforeach


    </div>
    @stop

    @section('css')
        <link rel="stylesheet" href="{{ asset('/css/item/index.css') }}">
    @stop

    @section('js')
    <script>
        function displayFileName() {
            const input = document.getElementById('imageUpload');
            const fileName = document.getElementById('fileName');
            fileName.textContent = input.files[0] ? input.files[0].name : '';
        }
    
        function showImage(imageSrc) {
            const modalImage = document.getElementById('modalImage');
            modalImage.src = imageSrc;
        }
        document.addEventListener('DOMContentLoaded', () => {
    // ページが読み込まれたときに状態を復元
    const checkboxes = document.querySelectorAll('.check-consulted');
    checkboxes.forEach(checkbox => {
        const id = checkbox.dataset.id;
        const checked = localStorage.getItem(`checkbox-${id}`) === 'true';
        checkbox.checked = checked;
    });

    // チェックボックスの状態が変わったときに保存
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', () => {
            const id = checkbox.dataset.id;
            localStorage.setItem(`checkbox-${id}`, checkbox.checked);
        });
    });
});

    </script>
    @stop
    

<h1 id="app-title" class="mt-4 mb-3">
        近くのワンコインランチを探そう
</h1>
<div class="row mx-3 mt-10">
    {{ Form::open(['route' => 'search.word', 'method' => 'GET', 'class' => 'input-group mb-5']) }}
        {{ Form::input('text', 'word', null, ['class' => 'border-secondary form-control', 'placeholder' => '店舗名とか場所とか...']) }}
        {{ Form::button('検索', ['class' => 'btn border-secondary', 'type' => 'submit']) }}
    {{ Form::close() }}
</div>
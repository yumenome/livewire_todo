<div>
    @include('livewire.includes.create-todo')
    @include('livewire.includes.search-box')
    <div id="todos-list">
        @foreach ($todos as $todo)
            @include('livewire.includes.read-todo')
        @endforeach

        <div class="my-2">
           {{$todos->links()}}
        </div>
    </div>
</div>

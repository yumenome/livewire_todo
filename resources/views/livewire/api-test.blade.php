<div wire:init='fetch'>
    @foreach ($data as $todo)
        <li>{{$todo['name']}}</li>
    @endforeach
</div>

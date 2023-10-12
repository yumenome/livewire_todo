<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;

class TodoList extends Component
{
    use WithPagination;

    #[Rule('required|min:3|max:30')]
    public $name;//this one is kinda default and use to validate as $todo->name

    public $search;

    #[Rule('required|min:3|max:30')]
    public $edit_name;

    public $edit_id;

    public function create(){
        // dd($this->name);
        $validated = $this->validateOnly('name');

        Todo::create($validated);

        $this->reset('name');

        session()->flash('go', 'created!');

        $this->resetPage();
    }

    public function delete($id){
        Todo::find($id)->delete();
    }

    public function toggle($id){
        $todo = Todo::find($id);
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function edit($id){
        $this->edit_id = $id;
        $this->edit_name = Todo::find($id)->name;
    }

    public function update(){

        $this->validateOnly('edit_name');

        Todo::find($this->edit_id)->update([
            'name' => $this->edit_name,
        ]);

        $this->cancle();
    }

    public function cancle(){
       $this->reset('edit_name', 'edit_id');
    }

    public function render()
    {
        return view('livewire.todo-list',[
            'todos' =>Todo::latest()->where('name','like',"%{$this->search}%")->paginate(5)
        ]);
    }
}

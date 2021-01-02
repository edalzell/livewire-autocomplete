<?php

namespace LivewireAutocomplete\Tests\Browser\AutocompleteDatabaseTest;

use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use LivewireAutocomplete\Tests\Browser\AutocompleteDatabaseTest\Models\Item;

class DatabaseResultsAutocompleteComponent extends Component
{
    public $items;

    public $itemName = '';

    public $selectedItem;

    public function mount()
    {
        $this->getItems();
    }

    public function select($index)
    {
        $this->selectedItem = $this->items[$index] ?? null;
        $this->itemName = $this->selectedItem->name ?? null;

        $this->getItems();
    }

    public function getItems()
    {
        $this->items = Item::query()
            ->when($this->itemName, function ($query, $itemName) {
                return $query->where('name', 'LIKE', "%{$itemName}%");
            })
            ->get()
            ;
    }

    public function updatedItemName()
    {
        $this->reset('items');
        $this->getItems();
    }

    public function render()
    {
        return <<<'HTML'
            <div dusk="page">
                <x-lwc::autocomplete wire:model="itemName" select-action="select" result-component="item-row" results-property="items" />

                <div dusk="result-output">{{ $selected }}</div>
            </div>
            HTML;
    }
}
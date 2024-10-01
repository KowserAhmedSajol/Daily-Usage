<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class Select extends Component
{
    public $name;
    public $id;
    public $label;
    public $placeholder;
    public $options;
    public $table;
    public $createUrl; // New property for creation URL

    public function __construct($table, $name = null, $id = null, $label = null, $placeholder = 'Select an option', $createUrl = null)
    {
        $this->name = $name ?: $table . '_id';
        $this->id = $id ?: $table; 
        $this->label = $label ?: 'Select ' . ucfirst($table); 
        $this->placeholder = $placeholder;
        $this->table = $table;
        $this->createUrl = '/api/types/create';
        $columns = DB::getSchemaBuilder()->getColumnListing($this->table);
        $this->columnName = in_array('title', $columns) ? 'title' : 'name';

        $this->options = $this->fetchDataFromTable();
    }

    private function fetchDataFromTable()
    {
        try {
            return DB::table($this->table)
            ->select('id', DB::raw($this->columnName . ' as title'))
            ->get();
        } catch (\Exception $e) {
            \Log::error('Error fetching data from table: ' . $e->getMessage());
            return collect();
        }
    }

    public function render()
    {
        return view('components.select', [
            'createUrl' => $this->createUrl,
            'table' => $this->table,
            'columnName' => $this->columnName
        ]);
    }
}

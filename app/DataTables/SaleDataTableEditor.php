<?php

namespace App\DataTables;

use App\Models\Sale;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rule;
use Yajra\DataTables\DataTablesEditor;

class SaleDataTableEditor extends DataTablesEditor
{
    protected $model = Sale::class;

    /**
     * Get create action validation rules.
     */
    public function createRules(): array
    {
        return [
            'supplier' => 'required',
            'art' => 'required|max:255',
            'invoice_num'=> 'required',
            'quantity' => 'required',
            'currency' => 'required',
            'rech_art' => 'required',
            'customs' => 'required',
            'vat' => 'required',
            'shipment' => 'required',
            'assignment' => 'required',
        ];
    }

    /**
     * Get edit action validation rules.
     */
    public function editRules(Model $model): array
    {
        return [
            'supplier' => 'required',
            'art' => 'required|max:255',
            'invoice_num'=> 'required',
            'quantity' => 'required',
            'currency' => 'required',
            'rech_art' => 'required',
            'customs' => 'required',
            'vat' => 'required',
            'shipment' => 'required',
            'assignment' => 'required',
        ];
    }

    /**
     * Get remove action validation rules.
     */
    public function removeRules(Model $model): array
    {
        return [];
    }

    /**
     * Event hook that is fired after `creating` and `updating` hooks, but before
     * the model is saved to the database.
     */
    public function saving(Model $model, array $data): array
    {
        // Before saving the model, hash the password.
//        if (! empty(data_get($data, 'password'))) {
//            data_set($data, 'password', bcrypt($data['password']));
//        }
        return $data;
    }

    /**
     * Event hook that is fired after `created` and `updated` events.
     */
    public function saved(Model $model, array $data): Model
    {
        // do something after saving the model

        return $model;
    }
}

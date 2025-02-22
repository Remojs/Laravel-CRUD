<?php

namespace App\Http\Handlers;

use App\Http\Controllers\occupationControllers\GetAllOccupations;
use App\Http\Controllers\occupationControllers\GetOccupationsById;
use App\Http\Controllers\occupationControllers\DeleteOccupations;
use App\Http\Controllers\occupationControllers\UpdateOccupations;
use App\Http\Controllers\occupationControllers\CreateOccupations;
use App\Http\Controllers\occupationControllers\UpdatePartialOccupations;
use Illuminate\Http\Request;

class occupationHandler
{
    protected $getAll;
    protected $getById;
    protected $create;
    protected $update;
    protected $updatePartial;
    protected $delete;

    public function __construct(
        GetAllOccupations $getAll,
        GetOccupationsById $getById,
        CreateOccupations $create,
        UpdateOccupations $update,
        UpdatePartialOccupations $updatePartial,
        DeleteOccupations $delete
    ) 
    {
        $this->getAll = $getAll;
        $this->getById = $getById;
        $this->create = $create;
        $this->update = $update;
        $this->updatePartial = $updatePartial;
        $this->delete = $delete;
    }

    public function getAll() { return $this->getAll->getAll(); }
    public function getById($id) { return $this->getById->getById($id); }
    public function create(Request $request) { return $this->create->create($request); }
    public function update(Request $request, $id) { return $this->update->update($request, $id); }
    public function updatePartial(Request $request, $id) { return $this->updatePartial->updatePartial($request, $id); }
    public function delete($id) { return $this->delete->delete($id); }
}

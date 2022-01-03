<?php


namespace App\Contracts;


interface CustomerContract
{
    
    public function index();

    public function store($data);

    public function edit($id);

    public function update($data, $id);

    public function destroy($id);

}

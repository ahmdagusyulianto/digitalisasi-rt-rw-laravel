<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyMasterGajiRequest;
use App\Http\Requests\StoreMasterGajiRequest;
use App\Http\Requests\UpdateMasterGajiRequest;
use App\master_gaji;

class MasterGajiController extends Controller
{
    public function index()
    {
        abort_unless(\Gate::allows('master_gaji_access'), 403);

        $master_gaji = Master_Gaji::all();

        return view('admin.master_gaji.index', compact('master_gaji'));
    }

    public function create()
    {
        abort_unless(\Gate::allows('master_gaji_create'), 403);

        return view('admin.master_gaji.create');
    }

    public function store(StoreMasterGajiRequest $request)
    {
        abort_unless(\Gate::allows('master_gaji_create'), 403);

        $master_gaji = Master_Gaji::create($request->all());

        return redirect()->route('admin.master_gaji.index');
    }

    public function edit(master_gaji $master_gaji)
    {
        abort_unless(\Gate::allows('master_gaji_edit'), 403);

        return view('admin.master_gaji.edit', compact('master_gaji'));
    }

    public function update(UpdateMasterGajiRequest $request, master_gaji $master_gaji)
    {
        abort_unless(\Gate::allows('master_gaji_edit'), 403);

        $master_gaji->update($request->all());

        return redirect()->route('admin.master_gaji.index');
    }

    public function show(master_gaji $master_gaji)
    {
        abort_unless(\Gate::allows('master_gaji_show'), 403);

        return view('admin.master_gaji.show', compact('master_gaji'));
    }

    public function destroy(master_gaji $master_gaji)
    {
        abort_unless(\Gate::allows('master_gaji_delete'), 403);

        $master_gaji->delete();

        return back();
    }

    public function massDestroy(MassDestroyMasterGajiRequest $request)
    {
        Product::whereIn('id', request('ids'))->delete();

        return response(null, 204);
    }
}

@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.keuangan.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.keuangan.update", [$keuangan->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('keuangan_tipe') ? 'has-error' : '' }}">
                <label for="keuangan_tipe">{{ trans('global.keuangan.fields.keuangan_tipe') }}*</label>
                <input type="text" id="keuangan_tipe" name="keuangan_tipe" class="form-control" value="{{ old('keuangan_tipe', isset($keuangan) ? $keuangan->keuangan_tipe : '') }}">
                @if($errors->has('keuangan_tipe'))
                <em class="invalid-feedback">
                    {{ $errors->first('keuangan_tipe') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.keuangan.fields.keuangan_tipe_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('keuangan_category') ? 'has-error' : '' }}">
                <label for="keuangan_category">{{ trans('global.keuangan.fields.keuangan_category') }}*
                    <!-- <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label> -->
                    <select name="keuangan_category" id="keuangan_category" class="form-control select2">
                        @foreach($keuangan_category as $id => $keuangan_category)
                        <option value="{{ $id }}" {{ (in_array($id, old('keuangan_category', [])) || isset($keuangan) && $keuangan->keuangan_category) ? 'selected' : '' }}>
                            {{ $keuangan_category }}
                        </option>
                        @endforeach
                    </select>
                    @if($errors->has('keuangan_category'))
                    <em class="invalid-feedback">
                        {{ $errors->first('keuangan_category') }}
                    </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.keuangan.fields.keuangan_category_helper') }}
                    </p>
            </div>

            <div class="form-group {{ $errors->has('keuangan_periode') ? 'has-error' : '' }}">
                <label for="keuangan_periode">{{ trans('global.keuangan.fields.keuangan_periode') }}*</label>
                <input type="date" id="keuangan_periode" name="keuangan_periode" class="form-control" value="{{ old('keuangan_periode', isset($keuangan) ? $keuangan->keuangan_periode : '') }}">
                @if($errors->has('keuangan_periode'))
                <em class="invalid-feedback">
                    {{ $errors->first('keuangan_periode') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.keuangan.fields.keuangan_periode_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('keuangan_value') ? 'has-error' : '' }}">
                <label for="keuangan_value">{{ trans('global.keuangan.fields.keuangan_value') }}*</label>
                <input type="number" id="keuangan_value" name="keuangan_value" class="form-control" value="{{ old('keuangan_value', isset($keuangan) ? $keuangan->keuangan_value : '') }}">
                @if($errors->has('keuangan_value'))
                <em class="invalid-feedback">
                    {{ $errors->first('keuangan_value') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.keuangan.fields.keuangan_value_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('keuangan_warga_id') ? 'has-error' : '' }}">
                <label for="keuangan_warga_id">{{ trans('global.keuangan.fields.keuangan_warga_id') }}*</label>
                <input type="number" id="keuangan_warga_id" name="keuangan_warga_id" class="form-control" value="{{ old('keuangan_warga_id', isset($keuangan) ? $keuangan->keuangan_warga_id : '') }}">
                @if($errors->has('keuangan_warga_id'))
                <em class="invalid-feedback">
                    {{ $errors->first('keuangan_warga_id') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.keuangan.fields.keuangan_warga_id_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('keuangan_rt') ? 'has-error' : '' }}">
                <label for="keuangan_rt">{{ trans('global.keuangan.fields.keuangan_rt') }}*
                    <!-- <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label> -->
                    <select name="keuangan_rt" id="keuangan_rt" class="form-control select2">
                        @foreach($keuangan_rt as $id => $keuangan_rt)
                        <option value="{{ $id }}" {{ (in_array($id, old('keuangan_rt', [])) || isset($keuangan) && $keuangan->keuangan_rt) ? 'selected' : '' }}>
                            {{ $keuangan_rt }}
                        </option>
                        @endforeach
                    </select>
                    @if($errors->has('keuangan_rt'))
                    <em class="invalid-feedback">
                        {{ $errors->first('keuangan_rt') }}
                    </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.keuangan.fields.keuangan_rt_helper') }}
                    </p>
            </div>


           
            <!-- <div class="form-group {{ $errors->has('ins_category') ? 'has-error' : '' }}">
                <label for="ins_category">{{ trans('global.insidental.fields.ins_category') }}*</label>
                <input type="text" id="ins_category" name="ins_category" class="form-control" value="{{ old('ins_category', isset($insidental) ? $insidental->ins_category : '') }}">
                @if($errors->has('ins_category'))
                    <em class="invalid-feedback">
                        {{ $errors->first('ins_category') }}
                    </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.insidental.fields.ins_category_helper') }}
                </p>
            </div> -->
            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
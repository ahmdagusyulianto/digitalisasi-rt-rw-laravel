@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('global.history_warga.title_singular') }}
    </div>

    <div class="card-body">
        <form action="{{ route("admin.history_warga.update", [$history_warga->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group {{ $errors->has('history_desc') ? 'has-error' : '' }}">
                <label for="history_desc">{{ trans('global.history_warga.fields.history_desc') }}*</label>
                <input type="text" id="history_desc" name="history_desc" class="form-control" value="{{ old('history_desc', isset($history_warga) ? $history_warga->history_desc : '') }}">
                @if($errors->has('history_desc'))
                <em class="invalid-feedback">
                    {{ $errors->first('history_desc') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.history_warga.fields.history_desc_helper') }}
                </p>
            </div>
            <div class="form-group {{ $errors->has('history_date') ? 'has-error' : '' }}">
                <label for="history_date">{{ trans('global.history_warga.fields.history_date') }}*</label>
                <input type="text" id="history_date" name="history_date" class="form-control" value="{{ old('history_date', isset($history_warga) ? $history_warga->history_date : '') }}">
                @if($errors->has('history_date'))
                <em class="invalid-feedback">
                    {{ $errors->first('history_date') }}
                </em>
                @endif
                <p class="helper-block">
                    {{ trans('global.history_warga.fields.history_date_helper') }}
                </p>
            </div>

            <div class="form-group {{ $errors->has('history_category') ? 'has-error' : '' }}">
                <label for="history_category">{{ trans('global.history_warga.fields.history_category') }}*
                    <!-- <span class="btn btn-info btn-xs select-all">Select all</span>
                    <span class="btn btn-info btn-xs deselect-all">Deselect all</span></label> -->
                    <select name="history_category" id="history_category" class="form-control select2">
                        @foreach($history_category as $id => $history_category)
                        <option value="{{ $id }}" {{ (in_array($id, old('history_category', [])) || isset($history_warga) && $history_warga->history_category) ? 'selected' : '' }}>
                            {{ $history_category }}
                        </option>
                        @endforeach
                    </select>
                    @if($errors->has('history_category'))
                    <em class="invalid-feedback">
                        {{ $errors->first('history_category') }}
                    </em>
                    @endif
                    <p class="helper-block">
                        {{ trans('global.history_warga.fields.history_category_helper') }}
                    </p>
            </div>

            <div>
                <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
            </div>
        </form>
    </div>
</div>

@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('specialities') }}
        </h2>
    </x-slot>

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ( $errors->all() as $error )
                    <li>{{ $error }} </li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="col-lg-6 pull-right mb-2">
    <a class="btn btn-info" href="{{ route('specialities.create') }}" title="{{ __('Nova especialidade') }}"> {{ __('Nova especialidade') }} </a>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <td>{{ __('Id') }}</td>
                <td>{{ __('Nome') }}</td>
                <td>{{ __('Ações') }}</td>
            </tr>
        </thead>
        <tbody>
            @foreach($specialities as $speciality)
            <tr>
                <td>{{ $speciality->id ?? '' }}</td>
                <td>{{ $speciality->name ?? '' }}</td>
                <td>
                    <a class="btn btn-small btn-success" href="{{ route('specialities.show', $speciality->id) }}"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-small btn-info" href="{{ route('specialities.edit', $speciality->id) }}"><i class="fa fa-edit"></i></a>
                    <form style="display: inline" method="POST" action="{{ route('specialities.destroy', $speciality->id) }}">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-small btn-danger"><i class="fa fa-times"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    <table>

</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Especialidade') }}
        </h2>
    </x-slot>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Especialidade') }}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 col-md-5" style="text-align: center">
                                a foto da especialidade ?
                            </div>
                            <div class="col-sm-6 col-md-7">
                                <h4><strong>{{ $speciality->name ?? '' }}</strong></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>

<x-layout>
    <div class="mx-auto max-w-7xl">
        <div class="grid grid-cols-2 gap-6">
            @foreach ($vehicles as $vehicle)
                <div class="card sm:card-side max-w-sm sm:max-w-full">
                    <div class="card-body">
                        <h5 class="card-title mb-0.5">{{ $vehicle->vehicle }}</h5>
                        <p>{{ $vehicle->model_type }}</p>
                        <div class="card-actions">
                            <a href="/vehicles/{{ $vehicle->id }}" class="btn btn-primary">
                                {{ $model->where('vehicle_id', $vehicle->id)->count() != null ? 'View ' . $model->where('vehicle_id', $vehicle->id)->count() . ' Cars' : 'View 0 Cars' }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>

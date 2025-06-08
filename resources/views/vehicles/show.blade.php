<x-layout>
    {{-- <a href="{{ url()->previous() }}">Back</a> --}}
    <form action="/reservations/create" method="POST" class="mx-auto max-w-7xl">
        @csrf
        <div class="bg-base-100 w-full rounded-lg shadow-base-300/20 shadow-sm">
            <h5 class="bg-base-300/10 rounded-t-lg p-4 text-xl font-bold">{{ $vehicle->vehicle }}</h5>
            <div class="grid grid-cols-3 gap-6 p-4">
                @foreach ($models as $model)
                    {{-- {{ $model->model }} --}}
                    <div class="card flex flex-col justify-between h-full sm:max-w-sm">
                        <figure>
                            <img src="{{ asset('images/models/' . $model->id . '.avif') }}" alt="{{ $model->model }}"
                                class="w-96 h-56 object-cover" />
                        </figure>
                        <div class="card-body space-y-3">
                            <h5 class="card-title">{{ $model->model }}</h5>
                            <input type="text" name="vehicle_id" class="w-full no-focus hidden" aria-label="input"
                                value="{{ $model->vehicle_id }}" readonly required />
                            <div class="flex items-center space-x-4">
                                <span class="flex items-center space-x-2">
                                    <i class="fa-solid fa-user"></i>
                                    <p>{{ $model->capacity }}</p>
                                </span>
                                <span class="flex items-center space-x-2">
                                    <i class="fa-solid fa-car"></i>
                                    <p>{{ $model->transmission }}</p>
                                </span>
                                <span class="flex items-center space-x-2">
                                    <i class="fa-solid fa-briefcase"></i>
                                    <p>{{ $model->bags }} Bags</p>
                                </span>
                            </div>
                            <ul class="list-inside list-disc">
                                @foreach ($model->features as $feature)
                                    <li>{{ $feature }}</li>
                                @endforeach
                            </ul>
                            <div class="card-actions">
                                <button type="submit" class="btn btn-primary">Reserve Similar Vehicle</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </form>
</x-layout>

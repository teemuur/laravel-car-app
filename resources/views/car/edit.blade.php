@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <h2>Машина с идентификатором: {{$car->id}}</h2>
        <form action="{{ route('car.update', $car->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="name">Новое название машины:</label>
                <input type="text" name="car_name" id="name" class="form-control carName" value="{{$car->name}}"
                       onchange="updateDisplayName()">
                <div class="form-group">
                    <label for="company">Владелец</label>
                    <select class="form-control form-control-lg" id="company" name="company_id">
                        @foreach($companies as $company)
                            <option {{$car->company ? $company->id == $car->company->id ? 'selected' : '': ''}}
                                    value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                        <option value="">Без владельца</option>
                    </select>
                    <label for="properties">Свойства:</label>

                    <ul>
                        @foreach($properties as $property)
                            <li>
                                @if($property->name === "VehicleRegNumber")
                                    <label for="property_value_{{$property->id}}">{{$property->name}}</label>
                                    <input class="form-control vehicleRegNumber"
                                           value="{{ $car->properties->contains($property) ? $car->properties->where('id', $property->id)->first()->pivot->property_value : '' }}"
                                           type="text"
                                           name="property_value[]" id="property_value_{{$property->id}}"
                                           onchange="updateDisplayName()">
                                @elseif($property->name === "DisplayName")
                                    <label for="property_value_{{$property->id}}">{{$property->name}}</label>
                                    <input class="form-control displayName"
                                           value="{{ $car->properties->contains($property) ? $car->properties->where('id', $property->id)->first()->pivot->property_value : '' }}"
                                           type="text" name="property_value[]" id="property_value_{{$property->id}}">
                                @else
                                    <label for="property_value_{{$property->id}}">{{$property->name}}</label>
                                    <input class="form-control" type="text"
                                           value="{{ $car->properties->contains($property) ? $car->properties->where('id', $property->id)->first()->pivot->property_value : '' }}"
                                           name="property_value[]" id="property_value_{{$property->id}}">
                                @endif
                                <input type="hidden" name="property_id[]" value="{{$property->id}}">
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Обновить данные в БД</button>
        </form>
    </div>
    <hr>
@endsection
<script>
    function updateDisplayName() {
        const regNumberInput = document.querySelector('.vehicleRegNumber').value
        const displayNameInput = document.querySelector('.displayName')
        const carName = document.querySelector('.carName').value
        if (displayNameInput) {
            displayNameInput.value = `${carName} ${regNumberInput}`
        }
    }
</script>

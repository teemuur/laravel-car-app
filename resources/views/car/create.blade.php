@extends('layout.app')

@section('content')

    <div class="container mt-5">
        <h2>Машины</h2>
        <form action="{{ route('car.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="car_name">Введите название машины</label>
                <input type="text" name="car_name" id="car_name" class="form-control carName"
                       onchange="updateDisplayName()">
                <label for="company">Владелец</label>
                <select class="form-control form-control-lg" id="company" name="company_id">
                    @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
                    <option value="">Без владельца</option>
                </select>
                <label for="">Свойства:</label>
                <ul>
                    @foreach($properties as $property)
                        <li>
                            @if($property->name === "VehicleRegNumber")
                                <label for="property_value_{{$property->id}}">{{$property->name}}</label>
                                <input class="form-control vehicleRegNumber" type="text" name="property_value[]"
                                       id="property_value_{{$property->id}}" onchange="updateDisplayName()">
                                <input type="hidden" name="property_id[]" value="{{$property->id}}">

                            @elseif($property->name === "DisplayName")
                                <label for="property_value_{{$property->id}}">{{$property->name}}</label>
                                <input class="form-control displayName" type="text" name="property_value[]"
                                       id="property_value_{{$property->id}}">
                                <input type="hidden" name="property_id[]" value="{{$property->id}}">

                            @else
                                <label for="property_value_{{$property->id}}">{{$property->name}}</label>
                                <input class="form-control" type="text" name="property_value[]"
                                       id="property_value_{{$property->id}}">
                                <input type="hidden" name="property_id[]" value="{{$property->id}}">
                            @endif
                        </li>
                    @endforeach
                </ul>
                <button class="btn btn-success" type="submit">Сохранить машину в БД</button>
            </div>
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

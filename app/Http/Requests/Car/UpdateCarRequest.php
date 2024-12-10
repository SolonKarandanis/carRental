<?php

namespace App\Http\Requests\Car;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
//        return $this->user()->can('create', User::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'maker_id' => ['required','exists:makers,id'],
            'model_id'=>['required','exists:models,id'],
            'year' => ['required'],
            'car_type_id' => ['required','exists:car_types,id'],
            'fuel_type_id' => ['required','exists:fuel_types,id'],
            'price' => ['required'],
            'vin' => ['required', Rule::unique('users')->ignore($this->route('id'))],
            'mileage' => ['required'],
            'state_id' => ['required','exists:states,id'],
            'city_id' => ['required','exists:cities,id'],
            'address'=>[],
            'phone'=>[],
            'description'=>[],
            'air_conditioning'=>[],
            'power_windows'=>[],
            'power_door_locks'=>[],
            'abs'=>[],
            'cruise_control'=>[],
            'bluetooth_connectivity'=>[],
            'remote_start'=>[],
            'gps_navigation'=>[],
            'heated_seats'=>[],
            'climate_control'=>[],
            'rear_parking_sensors'=>[],
            'leather_seats'=>[],
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function messages(): array
    {
        return [
            'maker_id.required' => ['You need to associate a Maker with a car.'],
            'model_id.required' => ['You need to associate a Model with a car.'],
            'car_type_id.required' => ['You need to associate a Car Type with a car.'],
            'fuel_type_id.required' => ['You need to associate a Fuel Type with a car.'],
            'state_id.required' => ['You need to associate a State with a car.'],
            'city_id.required' => ['You need to associate a City with a car.'],
        ];
    }
}

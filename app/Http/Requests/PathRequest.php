<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PathRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if ($this->user()->hasRole('editor')) {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:3000'],
            'duration' => ['required', 'integer', 'min:1'],
            'distance' => ['required', 'integer', 'min:1'],
            'ascent' => ['required', 'integer', 'min:0'],
            'descent' => ['required', 'integer', 'min:0'],
            'isHandicapAccessible' => ['boolean', 'required'],
            'isLoop' => ['boolean', 'required'],
            'path' => ['json', 'required'],
            'themeId' => ['required', 'integer', 'exists:themes,id'],
            'parkingName_1' => ['string', 'max:255', 'required_with:parkingUrl_1', 'nullable'],
            'parkingUrl_1' => ['url', 'active_url', 'required_with:parkingName_1', 'nullable'],
            'parkingName_2' => ['string', 'max:255', 'required_with:parkingUrl_2', 'nullable', 'different:parkingName1'],
            'parkingUrl_2' => ['url', 'active_url', 'required_with:parkingName_2', 'nullable', 'different:parkingUrl1'],
            'parkingName_3' => ['string', 'max:255', 'required_with:parkingUrl_3', 'nullable', 'different:parkingName1', 'different:parkingName2'],
            'parkingUrl_3' => ['url', 'active_url', 'required_with:parkingName_3', 'nullable', 'different:parkingUrl1', 'different:parkingUrl2'],
            'pois' => ['required', 'array'],
            'pois.*.id' => ['required', 'integer', 'exists:pois,id'],
        ];
    }
}

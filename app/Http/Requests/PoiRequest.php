<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PoiRequest extends FormRequest
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
        $answersNumber = 2;
        if ($this->filled('answer_3')) {
            $answersNumber++;
        }
        if ($this->filled('answer_4')) {
            $answersNumber++;
        }
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:3000'],
            'funFact' => ['string', 'max:3000'],
            'lat' => ['required', 'numeric', 'between:45.8,47.8'],
            'long' => ['required', 'numeric', 'between:5.9,7.6'],

            'pictureFile' => ['required', 'image', 'file|size:2048', 'mimetypes:image/jpeg,image/webp', 'extensions:jpeg,jpg,webp', 'dimensions:min_width=600,min_height=600', 'dimensions:max_width=4096,max_height=4096', 'dimensions:max_ratio=1.5', 'dimensions:min_ratio=0.5'],
            'pictureTitle' => ['required', 'string', 'max:255'],
            'pictureDescr' => ['required', 'string', 'max:3000'],
            'pictureAuthor' => ['required', 'string', 'max:255'],
            'pictureYear' => ['required', 'integer', 'min:1800', 'max:'.date('Y')],

            'audioFile' => ['nullable', 'file', 'mimetypes:audio/mpeg,audio/mp4,audio/x-aac,audio/ogg', 'extensions:mp3,mp4a,aac,ogg', 'file|size:2048'],
            'audioTitle' => ['nullable', 'string', 'max:255', 'required_with:audioFile'],
            'audioDescr' => ['nullable', 'string', 'max:3000', 'required_with:audioFile'],
            'audioAuthor' => ['nullable', 'string', 'max:255', 'required_with:audioFile'],
            'audioDate' => ['nullable', 'date', 'before_or_equal:today', 'after_or_equal:01/01/1800', 'required_with:audioFile'],

            'linkName_1' => ['nullable', 'string', 'max:255', 'required_with:linkUrl_1'],
            'linkUrl_1' => ['nullable', 'active_url', 'required_with:linkName_1'],
            'linkName_2' => ['nullable', 'string', 'max:255', 'required_with:linkUrl_2'],
            'linkUrl_2' => ['nullable', 'active_url', 'required_with:linkName_2'],
            'linkName_3' => ['nullable', 'string', 'max:255', 'required_with:linkUrl_3'],
            'linkUrl_3' => ['nullable', 'active_url', 'required_with:linkName_3'],
            'linkName_4' => ['nullable', 'string', 'max:255', 'required_with:linkUrl_4'],
            'linkUrl_4' => ['nullable', 'active_url', 'required_with:linkName_4'],
            'linkName_5' => ['nullable', 'string', 'max:255', 'required_with:linkUrl_5'],
            'linkUrl_5' => ['nullable', 'active_url', 'required_with:linkName_5'],

            'question' => ['nullable', 'string', 'max:255'],
            'answer_1' => ['nullable', 'string', 'max:255', 'required_with:question', 'declined_if:question,empty'],
            'answer_2' => ['nullable', 'string', 'max:255', 'different:answer_1', 'required_with:question', 'declined_if:question,empty'],
            'answer_3' => ['nullable', 'string', 'max:255', 'different:answer_1', 'different:answer_2', 'declined_if:question,empty'],
            'answer_4' => ['nullable', 'string', 'max:255', 'different:answer_1', 'different:answer_2', 'different:answer_3','declined_if:answer_3,"empty"', 'declined_if:question,empty'],
            'correctAnswer' => ['nullable', 'required_with:question', 'integer', 'min:1', 'max:'.$answersNumber, 'declined_if:question,empty'],
        ];
    }
}

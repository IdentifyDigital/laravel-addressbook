<?PHP

namespace IdentifyDigital\AddressBook\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressUpdateRequest extends FormRequest
{
	/**
	 * Nothing here to authorize, since it will be handled by
	 * subclasses or policies
	 */
	public function authorize()
	{
		return true;
	}
	
	public function rules()
	{
		return [
			'line_1' 		=> 'required|min:1',
			'town_or_city' 	=> 'required|min:1',
			'county' 		=> 'required|min:1',
			'country'		=> 'required|min:1',
			'post_code' 	=> 'required|min:1'
		];
	}
	
	public function messages()
	{
		return [
			'line_1.required' 		=> 'First line of Address is needed',
			'town_or_city.required' => 'Town or City name is required',
			'county.required'		=> 'County name is required',
			'country.required'	 	=> 'Country is required',
			'post_code.required'	=> 'Post code is required'
		];
	}
	
}
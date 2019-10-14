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
			'address.line_1'		=> 'required|min:1',
			'address.town_or_city'	=> 'required|min:1',
			'address.county' 		=> 'required|min:1',
			'address.country'		=> 'required|min:1',
			'address.post_code' 	=> 'required|min:1'
		];
	}
	
	public function messages()
	{
		return [
			'address.line_1.required' 		=> 'First line of Address is needed',
			'address.town_or_city.required' => 'Town or City name is required',
			'address.county.required'		=> 'County name is required',
			'address.country.required'		=> 'Country is required',
			'address.post_code.required'	=> 'Post code is required'
		];
	}
	
}
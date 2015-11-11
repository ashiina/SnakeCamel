<?

class SnakeCamel
{
	public $total_key_size = 0;

	public function snake_to_camel($array)
	{
		if ( ! is_array($array)) return FALSE;
		$arr = array();
		foreach ($array as $key => $value) {
			if (preg_match('/_/', $key)) {
				$this->total_key_size += strlen($key);
				$key = $this->camelize($key);
			}

			if (is_array($value)) {
				$value = $this->snake_to_camel($value);
			}

			$arr[$key] = $value;
		}
		return $arr;
	}

	public function camelize($str) {
		return lcfirst(strtr(ucwords(strtr($str, ['_' => ' '])), [' ' => '']));
	}
}


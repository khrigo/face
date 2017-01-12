<?php namespace Khrigo\Face;
/**
 * FaceDetection
 *
 * @package    Face
 * @author     Igor Khripchenko <ikhripchenko@gmail.com>
 * @link       https://github.com/khrigo/face
 * @license    MIT
 */
class FaceDetection
{
	private $url;
	private $subscriptionKey = '';
	private $image;

	/**
	 * Constructor
	 */
	public function __construct($image = '') {
		$this->url = 'https://api.projectoxford.ai/face/v1.0/detect';
		$this->image = $image;
	}

	/**
	 * Get all the face/s detected in an image.
	 *
	 */
	public function getFaces() {
		$params = array(
			'subscription-key' => $this->subscriptionKey,
			'returnFaceAttributes' => $this->setAttributes
		);
		$query = http_build_query($params);

		$image = json_encode($this->image);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url . '?' . $query);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POSTFIELDS, $image);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
			'Content-Type: application/json',
			'Content-Length: ' . strlen($image))
		);

		$response = curl_exec($ch);

		header("Content-Type: application/json");
		if (!$response) {
			echo json_encode(array("statusCode" => "406", "message" => "There was no response from the server."));
		} else {
			echo $response;
		}
	}

	public function setAttributes(array $data = []) {
		$this->setAttributes = implode($data, ',');
		return $this;
	}
}

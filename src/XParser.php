<?php namespace Jdecano;
use DeviceDetector\DeviceDetector;
use UAParser\Parser;
class XParser {
	/**
	 * [$user_agent description]
	 * @var string
	 */
	private $user_agent;
	/**
	 * [$detector description]
	 * @var DeviceDetector
	 */
	private $detector;
	/**
	 * @param string $user_agent
	 */
	public function __construct($user_agent = '') {
		$this->user_agent = $user_agent;
		$this->detector = Parser::create()->parse($this->user_agent);
	}
	/**
	 * @return array
	 */
	public function browser() {
		return [
			"name"   => $this->detector->ua->family,
			"major"   => $this->detector->ua->major,
			"version" => $this->detector->ua->toVersion()
		];
	}
	/**
	 * @return array
	 */
	public function platform() {
		return [
			"name"    => $this->detector->os->family,
			"version" => $this->detector->os->toVersion(),
			"major"   => $this->detector->os->major
		];
	}
	/**
	 * @return array
	 */
	public function device() {
		return $this->detector->device->family;
	}
	/**
	 * @return 
	 */
	public function engine() {
		$engine = $this->getEngine();

		return $engine;
		return [
			"name"    => $engine['name'],
			"version" => $engine['version']
		];
	}

	public function getEngine() {
		preg_match("/((AppleWebKit|WebKit|Blink|Trident|Text-based|Dillo|iCab|Presto|Gecko|KHTML|NetFront|Edge)\/\d{0,3}.\d{0,3})/", $this->user_agent, $matches);
		$engine =  explode("/", $matches[0]);
		return [
			"name"    => $engine[0],
			"version" => $engine[1]
		];
	}
	/**
	 * @return string
	 */
	public function __toString() {
		return $this->user_agent;
	}
}
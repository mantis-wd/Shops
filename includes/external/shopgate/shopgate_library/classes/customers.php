<?php
class ShopgateCustomer extends ShopgateContainer {
	const MALE = "m";
	const FEMALE = "f";

	protected $customer_id;
	protected $customer_number;
	protected $customer_group;
	protected $customer_group_id;

	protected $first_name;
	protected $last_name;

 	protected $gender;
	protected $birthday;

	protected $phone;
	protected $mobile;
	protected $mail;

	protected $newsletter_subscription;

	protected $addresses;


	/**********
	 * Setter *
	 **********/

	/**
	 * @param string $value
	 */
	public function setCustomerId($value) { $this->customer_id = $value; }

	/**
	 * @param string $value
	 */
	public function setCustomerNumber($value) { $this->customer_number = $value; }

	/**
	 * @param string $value
	 */
	public function setCustomerGroup($value) { $this->customer_group = $value; }

	/**
	 * @param string $value
	 */
	public function setCustomerGroupId($value) {
		if (is_numeric($value)) {
			$this->customer_group_id = (int) $value;
		} else {
			$this->customer_group_id = null;
		}
	}

	/**
	 * @param string $value
	 */
	public function setFirstName($value) { $this->first_name = $value; }

	/**
	 * @param string $value
	 */
	public function setLastName($value) { $this->last_name = $value; }

	/**
	 * @param string $value <ul><li>"m" = Male</li><li>"f" = Female</li></ul>
	 */
	public function setGender($value) {
		if (empty($value)) return;

		if (($value != self::MALE) && ($value != self::FEMALE)) {
			$this->gender = null;
		} else {
			$this->gender = $value;
		}
	}

	/**
	 * @param string $value Format: yyyy-mm-dd (1983-02-17)
	 */
	public function setBirthday($value) {
		if (empty($value)) {
			$this->birthday = null;
			return;
		}

		$matches = null;
		if (!preg_match('/^([0-9]{4}\-[0-9]{2}\-[0-9]{2})/', $value, $matches)) {
			$this->birthday = null;
		} else {
			$this->birthday = $matches[1];
		}
	}

	/**
	 * @param string $value
	 */
	public function setPhone($value) { $this->phone = $value; }

	/**
	 * @param string $value
	 */
	public function setMobile($value) { $this->mobile = $value; }

	/**
	 * @param string $value
	 */
	public function setMail($value) { $this->mail = $value; }

	/**
	 * @param bool $value
	 */
	public function setNewsletterSubscription($value) { $this->newsletter_subscription = $value; }

	/**
	 * @param ShopgateAddress[] $value List of customer's addresses.
	 */
	public function setAddresses($value) {
		$this->addresses = $value;
	}


	/**********
	 * Getter *
	 **********/

	/**
	 * @return string
	 */
	public function getCustomerId() { return $this->customer_id; }

	/**
	 * @return string
	 */
	public function getCustomerNumber() { return $this->customer_number; }

	/**
	 * @return string
	 */
	public function getCustomerGroup() { return $this->customer_group; }

	/**
	 * @return string
	 */
	public function getCustomerGroupId() { return $this->customer_group_id; }

	/**
	 * @return string
	 */
	public function getFirstName() { return $this->first_name; }

	/**
	 * @return string
	 */
	public function getLastName() { return $this->last_name; }

	/**
	 * @return string <ul><li>"m" = Male</li><li>"f" = Female</li></ul>
	 */
	public function getGender() { return $this->gender; }

	/**
	 * @return string Format: yyyy-mm-dd (1983-02-17)
	 */
	public function getBirthday() { return $this->birthday; }

	/**
	 * @return string
	 */
	public function getPhone() { return $this->phone; }

	/**
	 * @return string
	 */
	public function getMobile() { return $this->mobile; }

	/**
	 * @return string
	 */
	public function getMail() { return $this->mail; }

	/**
	 * @return bool
	 */
	public function getNewsletterSubscription() { return (bool) $this->newsletter_subscription; }

	/**
	 * @param int $type <ul><li>ShopgateAddress::BOTH</li><li>ShopgateAddress::INVOICE</li><li>ShopgateAddress::DELIVERY</li></ul>
	 * @return ShopgateAddress[] List of customer's addresses, filtered by $type.
	 */
	public function getAddresses($type = ShopgateAddress::BOTH) {
		if (empty($this->addresses)) return array();
		
		$addresses = array();
		
		foreach ($this->addresses as $address) {
			if (($address->getAddressType() & $type) == $address->getAddressType()) {
				$addresses[] = $address;
			}
		}

		return $addresses;
	}

	public function accept(ShopgateContainerVisitor $v) {
		$v->visitCustomer($this);
	}
}

class ShopgateAddress extends ShopgateContainer {
	const MALE = "m";
	const FEMALE = "f";

	const INVOICE  = 0x01;
	const DELIVERY = 0x10;
	const BOTH     = 0x11;

	protected $id;
	protected $is_invoice_address;
	protected $is_delivery_address;

	protected $first_name;
	protected $last_name;

	protected $gender;
	protected $birthday;

	protected $company;
	protected $street_1;
	protected $street_2;
	protected $zipcode;
	protected $city;
	protected $country;
	protected $state;

	protected $phone;
	protected $mobile;
	protected $mail;


	/**********
	 * Setter *
	 **********/

	/**
	 * @param string $value
	 */
	public function setId($value) {
		$this->id = $value;
	}

	/**
	 * @param int $value ShopgateAddress::BOTH or ShopgateAddress::INVOICE or ShopgateAddress::DELIVERY
	 */
	public function setAddressType($value) {
		$this->is_invoice_address  = (bool) ($value & self::INVOICE);
		$this->is_delivery_address = (bool) ($value & self::DELIVERY);
	}

	/**
	 * @param bool $value
	 */
	public function setIsInvoiceAddress($value) {
		$this->is_invoice_address = (bool) $value;
	}

	/**
	 * @param bool $value
	 */
	public function setIsDeliveryAddress($value) {
		$this->is_delivery_address = (bool) $value;
	}

	/**
	 * @param string $value
	 */
	public function setFirstName($value) {
		$this->first_name = $value;
	}

	/**
	 * @param string $value
	 */
		public function setLastName($value) {
		$this->last_name = $value;
	}

	/**
	 * @param string $value <ul><li>"m" = Male</li><li>"f" = Female</li></ul>
	 */
	public function setGender($value = null) {
		if (empty($value)) return;

		if (($value != self::MALE) && ($value != self::FEMALE)) {
			$this->gender = null;
		} else {
			$this->gender = $value;
		}
	}

	/**
	 * @param string $value Format: yyyy-mm-dd (1983-02-17)
	 */
	public function setBirthday($value) {
		if (empty($value)) {
			$this->birthday = null;
			return;
		}

		$matches = null;
		if (!preg_match('/^([0-9]{4}\-[0-9]{2}\-[0-9]{2})/', $value, $matches)) {
			$this->birthday = null;
		} else {
			$this->birthday = $matches[1];
		}
	}

	/**
	 * @param string $value
	 */
	public function setCompany($value) {
		$this->company = $value;
	}

	/**
	 * @param string $value
	 */
	public function setStreet1($value) {
		$this->street_1 = $value;
	}

	/**
	 * @param string $value
	 */
	public function setStreet2($value) {
		$this->street_2 = $value;
	}

	/**
	 * @param string $value
	 */
	public function setCity($value) {
		$this->city = $value;
	}

	/**
	 * @param string $value
	 */
	public function setZipcode($value) {
		$this->zipcode = $value;
	}

	/**
	 * Sets the Country
	 *
	 * Format: ISO-3166-1
	 *
	 * Example: <ul><li>DE</li><li>US</li></ul>
	 *
	 * @see http://en.wikipedia.org/wiki/ISO_3166-1#Current_codes
	 * @param string $value Country as ISO-3166-1
	 */
	public function setCountry($value) {
		$this->country = $value;
	}

	/**
	 * Sets the state / province
	 *
	 * Format: ISO 3166-2
	 *
	 * Example: <ul><li>DE-HE</li><li>US-NY</li><ul>
	 *
	 * @see http://en.wikipedia.org/wiki/ISO_3166-2#Current_codes
	 * @param string $value State as ISO-3166-2
	 */
	public function setState($value) {
		$this->state = $value;
	}

	/**
	 * @param string $value
	 */
	public function setPhone($value) {
		$this->phone = $value;
	}

	/**
	 * @param string $value
	 */
	public function setMobile($value) {
		$this->mobile = $value;
	}

	/**
	 * @param string $value
	 */
	public function setMail($value) {
		$this->mail = $value;
	}


	/**********
	 * Getter *
	 **********/

	/**
	 * @return string
	 */
	public function getId() { return $this->id; }

	/**
	* @return bool
	*/
	public function getIsInvoiceAddress() { return (bool) $this->is_invoice_address; }

	/**
	 * @return bool
	 */
	public function getIsDeliveryAddress() { return (bool) $this->is_delivery_address; }

	/**
	 * @return int ShopgateAddress::BOTH or ShopgateAddress::INVOICE or ShopgateAddress::DELIVERY
	 */
	public function getAddressType() {
		return (int) (
			($this->getIsInvoiceAddress()  ? self::INVOICE  : 0) |
			($this->getIsDeliveryAddress() ? self::DELIVERY : 0)
		);
	}

	/**
	 * @return string
	 */
	public function getFirstName() { return $this->first_name; }

	/**
	 * @return string
	 */
	public function getLastName() { return $this->last_name; }

	/**
	 * @return string <ul><li>"m" = Male</li><li>"f" = Female</li></ul>
	 */
	public function getGender() { return $this->gender; }

	/**
	 * @return string Format: yyyy-mm-dd (1983-02-17)
	 */
	public function getBirthday() { return $this->birthday; }

	/**
	 * @return string
	 */
	public function getCompany() { return $this->company; }

	/**
	 * @return string
	 */
	public function getStreet1() { return $this->street_1; }

	/**
	 * @return string
	 */
	public function getStreet2() { return $this->street_2; }

	/**
	 * Return the name of street1
	 *
	 * @return string
	 */
	public function getStreetName1() {
		return $this->splitStreetData($this->getStreet1(), "street");
	}
	
	/**
	 * Return the house number of street1
	 *
	 * @return string
	 */
	public function getStreetNumber1() {
		return $this->splitStreetData($this->getStreet1(), "number");
	}
	
	/**
	 * @return string
	 */
	public function getCity() { return $this->city; }

	/**
	 * @return string
	 */
	public function getZipcode() { return $this->zipcode; }

	/**
	 * Returns the country
	 *
	 * Format: ISO-3166-1
	 *
	 * Example: <ul><li>DE</li><li>US</li></ul>
	 *
	 * @see http://en.wikipedia.org/wiki/ISO_3166-1#Current_codes
	 * @return string Country as ISO-3166-1
	 */
	public function getCountry() { return $this->country; }

	/**
	 * Returns the state / province
	 *
	 * Format: ISO 3166-2
	 *
	 * Example: <ul><li>DE-HE</li><li>US-NY</li><ul>
	 *
	 * @see http://en.wikipedia.org/wiki/ISO_3166-2#Current_codes
	 * @return string State as ISO-3166-2
	 */
	public function getState() { return $this->state; }

	/**
	 * @return string
	 */
	public function getPhone() { return $this->phone; }

	/**
	 * @return string
	 */
	public function getMobile() { return $this->mobile; }

	/**
	 * @return string
	 */
	public function getMail() { return $this->mail; }

	public function accept(ShopgateContainerVisitor $v) {
		$v->visitAddress($this);
	}
	
	/**
	 *
	 * @param string $street
	 * @param string $type [street|name]
	 *
	 * @return string
	 */
	protected function splitStreetData( $street, $type = "street" ) {
		$splittedArray = array();
		$street = trim($street);
		
		if(!preg_match("/^(.+)\s(.*[0-9]+.*)$/is", $street, $splittedArray)) {
			// For "My-Little-Street123"
			preg_match("/^(.+)([0-9]+.*)$/isU", $street, $splittedArray);
		}
		
		$value = $street;
		switch($type) {
			case 'street':
				if(isset($splittedArray[1])){
					$value = $splittedArray[1];
				}
				break;
			case 'number':
				if(isset($splittedArray[2])){
					$value = $splittedArray[2];
				}else{
					$value = "";
				}
				break;
		}
		
		return $value;
	}
}
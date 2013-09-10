<?php namespace Services\Orders;

class Vies {

    private $_vatid;
    private $_country;

    public function __construct($vatid){
        $this->_vatid = str_replace(' ','', trim($vatid));
    }


    /**
     * [validateVatId description]
     * @return [type] [description]
     */
    public function validateVatId(){

        try{
            $this->_country = substr($this->_vatid, 0, 2);
            $numberPortion = substr($this->_vatid, 2);
            $client = new \SoapClient("http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl");

            if($client){
                $params = array('countryCode' => $this->_country, 'vatNumber' => $numberPortion);

                    $r = $client->checkVat($params);
                    if($r->valid == true){
                        return true;
                    } else {
                        return false;
                    }
            }else{
                throw new Exception("Can't connect to ec.europa.eu so I can't validate the VIES id.", 1);
            }
        } catch (Exception $e) {
            echo "Exception Issue: ".$e->getMessage();
        }

    }


    /**
     * As and Extra Check, you can check if
     * the specific VatID belongs to the country
     * that you want to check against. This is
     * useful when you need to charge VAT to local
     * business (Same country only)
     * @param  string $country
     * @return boolean
     */
    public function checkCountry($country){
        try{
            if($this->validateVatId()){
                if(substr($this->_vatid, 0, 2)==$country){
                    return true;
                }else{
                    return false;
                }
            }
        } catch (Exception $e) {
            echo "Exception Issue: ".$e->getMessage();
        }
    }
}
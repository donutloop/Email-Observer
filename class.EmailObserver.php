<?php

class EmailObserver {

    private $to = null;
    private $subject = null;
    private $message = null;
    
    /*
     * @param string $subject
     * @return void
     */

    public function setSubject($subject) {
        if (is_string($subject)) {
            $this->subject = $subject;
        } else {
            throw new Exception("no string");
        }
    }
    
    /*
     * @param string $message
     * @return void
     */

    public function setMessage($message) {
        if (is_string($message)) {
            $this->message = $message;
        } else {
            throw new Exception("no string");
        }
    }
    
    /*
     * @param string $emailAddress
     * @param boolean $filerInactive
     * @return void  
     */

    public function setTo($emailAddress, $filerInactive = false) {

        if ($filerInactive == true) {
            $this->to = $emailAddress;
            return;
        }

        if (filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {
            $this->to = $emailAddress;
        } else {
            throw new Exception("email isn't vaild");
        }
    }
    
    /*
     * @return string   
     */
    
    public function getMessage() {
        return $this->message;
    }
    
    /*
     * @return string   
     */

    public function getSubject() {
        return $this->subject;
    }
   
    /*
     * @return string   
     */
   
    public function getTo() {
        return $this->to;
    }
    
    /*
     * @return void   
     */

    public function sendSuccessMail() {


        if (!mail($this->getTo(), $this->getSubject(), $this->getMessage())) {
            throw new Exception("E-Mail couldn't be sended");
        }
    }
    
    /*
     * @return void   
     */
    
    public function sendErrorMail() {

        if (!mail($this->getTo(), $this->getSubject(), $this->getMessage())) {
            throw new Exception("E-Mail couldn't be sended");
        }
    } 
    

}

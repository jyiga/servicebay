<?php

interface mailBuilder{
    
    public function getEmailHeader();
    public function getEmailBody();
    public function getEmailFooter();
    public function getAttachment();
}
<?php

namespace hosein\AppStore\Api;


interface ApiInterface
{
	public function getPerPage();

    public function setPerPage($perPage);
}
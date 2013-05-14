<?php
class DB
{
const HOST = "localhost";
const USER = "root";
const PASS = "";
const DATABASE = "rentmanager";	
}
class Table
{
	const USER = "user";
	const PROPERTY = "property";
}
class FIELD
{
	const USER_FIRSTNAME = "firstName";
	const USER_LASTNAME = "lastName";
	const USER_EMAIL = "email";
	const PROPERTY_EMAIL = "user_email";
	const PROPERTY_NAME = "name";
	const PROPERTY_ADDRESS = "address";
	const PROPERTY_POSTCODE = "postcode";
	const PROPERTY_RENT = "rent";
	const PROPERTY_MORTGAGE = "mortgage";
	const PROPERTY_OTHER = "other";
}
?>
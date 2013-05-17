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
	const TENANT = "tenant";
	const RENT = "rent";
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
	const TENANT_EMAIL = "user_email";
	const TENANT_FIRSTNAME = "firstname";
	const TENANT_LASTNAME = "lastname";
	const TENANT_JOINDATE = "joindate";
	const TENANT_RENTDATE = "rentdate";
	const TENANT_RENT = "rent";
	const TENANT_OTHER = "other";
	const TENANT_PROPERTYID = "property_id";
	const TENANT_DURATION = "duration";
	const RENT_USEREMAIL = "user_email";
	const RENT_DESC = "description";
	const RENT_TOTAL = "total";
	const RENT_PAIDDATE = "paiddate";
	const RENT_TENANTID = "tenant_id";
}
?>
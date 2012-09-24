// JavaScript Document

function IsEmail(email)
{
	if (email=="")
		return false;

	if (email.indexOf ("@")==-1)
		return false;
	var i = 1;
	var sLength = email.length;
	if (email.indexOf (".")==-1)
		return false;
	if (email.indexOf ("..")!=-1)
		return false;
	if (email.indexOf ("@")!= email.lastIndexOf ("@"))
		return false;
	if (email.lastIndexOf (".")==sLength-1)
		return false;
	var str="abcdefghijklmnopqrstuvwxyz-@._1234567890";
	for (var i=0;i<email.length;i++)
		if (str.indexOf (email.charAt(i))==-1)
			return false;
	return true;
}

function LTrim( value ) 
{
	var re = /\s*((\S+\s*)*)/;
	return value.replace(re, "$1");
}

function RTrim( value ) 
{
	var re = /((\s*\S+)*)\s*/;
	return value.replace(re, "$1");
}

function trim( value ) 
{
	return LTrim(RTrim(value));
}

function HaveSpecialChar(strText)
{
	var strTemp="~!@#$%^&*()-_+=[]{};:'\"<,>.?/ |\\`";
	for (var i=0; i<strText.length; i++)
		if (strTemp.indexOf (strText.charAt(i))!=-1)
		{
			return true;
		}	
	return false;
}
function CheckPhoneNumber(strText)
{
	var strTemp="0123456789";
	for (var i=0; i<strText.length; i++)
	if (strTemp.indexOf (strText.charAt(i))==-1)//==-1 ko bao gio xay ra
	{
		return true;
	}	
	return false;

}

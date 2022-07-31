	function validate()
	{
		if((addform.indexNo.value=="")||(addform.stname.value=="")||(addform.address.value=="")||(addform.gender.value=="")||(addform.dob.value==""))
		{
			alert("Please Fill Required Information!!")
			return false;
		}
		if((addform.gender[0].checked==false)&&(addform.gender[1].checked==false))
		{
			alert("Please Select Gender")
			return false;
		}
	}

	function validate2()
	{
		if((addform2.uname.value=="")||(addform2.password.value==""))
		{
			alert("Please Fill Required Information!!")
			return false;
		}

		if((addform2.adminTyp[0].checked==false)&&(addform2.adminTyp[1].checked==false))
		{
			alert("Please Select Admin Type")
			return false;
		}

		if ((addform2.uname.value.length>12)) 
		{
			alert("User Name Maximum Length is 10")
			return false;
		}

		if ((addform2.password.value.length>10)) 
		{
			alert("Password Maximum Length is 10")
			return false;
		}
	}
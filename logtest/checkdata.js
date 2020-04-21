function checkdata() {
    //username
    var username = document.forms["Form"]["username"].value;
    var password = document.forms["Form"]["password"].value;
    var fname = document.forms["Form"]["fname"].value;
    var lname = document.forms["Form"]["lname"].value;
    var tel = document.forms["Form"]["tel"].value;


    //tel
    if(isNaN(tel))
    {
        alert("กรอกเบอร์โทรศัพท์เป็นตัวเลขเท่านั้น");
        return false;
    }

    if (tel.length < 9 || tel.length > 10)
    {
        alert("กรุณากรอกหมายเลขโทรศัพท์ให้ครบ");
        return false;
    }

    //password
    if (!str(password)) {
        alert('"กรอกรหัสผ่านได้เฉพาะตัวเลขเท่านั้น!"');
        document.form.password.focus();
        return false;
    }
    if (password.length < 6)
    {
        alert("โปรดกรอกรหัสผู้ใช้มากกว่า 6 ตัวอักษร");
        return false;
    }

    if (username.length < 5)
    {
        alert("โปรดกรอกชื่อผู้ใช้มากกว่า 5 ตัวอักษร");
        return false;
    }

    //firstname

    if(!isNaN(fname))
    {
        alert("Firstname Form Fail. Alphabet only !!");
        return false;
    }
    if ((fname.length < 2) || (fname.length > 20))
    {
        alert("Firstname Form Fail.");
        return false;
    }

    //Lastname
    if(!isNaN(lname))
    {
        alert("กรอกนามสกุลเป็นตัวอักษรเท่านั้น");
        return false;
    }

    if (lname.length < 2 || lname.length > 30)
    {
        alert("lastname Form Fail.");
        return false;
    }

    //address
    if (address.length < 1)
    {
        alert("กรุณากรอกที่อยู่");
        return false;
    }           
}
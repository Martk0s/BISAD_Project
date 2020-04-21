function checkData() {

    //username
    var username = document.forms["Form"]["username"].value;
    if (username.length < 5)
    {
        alert("โปรดกรอกชื่อผู้ใช้มากกว่า 5 ตัวอักษร");
        return false;
    }

    //password
    var password = document.forms["Form"]["password"].value;
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

    //firstname
    var fname = document.forms["Form"]["fname"].value;
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
    var lname = document.forms["Form"]["lname"].value;
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

    //tel
    var tel = document.forms["Form"]["tel"].value;
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

    //address
    var address = document.forms["Form"]["address"].value;
    if (address.length < 1)
    {
        alert("กรุณากรอกที่อยู่");
        return false;
    }           
}
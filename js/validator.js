function submitter() {
    var btn = document.getElementById("submitBtn");
    btn.type = "button";
    var name = document.getElementById("name").value;
    var tele = document.getElementById("number").value;
    var email = document.getElementById("email").value;


    function ValidateEmail() {
        var mailformat = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/;
        if (email.match(mailformat)) {
            return true;
        }

        else {
            alert("You have entered an invalid email address!");
            return false;
            
        }
    }

    function phonenumber() {
        

        var phoneno = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/ ;

        // /^\d{10}$/;
        // /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/
        // /^(\([0-9]{3}\)\s?|[0-9]{3}-)[0-9]{3}-[0-9]{4}$/
        if (tele.match(phoneno)) {
            return true;
        }
        else {
            alert("Not a valid Phone Number");
            return false;
        }
    }


    if (name == "" || name == null) {
        alert("Name is empty!");
    } else {
        if (ValidateEmail() && phonenumber()) {
            btn.type = "submit"; //change the button type to submit,so data will be entered to the db                    
        }
    }

}

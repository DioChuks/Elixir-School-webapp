<script>
        function sendEmail(){
            Email.send({
                SecureToken: "6f4c9859-23b8-42be-b09e-aaed67e7d3da",
                To: "diochuks65@gmail.com",
                From: document.getElementById("email").value,
                Subject: "New Contact Form Enquiry",
                Body: "Name: " + document.getElementById("name").value + "<br> Email: " + document.getElementById("email").value + "<br> Message: " + document.getElementById("message").value
            }).then(
            message => alert("Message Sent Success")
            );
        }
    </script>
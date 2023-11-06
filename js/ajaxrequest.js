$(document).ready(function(){
    $("#stuemail").on("keyup",function(){
        const stuEmail = $("#stuemail").val();
        const regex = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        $.ajax({
            url: "student/addstudent.php",
            method: "POST",
            data: {
                emailVerify: "emailVerify",
                stuEmail: stuEmail
            },
            success: function(data){
                data = parseInt(data);
                if(data===0 && regex.test(stuEmail) || stuEmail==="")
                {
                    $("#msg2").html("");
                    $("#signupBtn").attr("disabled",false);
                }
                else if(data!==0)
                {
                    $("#msg2").html("<small style='color: red;'>Email already exists!</small>");
                    $("#signupBtn").attr("disabled",true);
                }
                else if(data===0 && !regex.test(stuEmail))
                {
                    $("#msg2").html("<small style='color: red;'>Enter valid email!</small>");
                    $("#signupBtn").attr("disabled",true);
                }
            }
        })
    })
})

function addStu()
{
    const stuName = $("#stuname").val();
    const stuEmail = $("#stuemail").val();
    const stuPass = $("#stupass").val();
    const regex = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    if(stuName.trim()==="")
    {
        $("#msg1").html("<small style='color: red;'>Name required!</small>");
        $("#stuname").focus();
        if(stuEmail.trim()!=="")
        {
            $("#msg2").html("");
        }
        if(stuPass.trim()!=="")
        {
            $("#msg3").html("");
        }
    }
    if(stuEmail.trim()==="")
    {
        $("#msg2").html("<small style='color: red;'>Email required!</small>");
        if(stuName.trim()!=="")
        {
            $("#msg1").html("");
        }
        if(stuPass.trim()!=="")
        {
            $("#msg3").html("");
        }
        else if(stuName.trim()==="")
        {
            $("#stuname").focus();
        }
        else
        {
            $("#stuemail").focus();
        }
    }
    else if(stuEmail.trim()!=="" && !regex.test(stuEmail))
    {
        $("#msg2").html("<small style='color: red;'>Enter valid email!</small>");
        if(stuName.trim()!=="")
        {
            $("#msg1").html("");
        }
        if(stuPass.trim()!=="")
        {
            $("#msg3").html("");
        }
        else if(stuName.trim()==="")
        {
            $("#stuname").focus();
        }
        else
        {
            $("#stuemail").focus();
        }
    }
    if(stuPass.trim()==="")
    {
        $("#msg3").html("<small style='color: red;'>Password required!</small>");
        if(stuName.trim()!=="")
        {
            $("#msg1").html("");
        }
        if(stuEmail.trim()!=="" && regex.test(stuEmail))
        {
            $("#msg2").html("");
        }
        else if(stuName.trim()==="")
        {
            $("#stuname").focus();
        }
        else if(stuEmail.trim()==="" || (stuEmail.trim()!=="" && !regex.test(stuEmail)))
        {
            $("#stuemail").focus();
        }
        else
        {
            $("#stupass").focus();
        }
    }
    if(stuName.trim()!=="" && stuEmail.trim()!=="" && stuPass.trim()!==""
        && regex.test(stuEmail))
    {
        $.ajax({
            url: "student/addstudent.php",
            method: "POST",
            dataType: "json",
            data: {
                verify: "verify",
                stuName: stuName,
                stuEmail: stuEmail,
                stuPass: stuPass
            },
            success: function(data){
                if(data==="OK")
                {
                    $("#successMsg").html("<span class='alert alert-success'>Registration Successfull</span>");
                    $("#signupForm").trigger("reset");
                    $("#msg1").html("");
                    $("#msg2").html("");
                    $("#msg3").html("");
                }
                else if(data==="Failed")
                {
                    $("#successMsg").html("<span class='alert alert-danger'>Registration Failed</span>");
                }
            }
        });
    }
}

function stuLogin()
{
    const loginEmail = $("#stuLogemail").val();
    const loginPass = $("#stuLogpass").val();
    if(loginEmail.trim()!=="" && loginPass.trim()!=="")
    {
        $.ajax({
            url: "student/addstudent.php",
            method: "POST",
            dataType: "json",
            data: {
                loginVerify: "loginVerify",
                loginEmail: loginEmail,
                loginPass: loginPass
            },
            success: function(data){
                if(data==="OK")
                {
                    $("#loginMsg").html("<div class='spinner-border text-success' role='status'></div>");
                    setTimeout(function(){
                        window.location.href = "index.php";
                    },1000);
                }
                else if(data==="email")
                {
                    $("#loginMsg").html("<small class='alert alert-danger'>Invalid email!</small>");
                }
                else if(data==="password")
                {
                    $("#loginMsg").html("<small class='alert alert-danger'>Incorrect password!</small>")
                }
            }
        })
    }
}

function adminLogin()
{
    const adminEmail = $("#adminLogemail").val();
    const adminPass = $("#adminLogpass").val();
    if(adminEmail.trim()!=="" && adminPass.trim()!=="")
    {
        $.ajax({
            url: "admin/admin.php",
            method: "POST",
            dataType: "json",
            data: {
                adminVerify: "adminVerify",
                adminEmail: adminEmail,
                adminPass: adminPass
            },
            success: function(data){
                if(data==="OK")
                {
                    $("#adminLoginMsg").html("<div class='spinner-border text-success' role='status'></div>");
                    setTimeout(function(){
                        window.location.href = "admin/dashboard.php";
                    },1000);
                }
                else if(data==="email")
                {
                    $("#adminLoginMsg").html("<small class='alert alert-danger'>Invalid email!</small>");
                }
                else if(data==="password")
                {
                    $("#adminLoginMsg").html("<small class='alert alert-danger'>Incorrect password!</small>");
                }
            }
        })
    }
}

function signupClose()
{
    $("#signupForm").trigger("reset");
    $("#msg1").html("");
    $("#msg2").html("");
    $("#msg3").html("");
    $("#successMsg").html("");
}

function loginClose()
{
    $("#stuLoginForm").trigger("reset");
    $("#loginMsg").html("");
}

function adminLoginClose()
{
    $("#adminLoginForm").trigger("reset");
    $("#adminLoginMsg").html("");
}

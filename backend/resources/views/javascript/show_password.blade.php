<script>
    function showPassword() {
        var passwordForm = document.getElementById("defaultRegisterFormPassword");
        var passwordConfirmationForm = document.getElementById("defaultRegisterFormPasswordConfirmation");

        if (passwordForm.type === "password") {
            passwordForm.type = "text";
            passwordConfirmationForm.type = "text";
        } else {
            passwordForm.type = "password";
            passwordConfirmationForm.type = "password";
        }
    }
</script>
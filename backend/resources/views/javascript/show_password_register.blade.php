<script>
    function showPassword() {
        const passwordForm = document.getElementById("defaultRegisterFormPassword");
        const passwordConfirmationForm = document.getElementById("defaultRegisterFormPasswordConfirmation");

        if (passwordForm.type === "password") {
            passwordForm.type = "text";
            passwordConfirmationForm.type = "text";
        } else {
            passwordForm.type = "password";
            passwordConfirmationForm.type = "password";
        }
    }
</script>
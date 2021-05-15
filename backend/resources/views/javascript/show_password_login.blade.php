<script>
    function showPassword() {
        const passwordForm = document.getElementById("defaultLoginFormPassword");

        if (passwordForm.type === "password") {
            passwordForm.type = "text";
        } else {
            passwordForm.type = "password";
        }
    }
</script>
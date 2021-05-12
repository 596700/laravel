<script>
    window.addEventListener('load', function() {

        // ユーザー名バリデーション
        var userName = document.getElementById("defaultRegisterFormUserName");
        userName.addEventListener("change", function() {
            if (userName.value.length < 255) {
                userName.setAttribute("class", "form-control is-valid");
            } else {
                userName.setAttribute("class", "form-control is-invalid");
            }
        })

        var eMailAddress = document.getElementById("defaultRegisterFormEmail");

        // メールアドレスバリデーション
        function validateEmail(email) {
            const re = /^[^\s@]+@[^\s@]+$/;
            return re.test(email);
        }

        eMailAddress.addEventListener("change", function() {
            if (validateEmail(eMailAddress.value)) {
                eMailAddress.setAttribute("class", "form-control is-valid");
            } else {
                eMailAddress.setAttribute("class", "form-control is-invalid");
            }
        })

        // パスワードバリデーション
        function validatePassword(password) {
            const re = /^([a-zA-Z0-9!-/:-@¥[-`{-~]{8,})+$/;
            return re.test(password);
        }

        var password = document.getElementById("defaultRegisterFormPassword");

        password.addEventListener("change", function() {
            if (validatePassword(password.value)) {
                password.setAttribute("class", "form-control is-valid");
            } else {
                password.setAttribute("class", "form-control is-invalid");
            }
        })

        var passwordConfirmation = document.getElementById("defaultRegisterFormPasswordConfirmation");
        // 同値チェック
        passwordConfirmation.addEventListener("change", function() {
            if (passwordConfirmation.value.length >= 8 && passwordConfirmation.value === password
                .value) {
                passwordConfirmation.setAttribute("class", "form-control is-valid");
            } else {
                passwordConfirmation.setAttribute("class", "form-control is-invalid");
            }
        })
    })

</script>

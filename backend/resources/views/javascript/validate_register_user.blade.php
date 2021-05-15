<script>
    window.addEventListener('load', function() {

        // ユーザー名バリデーション
        const userName = document.getElementById("defaultRegisterFormUserName");
        const userNameHelper = document.getElementById("defaultRegisterFormUserNameHelpBlock");

        userName.addEventListener("change", function() {
            if (this.value.length <= 30) {
                userNameHelper.remove();
                this.setAttribute("class", "form-control is-valid");
                checkStatus(userName, eMailAddress, password, passwordConfirmation);
            } else {
                userNameHelper.remove();
                this.setAttribute("class", "form-control is-invalid");
                checkStatus(userName, eMailAddress, password, passwordConfirmation);
            }
        })

        // メールアドレスバリデーション
        const validateEmail = (email) => {
            const re = /^[^\s@]+@[^\s@]+$/;
            return re.test(email);
        }

        const eMailAddress = document.getElementById("defaultRegisterFormEmail");
        const eMailAddressHelper = document.getElementById("defaultRegisterFormEmailHelpBlock");

        eMailAddress.addEventListener("change", function() {
            if (validateEmail(this.value)) {
                eMailAddressHelper.remove();
                this.setAttribute("class", "form-control is-valid");
                checkStatus(userName, eMailAddress, password, passwordConfirmation);
            } else {
                eMailAddressHelper.remove();
                this.setAttribute("class", "form-control is-invalid");
                checkStatus(userName, eMailAddress, password, passwordConfirmation);
            }
        })

        // パスワードバリデーション
        const validatePassword = (password) => {
            const re = /^([a-zA-Z0-9!-/:-@¥[-`{-~]{8,})+$/;
            return re.test(password);
        }

        const password = document.getElementById("defaultRegisterFormPassword");
        const passwordHelper = document.getElementById("defaultRegisterFormPasswordHelpBlock");

        password.addEventListener("change", function() {
            if (validatePassword(this.value)) {
                passwordHelper.remove();
                this.setAttribute("class", "form-control is-valid");
                checkStatus(userName, eMailAddress, password, passwordConfirmation);
            } else {
                passwordHelper.remove();
                this.setAttribute("class", "form-control is-invalid");
                checkStatus(userName, eMailAddress, password, passwordConfirmation);
            }
        })

        // 同値チェック
        const passwordConfirmation = document.getElementById("defaultRegisterFormPasswordConfirmation");
        const passwordConfirmationHelper = document.getElementById("defaultRegisterFormPasswordConfirmationHelpBlock");

        passwordConfirmation.addEventListener("change", function() {
            if (this.value.length >= 8 && this.value === password
                .value) {
                    passwordConfirmationHelper.remove();
                    this.setAttribute("class", "form-control is-valid");
                    checkStatus(userName, eMailAddress, password, passwordConfirmation);
            } else {
                passwordConfirmationHelper.remove();
                this.setAttribute("class", "form-control is-invalid");
                checkStatus(userName, eMailAddress, password, passwordConfirmation);
            }
        })

        const saveButton = document.getElementById("defaultRegisterButton");
        // 入力値チェック後ボタン有効化
        const checkStatus = (element_1, element_2, element_3, element_4) => {
            if (element_1.classList.contains("is-valid") &&
            element_2.classList.contains("is-valid") &&
            element_3.classList.contains("is-valid") &&
            element_4.classList.contains("is-valid")
            ) {
                saveButton.removeAttribute("disabled");   
            } else if (element_1.classList.contains("is-invalid") ||
            element_2.classList.contains("is-invalid") ||
            element_3.classList.contains("is-invalid") ||
            element_4.classList.contains("is-invalid")
            ) {
                saveButton.setAttribute("disabled", true);
            }
        }
    })

</script>

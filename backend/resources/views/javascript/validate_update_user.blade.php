<script>
    window.addEventListener('load', function() {

        // ユーザー名バリデーション
        const userName = document.getElementById("defaultUpdateFormUserName");
        const userNameHelper = document.getElementById("defaultUpdateFormUserNameHelpBlock");

        userName.addEventListener("change", function() {
            if (this.value.length <= 30) {
                this.setAttribute("class", "form-control is-valid");
                checkStatus(userName, eMailAddress);
            } else {
                userNameHelper.remove();
                this.setAttribute("class", "form-control is-invalid");
                checkStatus(userName, eMailAddress);
            }
        })

        // メールアドレスバリデーション
        const validateEmail = (email) => {
            const re = /^[^\s@]+@[^\s@]+$/;
            return re.test(email);
        }

        const eMailAddress = document.getElementById("defaultUpdateFormEmail");
        const eMailAddressHelper = document.getElementById("defaultUpdateFormEmailHelpBlock");

        eMailAddress.addEventListener("change", function() {
            if (validateEmail(this.value)) {
                this.setAttribute("class", "form-control is-valid");
                checkStatus(userName, eMailAddress);
            } else {
                eMailAddressHelper.remove();
                this.setAttribute("class", "form-control is-invalid");
                checkStatus(userName, eMailAddress);
            }
        })

        const saveButton = document.getElementById("defaultUpdateButton");
        // 入力値チェック後ボタン有効化
        const checkStatus = (element_1, element_2) => {
            if (element_1.classList.contains("is-invalid") ||
            element_2.classList.contains("is-invalid")
            ) {
                saveButton.setAttribute("disabled", true);
            } else if (element_1.classList.contains("is-valid") &&
            element_1.classList.contains("is-valid")
            ) {
                saveButton.removeAttribute("disabled");
            }
        }
    })

</script>

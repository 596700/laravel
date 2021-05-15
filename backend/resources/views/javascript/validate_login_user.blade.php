<script>
    window.addEventListener('load', function() {

        const emailForm = document.getElementById("defaultLoginFormEmail");
        const passwordForm = document.getElementById("defaultLoginFormPassword");
        const loginButton = document.getElementById("defaultLoginButton");

        emailForm.addEventListener("change", function() {
            if (this.value) {
                checkStatus(emailForm, passwordForm);
            } else {
                loginButton.setAttribute("disabled", true);
            }
        })

        passwordForm.addEventListener("change", function() {
            if (this.value) {
                checkStatus(emailForm, passwordForm);
            } else {
                loginButton.setAttribute("disabled", true);
            }
        })


        // 入力値チェック後ボタン有効化
        const checkStatus = (element_1, element_2) => {
            if (emailForm.value && passwordForm.value) {
                loginButton.removeAttribute("disabled");
            } else {
                loginButton.setAttribute("disabled", true);
            }
        }
    })

</script>

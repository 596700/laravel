<script>
    window.addEventListener('load', function() {

        // バージョンのバリデーション
        const validateVersionName = (versionName) => {
            const re = /^[a-zA-Z0-9\-.]+$/;
            return re.test(versionName);
        }

        const versionName = document.getElementById("defaultUpdateFormVersionName");
        const versionNameHelper = document.getElementById("defaultUpdateFormVersionNameHelpBlock");

        versionName.addEventListener("change", function() {
            if (validateVersionName(this.value)) {
                versionNameHelper.remove();
                this.setAttribute("class", "form-control is-valid");
                checkStatus(versionName);
            } else {
                versionNameHelper.remove();
                this.setAttribute("class", "form-control is-invalid");
                checkStatus(versionName);
            }
        })

        const updateButton = document.getElementById("defaultUpdateButton");
        // 入力値チェック後ボタン有効化
        const checkStatus = (element_1) => {
            if (element_1.classList.contains("is-invalid")
            ) {
                updateButton.setAttribute("disabled", true);
            } else if (element_1.classList.contains("is-valid")
            ) {
                updateButton.removeAttribute("disabled");
            }
        }
    })

</script>

<script>
    window.addEventListener('load', function() {

        // 製品のバリデーション
        const product = document.getElementById("defaultSaveFormProduct");
        const productHelper = document.getElementById("defaultSaveFormProductHelpBlock");

        product.addEventListener("change", function() {
            if (this.value) {
                productHelper.remove();
                this.setAttribute("class", "form-control is-valid");
                checkStatus(product, version);
            } else {
                this.setAttribute("class", "form-control is-invalid");
                saveButton.setAttribute("disabled", true);
            }
        })

        // バージョンのバリデーション
        const version = document.getElementById("defaultSaveFormVersion");
        const versionHelper = document.getElementById("defaultSaveFormVersionHelpBlock");

        version.addEventListener("change", function() {
            if (this.value) {
                versionHelper.remove();
                this.setAttribute("class", "form-control is-valid");
                checkStatus(product, version);
            } else {
                saveButton.setAttribute("disabled", true);
            }
        })


        // 入力値チェック後ボタン有効化
        const saveButton = document.getElementById("defaultSaveButton");

        const checkStatus = (element_1, element_2) => {
            if (product.value && version.value) {
                saveButton.removeAttribute("disabled");
            } else {
                saveButton.setAttribute("disabled", true);
            }
        }

    })

</script>

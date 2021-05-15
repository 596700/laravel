<script>
    window.addEventListener('load', function() {

        // 製品のバリデーション
        const product = document.getElementById("defaultUpdateFormProduct");
        const productHelper = document.getElementById("defaultUpdateFormProductHelpBlock");

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
        const version = document.getElementById("defaultUpdateFormVersion");
        const versionHelper = document.getElementById("defaultUpdateFormVersionHelpBlock");

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
        const updateButton = document.getElementById("defaultUpdateButton");

        const checkStatus = (element_1, element_2) => {
            if (product.value && version.value) {
                updateButton.removeAttribute("disabled");
            } else {
                updateButton.setAttribute("disabled", true);
            }
        }

    })

</script>

<script>
    window.addEventListener('load', function() {

        // 製品名のバリデーション
        const validateProductName = (productName) => {
            const re = /^[a-zA-Z0-9\-_ ]+$/;
            return re.test(productName);
        }

        const productName = document.getElementById("defaultSaveFormProductName");
        const productNameHelper = document.getElementById("defaultSaveFormProductHelpBlock");

        productName.addEventListener("change", function() {
            if (validateProductName(this.value)) {
                productNameHelper.remove();
                this.setAttribute("class", "form-control is-valid");
                checkStatus(productName, vendorUrl, part);
            } else {
                productNameHelper.remove();
                this.setAttribute("class", "form-control is-invalid");
                checkStatus(productName, vendorUrl, part);
            }
        })

        // ベンダURLのバリデーション
        const validateVendorUrl = (vendorUrl) => {
            const re =
                /https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&//=]*)/;
            return re.test(vendorUrl);
        }

        const vendorUrl = document.getElementById("defaultSaveFormVendorURL");
        const vendorUrlHelper = document.getElementById("defaultSaveFormVendorURLHelpBlock");

        vendorUrl.addEventListener("change", function() {
            if (validateVendorUrl(this.value)) {
                vendorUrlHelper.remove();
                this.setAttribute("class", "form-control is-valid");
                checkStatus(productName, vendorUrl, part);
            } else {
                vendorUrlHelper.remove();
                this.setAttribute("class", "form-control is-invalid");
                checkStatus(productName, vendorUrl, part);
            }
        })

        // 種別のバリデーション
        const part = document.getElementById("defaultSaveFormPart");
        part.addEventListener("change", function() {
            if (this.value === "Hardware" || this.value === "Operating System" || this.value ===
                "Application") {
                this.setAttribute("class", "form-control is-valid");
                checkStatus(productName, vendorUrl, part);
            } else {
                this.setAttribute("class", "form-control is-invalid");
                checkStatus(productName, vendorUrl, part);
            }
        })

        const saveButton = document.getElementById("defaultSaveButton");
        // 入力値チェック後ボタン有効化
        const checkStatus = (element_1, element_2, element_3) => {
            if (element_1.classList.contains("is-valid") &&
            element_2.classList.contains("is-valid") &&
            element_3.classList.contains("is-valid")
            ) {
                saveButton.removeAttribute("disabled");   
            } else if (element_1.classList.contains("is-valid") ||
            element_2.classList.contains("is-valid") ||
            element_3.classList.contains("is-valid")
            ) {
                saveButton.setAttribute("disabled", true);
            }
        }
    })

</script>

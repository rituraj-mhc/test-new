document.addEventListener("DOMContentLoaded", function () {

    if (typeof QRCodeStyling === "undefined") {
        return;
    }

    const preview = document.getElementById("mhcqr-preview");

    if (!preview) {
        return;
    }


    /*
    -------------------------
    INIT QR
    -------------------------
    */

    let qr = new QRCodeStyling({
        width: 320,
        height: 320,
        data: "https://example.com",
        margin: 10,
        dotsOptions: {
            color: "#000000",
            type: "square",
        },
        cornersSquareOptions: {
            color: "#000000",
            type: "square",
        },
        backgroundOptions: {
            color: "#ffffff",
        }
    });

    qr.append(preview);



    /*
    -------------------------
    ELEMENTS
    -------------------------
    */

    const typeSelect = document.getElementById("mhcqr_type");
    const typeFields = document.querySelectorAll(".mhcqr-type-field");

    const sizeInput = document.getElementById("mhcqr_size");
    const colorInput = document.getElementById("mhcqr_color");
    const bgInput = document.getElementById("mhcqr_bg");
    const dotStyleInput = document.getElementById("mhcqr_dotstyle");
    const cornerStyleInput = document.getElementById("mhcqr_cornerstyle");
    const cornerColorInput = document.getElementById("mhcqr_cornercolor");
    const marginInput = document.getElementById("mhcqr_margin");
    const logoInput = document.getElementById("mhcqr_logo");

    const downloadPNG = document.querySelector(".mhcqr-download-png");
    const downloadSVG = document.querySelector(".mhcqr-download-svg");
    const downloadJPG = document.querySelector(".mhcqr-download-jpg");



    /*
    -------------------------
    TYPE CHANGE
    -------------------------
    */

    function updateTypeFields() {

        let type = typeSelect.value;

        typeFields.forEach(function (el) {

            if (el.dataset.type === type) {
                el.classList.remove("hidden");
            } else {
                el.classList.add("hidden");
            }

        });

        updateQR();
    }

    typeSelect.addEventListener("change", updateTypeFields);



    /*
    -------------------------
    GET DATA
    -------------------------
    */

    function getQRData() {

        let type = typeSelect.value;

        if (type === "url") return document.getElementById("mhcqr_url").value || "";
        if (type === "text") return document.getElementById("mhcqr_text").value || "";
        if (type === "email") return "mailto:" + (document.getElementById("mhcqr_email").value || "");
        if (type === "phone") return "tel:" + (document.getElementById("mhcqr_phone").value || "");

        return "";
    }



    /*
    -------------------------
    GET STYLE
    -------------------------
    */

    function getStyleOptions() {

        let size = parseInt(sizeInput.value) || 250;

        let options = {

            width: size,
            height: size,

            margin: parseInt(marginInput.value) || 0,

            dotsOptions: {
                color: colorInput.value,
                type: dotStyleInput.value,
            },

            cornersSquareOptions: {
                color: cornerColorInput.value,
                type: cornerStyleInput.value,
            },

            backgroundOptions: {
                color: bgInput.value,
            }

        };

        // Logo
        if (logoInput.files.length > 0) {
            let file = logoInput.files[0];
            let reader = new FileReader();

            reader.onload = function (e) {
                qr.update({
                    data: getQRData(),
                    ...options,
                    image: e.target.result,
                    imageOptions: {
                        crossOrigin: "anonymous",
                        margin: 5,
                        imageSize: 0.3
                    }
                });
            }

            reader.readAsDataURL(file);

        } else {
            // no logo
            options.image = undefined;
            qr.update({
                data: getQRData(),
                ...options
            });
        }

    }



    /*
    -------------------------
    UPDATE QR
    -------------------------
    */

    function updateQR() {
        getStyleOptions();
    }



    /*
    -------------------------
    INPUT LISTENERS
    -------------------------
    */

    const inputs = document.querySelectorAll(
        "#mhcqr_url, #mhcqr_text, #mhcqr_email, #mhcqr_phone, #mhcqr_size, #mhcqr_color, #mhcqr_bg, #mhcqr_dotstyle, #mhcqr_cornerstyle, #mhcqr_cornercolor, #mhcqr_margin, #mhcqr_logo"
    );

    inputs.forEach(function (input) {
        input.addEventListener("input", updateQR);
        input.addEventListener("change", updateQR);
    });



    /*
    -------------------------
    DOWNLOAD BUTTONS
    -------------------------
    */

    if (downloadPNG) {
        downloadPNG.addEventListener("click", function () {
            qr.download({ name: "qr", extension: "png" });
        });
    }

    if (downloadSVG) {
        downloadSVG.addEventListener("click", function () {
            qr.download({ name: "qr", extension: "svg" });
        });
    }

    if (downloadJPG) {
        downloadJPG.addEventListener("click", function () {
            qr.download({ name: "qr", extension: "jpg" });
        });
    }



    /*
    -------------------------
    INIT
    -------------------------
    */

    updateTypeFields();

});
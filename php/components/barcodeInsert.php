<script src="<?php echo ROOT; ?>/javascript/quagga.js" type="text/javascript"></script>
<script>
    var Quagga = window.Quagga;
    var App = {
        _scanner: null,
        init: function() {
            this.attachListeners();
        },
        decode: function(file) {
            Quagga
                .decoder({readers: ["upc_reader", "code_128_reader", "code_39_reader", "code_39_vin_reader", "ean_8_reader", "ean_reader", "upc_e_reader", "codabar_reader"] // List of active readers
                })
                .locator({patchSize: 'medium'})
                .fromSource(file, {size: 800})
                .toPromise()
                .then(function(result) {
                    document.getElementById('ricerca').value = result.codeResult.code;
                    document.search();
                })
                .catch(function() {
                    document.getElementById('ricerca').value = "non valido";
                })
                .then(function() {
                    this.attachListeners();
                }.bind(this));
        },
        attachListeners: function() {
            var self = this,
                fileInput = document.getElementById('barcodeImage');

            fileInput.addEventListener("change", function onChange(e) {
                e.preventDefault();
                fileInput.removeEventListener("change", onChange);
                if (e.target.files && e.target.files.length) {
                    self.decode(e.target.files[0]);
                }
            });
        }
    };
    App.init();

</script>
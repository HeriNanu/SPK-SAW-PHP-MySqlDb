
    <script src="./js/jquery.min.js"></script>
    <script src="./style/validator/multifield.js"></script>
    <script src="./style/validator/validator.js"></script>
    
    <!-- Javascript functions	-->
	<script>
		function hideshow(){
			var password = document.getElementById("password1");
			var slash = document.getElementById("slash");
			var eye = document.getElementById("eye");
			
			if(password.type === 'password'){
				password.type = "text";
				slash.style.display = "block";
				eye.style.display = "none";
			}
			else{
				password.type = "password";
				slash.style.display = "none";
				eye.style.display = "block";
			}

		}
	</script>

    <script>
        // initialize a validator instance from the "FormValidator" constructor.
        // A "<form>" element is optionally passed as an argument, but is not a must
        var validator = new FormValidator({
            "events": ['blur', 'input', 'change']
        }, document.forms[0]);
        // on form "submit" event
        document.forms[0].onsubmit = function(e) {
            var submit = true,
                validatorResult = validator.checkAll(this);
            console.log(validatorResult);
            return !!validatorResult.valid;
        };
        // on form "reset" event
        document.forms[0].onreset = function(e) {
            validator.reset();
        };
        // stuff related ONLY for this demo page:
        $('.toggleValidationTooltips').change(function() {
            validator.settings.alerts = !this.checked;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);

    </script>

    <!-- jQuery -->
    <!-- Bootstrap -->
    <script src="./style/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="./style/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="./style/nprogress/nprogress.js"></script>
    <!-- validator -->
    <!-- <script src="../vendors/validator/validator.js"></script> -->
	<script src="./style/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="./style/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="./style/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="./style/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="./style/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="./style/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="./style/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="./style/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="./style/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="./style/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="./style/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <!--script src="./style/datatables.net-scroller/js/dataTables.scroller.min.js"></script-->
    <!-- Custom Theme Scripts -->
    <script src="./style/build/js/custom.min.js"></script>
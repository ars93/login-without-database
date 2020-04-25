<script src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/js/toastr.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/custom.js"></script>
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
   
</script>
<?php
if ($this->session->flashdata('Toast_Message')):
    ?>
    <script>
        var msg = "<?php echo $this->session->flashdata('Toast_Message'); ?>";
        if (msg.includes("not") == true) {
            toastr.warning(msg, 'Message');
        } else if (msg.includes("deleted") == true) {
            toastr.error(msg, 'Message');
        } else {
            toastr.success(msg, 'Message');
        }
    </script>
    <?php
endif
?>
</body>
</html>

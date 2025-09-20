<style>
    [data-bs-theme=dark] .bg-dark .text-white{
        color: black !important;
    }
    .main-heading .fa{
        color:white!important;
        font-size:20px
    }
    #basic-addon2{
        width: 210px!important;
    }
</style>
<?php
echo $this->load->view('form/registration_form',[],true);
?>
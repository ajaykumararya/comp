var dtLMSCertificateCommonUtils = {

    dtLMSPrintContent: function(data) {

        var printWindow = window.open('', lmscertificatecommonobject.printerTitle, 'height=600,width=1900');
        printWindow.document.write('<html><head><title>' + lmscertificatecommonobject.printerTitle + '</title>');
        printWindow.document.write('<link rel="stylesheet" href="' + lmscertificatecommonobject.pluginPath + 'assets/print.css" type="text/css" media="all" />');
        printWindow.document.write('</head><body >');
        printWindow.document.write(data);
        printWindow.document.write('</body></html>');
        printWindow.document.close();

        setTimeout(function() {
            dtLMSCertificateCommonUtils.checkReadyState(printWindow);
        }, 1200);

        return true;

    },

    checkReadyState: function(printWindow) {

        if (printWindow.document.readyState == "complete") {
            printWindow.focus(); // necessary for IE >= 10
            printWindow.print();
            printWindow.close();
        }

    }

};

var dtLMSCertificateCommon = {

    dtInit: function() {

        jQuery('body').delegate('.dtlms-generate-certificate-content', 'click', function(e) {

            var this_item = jQuery(this),
                certificate_id = this_item.attr('data-certificateid'),
                item_id = this_item.attr('data-itemid'),
                grade_id = this_item.attr('data-gradeid'),
                user_id = this_item.attr('data-userid'),
                parent_item = this_item.parents('.dtlms-student-certificate-holder');

            jQuery.ajax({
                type: "POST",
                url: lmscommonobject.ajaxurl,
                data: {
                    action: 'dtlms_generate_certificate_content',
                    certificate_id: certificate_id,
                    item_id: item_id,
                    grade_id: grade_id,
                    user_id: user_id,
                },
                beforeSend: function() {
                    this_item.prepend('<span><i class="fas fa-spinner fa-spin"></i></span>');
                },
                success: function(response) {
                    dtLMSCertificateCommonUtils.dtLMSPrintContent(response);
                },
                complete: function() {
                    this_item.find('span').remove();
                }
            });

            e.preventDefault();

        });

    }

};

jQuery(document).ready(function() {

    "use strict";

    dtLMSCertificateCommon.dtInit();

});
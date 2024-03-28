<?php
require_once __DIR__ . '/vendor/autoload.php';

// Generate your PDF using mPDF
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('<h1>Hello World!</h1>');
$pdfData = $mpdf->Output('', 'S'); // Output as string

// Display the PDF using PDF.js
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View PDF Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>
</head>
<body>
    <div id="pdfViewer"></div>
    <script>
        // Convert PDF data to Uint8Array
        var pdfData = Uint8Array.from(atob('<?php echo base64_encode($pdfData); ?>'), c => c.charCodeAt(0));

        // Load PDF
        pdfjsLib.getDocument({ data: pdfData }).promise.then(function(pdf) {
            pdf.getPage(1).then(function(page) {
                var scale = 1.5;
                var viewport = page.getViewport({ scale: scale });

                // Prepare canvas using PDF page dimensions
                var canvas = document.createElement('canvas');
                var context = canvas.getContext('2d');
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                // Render PDF page into canvas context
                var renderContext = {
                    canvasContext: context,
                    viewport: viewport
                };
                var renderTask = page.render(renderContext);
                renderTask.promise.then(function() {
                    // Append canvas to the viewer container
                    document.getElementById('pdfViewer').appendChild(canvas);
                });
            });
        });
    </script>
</body>
</html>
